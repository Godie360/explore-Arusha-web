<?php

namespace App\Http\Controllers;

use App\Models\Company\CategoryModel;
use App\Models\Company\CompanyModel;
use App\Models\Company\CompanyUserModel;
use App\Models\CountryModel;
use App\Models\DistrictModel;
use App\Models\RegionModel;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function registration()
    {
        $countries = CountryModel::orderBy('name', 'ASC')->get();
        $regions = RegionModel::orderBy('name', 'ASC')->get();
        $categories = CategoryModel::orderBy('name', 'ASC')->get();

        return view('web.vendor.registration', compact('countries', 'regions', 'categories'));
    }
    public function registration_store(Request $request)
    {
        try {


            $request->validate([
                'business_name' => 'required|string|max:255',
                'company_category_id' => 'required|uuid',
                'company_email' => 'required|email|max:255',
                'company_name' => 'required|string|max:255',
                'company_phone' => 'required|string|max:20',
                'company_type' => 'required|string',
                'contact_person_email' => 'required|email|max:255',
                'contact_person_name' => 'required|string|max:255',
                'contact_person_phone' => 'required|string|max:20',
                'contact_person_title' => 'required|string|max:255',
                'country_id' => 'required|uuid',
                'district_id' => 'required|string|max:255',
                'licence_number' => 'required|string|max:50',
                'login_email' => 'required|email|max:255',
                'number_of_employees' => 'required|integer|min:1',
                'password' => 'required|string|min:8|confirmed',
                'physical_address' => 'required|string|max:255',
                'region_id' => 'required|uuid',
                'street_address' => 'required|string|max:255',
                'tin_number' => 'nullable|string|max:50',
                'website' => 'nullable|string|max:255',
                'year_of_establishment' => 'required|integer|min:1900|max:' . date('Y'),
            ]);
            DB::beginTransaction();
            $company = CompanyModel::create($request->except('_token', ''));
            if ($company) {
                $user = User::create([
                    'first_name' => $request->company_name,
                    'last_name' => $request->company_name,
                    'phone' => $request->company_phone,
                    'email' => $request->company_email,
                    'password' => Hash::make($request->password),
                ]);
                $role = Role::whereName('vendor')->first();
                $roles =  $user->syncRoles([$role]);
                CompanyUserModel::create([
                    "company_id" => $company->id,
                    "user_id" => $user->id
                ]);
                DB::commit();

                return response()->json(['message' => 'You Have successfully register to our portal, please wait for verification process to complete', 'data' => $company]);
            }
            DB::rollBack();
            return response()->json(['message' => 'Unknown error occur', 'data' => []], Response::HTTP_BAD_REQUEST);
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
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

    /**
     * Show the form for creating a new resource.
     */
    public function verification()
    {
        return view('web.vendor.verification');

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
