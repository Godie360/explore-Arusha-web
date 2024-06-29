<?php

namespace App\Http\Controllers;

use App\Models\ComplaintModel;
use App\Models\ContactModel;
use App\Models\DistrictModel;
use App\Models\InstitutionModel;
use App\Models\Service\CategoryModel;
use App\Models\Service\SubCategoryModel;
use App\Models\SuggestionModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index');
    }

    public function about_us()
    {
        return view('web.about-us');
    }
    public function contact_us()
    {
        return view('web.contact-us');
    }
    public function contact_us_store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $request->merge([
            'agent' => $request->header('User-Agent') . " " . $request->ip(),
        ]);
        DB::beginTransaction();
        ContactModel::create($request->except('_token'));
        DB::commit();
        $message = "Messeage successfuly submited";
        if ($request->ajax()) {
            return response()->json(['message' =>  $message, 'data' => null]);
        } else {
            return redirect()->back()->with('succses', $message);
        }
    }
    public function complaints()
    {
        $pendingComplaints = ComplaintModel::pending()->count();
        $completedComplaints = ComplaintModel::completed()->count();
        $allComplaints = ComplaintModel::allComplaints()->count();
        $complaintsThisMonthCount = ComplaintModel::complaintsThisMonth()->count();
        $institutions = InstitutionModel::orderBy('name', 'ASC')->get();
        return view('web.complaints', compact('institutions', 'pendingComplaints', 'completedComplaints', 'allComplaints', 'complaintsThisMonthCount'));
    }
    public function complaints_store(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required',
                'institution_id' => 'required',
                'description' => 'required',
            ]);
            $request->merge([
                'agent' => $request->header('User-Agent') . " " . $request->ip(),
            ]);
            if ($request->type == "complaints") {
                DB::beginTransaction();
                $complaints = ComplaintModel::create($request->except('type', '_token'));
                DB::commit();
                $message = "Complaint successfuly submited";
                if ($request->ajax()) {
                    return response()->json(['message' =>  $message, 'data' => null]);
                } else {
                    return redirect()->back()->with('succses', $message);
                }
            } else {
                DB::beginTransaction();
                $suggestion = SuggestionModel::create($request->except('type', '_token'));
                DB::commit();
                $message = "Suggestion successfuly submited";
                if ($request->ajax()) {
                    return response()->json(['message' =>  $message, 'data' => null]);
                } else {
                    return redirect()->back()->with('succses', $message);
                }
            }
        } catch (Exception $e) {
            return response()->json(['message' =>  "Uknown error occur", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }


    public function fetch_districts(Request $request)
    {

        try {
            $request->validate(['region_id' => 'required']);
            $districts = DistrictModel::where('region_id', $request->region_id)->orderBY('name', 'ASC')->get();
            return response()->json(['message' => 'Data found', 'data' => $districts]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
    public function fetch_subcategories(Request $request)
    {

        try {
            $request->validate(['category_id' => 'required']);
            $data = SubCategoryModel::where('category_id', $request->category_id)->orderBY('name', 'ASC')->get();
            return response()->json(['message' => 'Data found', 'data' => $data]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }


    public function nationalPark()
    {
        return view('web.nationalpark');
    }


    public function arushacity()
    {
        return view('web.arushacity');
    }


    public function cultureheritage()
    {
        return view('web.cultureheritage');
    }


    public function oldonyo()
    {
        return view('web.oldonyo');
    }


    public function oldvai()
    {
        return view('web.oldvai');
    }


    public function shanga()
    {
        return view('web.shanga');
    }

    public function duluti()
    {
        return view('web.lakedulluti');
    }





}
