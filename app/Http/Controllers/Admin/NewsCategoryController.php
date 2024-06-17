<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News\NewsCategoryModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = NewsCategoryModel::whereNotNull('id');
            return DataTables::of($categories)
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
                    return view('components.admin.action-button.news-categories', compact('data'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.news-categories.index');
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
        try {
            $request->validate([
                'name' => 'required'
            ]);
            DB::beginTransaction();
            $category = NewsCategoryModel::create($request->except('_token'));
            DB::commit();
            return response()->json(['message' =>  "Category created successfully.", 'data' => null], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = NewsCategoryModel::where('id', $id)->first();
        if ($category) {
            return response()->json(['message' =>  "Data found.", 'data' => $category], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Category data not found", 'data' => $category], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = NewsCategoryModel::where('id', $id)->first();
        if ($category) {
            return response()->json(['message' =>  "Data found.", 'data' => $category], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Category data not found", 'data' => $category], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required'
            ]);
            $category = NewsCategoryModel::where('id', $id)->first();
            if ($category) {
                DB::beginTransaction();
                $category->update($request->except('id', '_token', '_method'));
                DB::commit();
                return response()->json(['message' =>  "Category updated successfully.", 'data' => null], Response::HTTP_OK);
            } else {
                return response()->json(['message' =>  "Category data not found", 'data' => $category], Response::HTTP_BAD_REQUEST);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = NewsCategoryModel::where('id', $id)->first();
        if ($category) {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return response()->json(['message' =>  "Category deleted successfully.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Category data not found", 'data' => $category], Response::HTTP_BAD_REQUEST);
        }
    }
}
