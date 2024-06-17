<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Company\IdTypeModel;
use App\Models\Company\StaffModel;
use App\Models\Company\StaffTypeModel;
use App\Models\CountryModel;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $staffs = StaffModel::query();
            return DataTables::of($staffs)
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
                    return view('web.vendor-pages.staffs.staff-action-buttons', compact('data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('web.vendor-pages.staffs.index');
    }

    public function create()
    {
        $id_types = IdTypeModel::all();
        $staff_types = StaffTypeModel::orderBy('name', 'ASC')->get();
        $countries = CountryModel::orderBy('name', 'ASC')->get();

        return view('web.vendor-pages.staffs.create', compact('id_types', 'countries', 'staff_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|string|email|max:255',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|string|in:M,F',
            'country_id' => 'required|uuid',
            'education' => 'required|string|max:255',
            'staff_type_id' => 'required|uuid',
            'id_type_id' => 'required|uuid',
            'id_number' => 'required|string|max:255|unique:staffs,id_number',
            'bio' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $request->merge([
                'profile_photo_path' => upload_file("profile_photo", "profiles"),
            ]);
        }
        $request->merge([
            'company_id' => auth()->user()->company->id,
        ]);
        DB::beginTransaction();
        $staff = StaffModel::create($request->except('_token', 'profile_photo'));
        DB::commit();
        return redirect()->route('web.users.staffs.index')->with('success', 'Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        return view('vendor-pages.staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = StaffModel::where('id', $id)->first();
        $id_types = IdTypeModel::all();
        $staff_types = StaffTypeModel::orderBy('name', 'ASC')->get();
        $countries = CountryModel::orderBy('name', 'ASC')->get();
        return view('Web.vendor-pages.staffs.edit', compact('staff', 'id_types', 'staff_types', 'countries'));
    }

    public function update(Request $request, string $id)
    {

        $staff = StaffModel::where('id', $id)->first();
        if ($staff) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required|string',
                'email' => 'required|email|unique:staffs,email,' . $staff->id,
                'date_of_birth' => 'required|date|before:today',
                'gender' => 'required|string|in:M,F',
                'country_id' => 'required|uuid',
                'education' => 'required|string|max:255',
                'staff_type_id' => 'required|uuid',
                'id_type_id' => 'required|uuid',
                'id_number' => 'required|string|max:255|unique:staffs,id_number,' . $staff->id,
                'bio' => 'nullable|string',
                'work_experience' => 'nullable|string',
                'address' => 'nullable|string',
                'profile_photo' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($request->hasFile('profile_photo')) {
                if ($staff->profile_photo_path != null) {
                    delete_file($staff->profile_photo_path);
                }
                $request->merge([
                    'profile_photo_path' => upload_file("profile_photo", "profiles"),
                ]);
            } else {
                $request->merge([
                    'profile_photo_path' =>  $staff->profile_photo_path,
                ]);
            }
            $staff->update($request->except('_token', '_methos', 'company_id'));
            return redirect()->back()->with('success', 'Staff updated successfully.');
        }
        return redirect()->back()->with('error', 'Staff data not found.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = StaffModel::where('id', $id)->first();
        if ($staff) {
            DB::beginTransaction();
            if ($staff->profile_photo_path != null) {
                delete_file($staff->profile_photo_path);
            }
            $staff->delete();
            DB::commit();
            return response()->json(['message' =>  "Staff deleted successfully.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Staff data not found", 'data' => $staff], Response::HTTP_BAD_REQUEST);
        }
    }
}
