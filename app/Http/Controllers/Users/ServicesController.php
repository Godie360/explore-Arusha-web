<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use App\Models\RegionModel;
use App\Models\Service\AmenityModel;
use App\Models\Service\CategoryModel;
use App\Models\Service\ServiceAmenityModel;
use App\Models\Service\ServiceModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $model = ServiceModel::where('company_id', auth()->user()->company->id);
            return DataTables::of($model)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->editColumn('status', function ($data) {
                    return $data->status;
                })
                ->editColumn('views_count', function ($data) {
                    return $data->views_count;
                })
                ->editColumn('review_count', function ($data) {
                    return $data->review_count;
                })
                ->addColumn('image', function ($data) {
                    return view('web.vendor-pages.services.service-image', compact('data'));
                })
                ->addColumn('details', function ($data) {
                    return view('web.vendor-pages.services.service-details', compact('data'));
                })
                ->addColumn('action', function ($data) {
                    return view('web.vendor-pages.services.service-action-buttons', compact('data'));
                })
                ->rawColumns(['action', 'image', 'details'])
                ->make(true);
        }
        return view('web.vendor-pages.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = CountryModel::orderBy('name', 'ASC')->get();
        $regions = RegionModel::orderBy('name', 'ASC')->get();
        $categories = CategoryModel::orderBy('name', 'ASC')->get();
        $amenities = AmenityModel::where('company_id', auth()->user()->company->id)->orderBy('name', 'ASC')->get();
        return view('web.vendor-pages.services.create', compact('countries', 'regions', 'categories', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|uuid',
            'sub_category_id' => 'required|uuid',
            'title' => 'required|string|max:255',
            'promo_video' => 'nullable|url',
            'website' => 'nullable',
            'country_id' => 'required|uuid',
            'region_id' => 'required|uuid',
            'district_id' => 'required|uuid',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'short_description' => 'required|string|max:1000',
            'description' => 'required|string',
            'featured_image_file' => 'nullable|file|image|max:2048',
        ]);

        DB::beginTransaction();
        if ($request->hasFile('featured_image_file')) {
            $request->merge([
                'featured_image' => upload_file("featured_image_file", "services"),
            ]);
        }
        $request->merge([
            'company_id' => auth()->user()->company->id,
        ]);

        $service = ServiceModel::create($request->except('_token'));
        if ($service) {
            if(isset($request->amenity_ids)){
                foreach ($request->amenity_ids as $amenity) {
                    ServiceAmenityModel::create([
                        'service_id' => $service->id,
                        'amenity_id' => $amenity,
                    ]);
                }
            }
            
            patchFile($service, ServiceModel::class, "id", false, "attachments");
        }
        DB::commit();
        return redirect()->back()->with('success', 'Service Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
