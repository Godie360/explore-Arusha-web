<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryModel;
use App\Models\Setting\FileModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $galleries = GalleryModel::whereNotNull('name');
            return DataTables::of($galleries)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->addColumn('image', function ($data) {
                    if ($data->featured_image) {
                        $news_title = ' <a href="' . route('admin.galleries.show',  $data->id) . '" class="table-imgname"><img src="' . $data->featured_image . '" class="me-2" alt="img">';
                    } else {
                        $news_title = "";
                    }
                    return $news_title;
                })
                ->addColumn('action', function ($data) {
                    return view('components.admin.action-button.gallery', compact('data'));
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'attachments' => 'required',
            ]);
            DB::beginTransaction();
            $gallery = GalleryModel::create($request->except('_token'));
            if ($request->hasFile('attachments')) {
                $files = $request->file('attachments');
                if (is_array($files)) {
                    $files = upload_file('attachments', 'images');
                    foreach ($files ?? [] as $file) {
                        FileModel::create([
                            'filable_type' => GalleryModel::class,
                            'filable_id' => $gallery->id ?? null,
                            'file' => $file,
                            "user_id" => auth()->id()
                        ]);
                    }
                    $gallery->update([
                        'featured_image' => $files[0]
                    ]);
                }
            }
            DB::commit();
            return response()->json(['message' =>  "Gallery created successful.", 'data' => null], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => 'Unknown error occur', 'data' => null], Response::HTTP_BAD_REQUEST);
        }
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
        $gallery = GalleryModel::where('id', $id)->first();
        if ($gallery) {
            return view('admin.gallery.edit', compact('gallery'));
        } else {
            return response()->json(['message' =>  "Gallery data not found", 'data' => $gallery], Response::HTTP_BAD_REQUEST);
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
            $gallery = GalleryModel::where('id', $id)->first();
            if ($gallery) {
                DB::beginTransaction();
                $gallery->update($request->except('id', '_token', '_method'));
                if ($request->hasFile('attachments')) {
                    $files = $request->file('attachments');
                    if (is_array($files)) {
                        $files = upload_file('attachments', 'images');
                        foreach ($files ?? [] as $file) {
                            FileModel::create([
                                'filable_type' => GalleryModel::class,
                                'filable_id' => $gallery->id ?? null,
                                'file' => $file,
                                "user_id" => auth()->id()
                            ]);
                        }
                        $gallery->update([
                            'featured_image' => $files[0]
                        ]);
                    }
                }
                DB::commit();
                return response()->json(['message' =>  "Gallery updated successful.", 'data' => null], Response::HTTP_OK);
            } else {
                return response()->json(['message' =>  "Gallery data not found", 'data' => $gallery], Response::HTTP_BAD_REQUEST);
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
        $gallery = GalleryModel::where('id', $id)->first();
        if ($gallery) {
            DB::beginTransaction();
            if ($gallery->featured_image != null) {
                delete_file($gallery->featured_image);
            }
            if ($gallery->files) {
                foreach ($gallery->files as $file) {
                    delete_file($file->file);
                }
            }
            $gallery->delete();
            DB::commit();
            return response()->json(['message' =>  "Gallery deleted successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Gallery data not found", 'data' => $gallery], Response::HTTP_BAD_REQUEST);
        }
    }
    public function file_delete(Request $request)
    {
        $file = FileModel::where('id', $request->fileId)->first();
        if ($file) {
            $file->delete();
            return response()->json(['message' =>  "File deleted successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "File data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
}
