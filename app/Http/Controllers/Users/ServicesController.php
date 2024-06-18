<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use App\Models\RegionModel;
use App\Models\Service\ServiceModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $model = ServiceModel::query();
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

                ->addColumn('action', function ($data) {
                    return view('web.vendor-pages.services.service-action-buttons', compact('data'));
                })
                ->rawColumns(['action'])
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
        return view('web.vendor-pages.services.create',compact('countries','regions'));
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
