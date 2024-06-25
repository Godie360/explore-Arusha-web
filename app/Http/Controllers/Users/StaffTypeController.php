<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company\StaffTypeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class StaffTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $staff_types = StaffTypeModel::where('company_id', auth()->user()->company->id);
            return DataTables::of($staff_types)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->addColumn('no_staff', function ($data) {
                    return 0;
                })
                ->addColumn('action', function ($data) {
                    return view('web.vendor-pages.staffs.type-action-buttons', compact('data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('web.vendor-pages.staffs.type');
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
        $request->validate([
            'name' => 'required'
        ]);
        $request->merge([
            'company_id' => auth()->user()->company->id
        ]);
        StaffTypeModel::create($request->except('_token'));
        return redirect()->back()->with('success', 'Staff type successfully created');
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
        $stafftype = StaffTypeModel::where('id', $id)->first();
        if ($stafftype) {
            return response()->json(['message' =>  "Data found.", 'data' => $stafftype], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "StaffType data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $staff_type = StaffTypeModel::where('id', $id)->first();
        if ($staff_type) {
            $staff_type->update($request->except('_token', '_methos'));
            return redirect()->back()->with('success', 'Staff type successfully updated');
        }
        return redirect()->back()->with('error', 'Staff type not found');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff_type = StaffTypeModel::where('id', $id)->first();
        if ($staff_type) {
            $staff_type->delete();
            return response()->json(['message' =>  "Staff type successfully deleted ", 'data' => null], Response::HTTP_OK);
        }
        return response()->json(['message' =>  "Staff type  data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
    }
}
