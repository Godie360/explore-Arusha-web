<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Service\AmenityModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $amenities = AmenityModel::where('company_id', auth()->user()->company->id);
            return DataTables::of($amenities)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->addColumn('action', function ($data) {
                    return view('web.vendor-pages.services.amenities.amenity-action-button', compact('data'));
                })
                ->rawColumns(['action',])
                ->make(true);
        }
        return view("web.vendor-pages.services.amenities.index");
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
        $authUser = auth()->user();
        if ($authUser && $authUser->company) {
            $request->validate([
                'name' => 'required|string',
                'icon' => 'required|string',
            ]);
            $request->merge([
                "company_id" => $authUser->company->id,
            ]);
            DB::beginTransaction();
            $amenity = AmenityModel::create($request->except("_token"));
            DB::commit();
            return response()->json(['message' =>  "Aminity created successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "User or company not found.", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $amenity = AmenityModel::whereId($id)->first();

        if ($amenity) {
            return response()->json(['message' =>  "Data found.", 'data' => $amenity], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amenity = AmenityModel::whereId($id)->first();

        if ($amenity) {
            return response()->json(['message' =>  "Data found.", 'data' => $amenity], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authUser = auth()->user();
        if ($authUser && $authUser->company) {
            $request->validate([
                'name' => 'required|string',
                'icon' => 'required|string',
            ]);
            DB::beginTransaction();
            $amenity = AmenityModel::whereId($id)->update([
                "name" => $request->name,
                "icon" => $request->icon,
                "company_id" => $authUser->company->id,
            ]);
            DB::commit();
            return response()->json(['message' =>  "Aminity updated successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "User or company not found", 'data' => null], Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $amenity = AmenityModel::whereId($id)->first();
        if ($amenity) {
            $amenity->delete();
            return response()->json(['message' =>  "Data deleted successful.", 'data' => $amenity], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
}
