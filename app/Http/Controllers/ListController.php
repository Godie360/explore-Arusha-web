<?php

namespace App\Http\Controllers;

use App\Models\Service\ReviewModel;
use App\Models\Service\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function index()
    {
        $services = ServiceModel::latest()->paginate();
        return view("web.listing.index", compact('services'));
    }

    public function show($slug)
    {
        $service = ServiceModel::where('slug', $slug)->first();
        if ($service) {

            return view('web.listing.detail', compact('service'));
        }
        return redirect()->route('web.listings.index')->with('error', 'List not found');
    }

    public function listing_list()
    {
        return view('web.listing.listing_list');
    }

    public function review(Request $request, $listing)
    {
        $request->validate([
            'name' => 'required',
            'body' => 'required'
        ]);
        $service = ServiceModel::where('id', $listing)->first();
        if ($service) {
            $request->merge([
                'anonymous' => $request->has('anonymous') ? 1 : 0,
                'company_id' => $service->company_id,
                'reviable_type' => ServiceModel::class,
                'reviable_id' => $service->id
            ]);
            DB::beginTransaction();
            $review = ReviewModel::create($request->except('_token'));
            DB::commit();
            $reviewCount = $service->reviews()->count();
            $averageRating = $service->reviews()->avg('rate');
            $service->update([
                'review_count' => $reviewCount,
                'rate' => $averageRating,
            ]);

            return redirect()->back()->with('success', 'Review submited successfuly.');
        }

        return redirect()->back()->with('error', 'Unknown error occur');
    }
}
