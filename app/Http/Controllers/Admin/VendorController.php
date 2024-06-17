<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company\CategoryModel;
use App\Models\Company\CompanyModel;
use App\Models\CountryModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CompanyModel::query();
            return DataTables::of($data)
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
                    return $data->status->name;
                })

                ->addColumn('action', function ($data) {
                    return view('components.admin.action-button.vendor', compact('data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        $vendor = CompanyModel::where('id', $id)->first();
        if ($vendor) {
            $countries = CountryModel::orderBy('name', 'ASC')->get();
            $regions = RegionModel::orderBy('name', 'ASC')->get();
            $districts = DistrictModel::where('region_id', $vendor->region_id)->orderBy('name', 'ASC')->get();
            $categories = CategoryModel::orderBy('name', 'ASC')->get();
            return view('admin.vendor.edit', compact('vendor', 'countries', 'regions', 'districts', 'categories'));
        }
        return redirect()->back()->with('error', 'Vendor Not Found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $vendor = CompanyModel::where('id', $id)->first();
        if ($vendor) {
            $vendor->update(['status' => $request->status]);
            if ($request->ajax()) {
                return response()->json(['message' => 'Vendor successfully updated', 'data' => null]);
            } else {
                return redirect()->back()->with('success', 'Vendor successfully updated');
            }
        }
        if ($request->ajax()) {
            return response()->json(['message' => 'Vendor Not Found', 'data' => null], Response::HTTP_BAD_REQUEST);
        } else {
            return redirect()->back()->with('error', 'Vendor Not Found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }
}
