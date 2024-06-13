<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\News\NewsCategoryModel;
use App\Models\News\NewsDetailModel;
use App\Models\News\NewsModel;
use App\Models\News\NewsTagModel;
use App\Models\News\TagModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $news = NewsModel::whereNotNull('id');
            return DataTables::of($news)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->addColumn('news_title', function ($data) {
                    $news_title = ' <a href="' . route('admin.news.show', ['news', $data->id]) . '" class="table-imgname"><img src="' . $data->futured_image . '" class="me-2" alt="img"><span>' . $data->detail->title . '</span>';
                    return $news_title;
                })
                ->addColumn('category', function ($data) {
                    return $data->news_category->name;
                })
                ->addColumn('title', function ($data) {
                    return $data->detail->title;
                })
                ->addColumn('short_description', function ($data) {
                    return $data->detail->short_description;
                })
                ->addColumn('view', function ($data) {
                    return $data->view_count;
                })
                ->addColumn('status', function ($data) {
                    return $data->status;
                })
                ->addColumn('created_by', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('action', function ($data) {
                    return view('components.admin.news-action-button', compact('data'));
                })
                ->rawColumns(['action', 'news_title'])
                ->make(true);
        }
        return view('admin.news.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $news_categories = NewsCategoryModel::orderBy('name', 'ASC')->get();
        return view('admin.news.create', compact('news_categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'futured_file' => 'required',
        ]);
        request()->merge([
            "tags" => explode(",", $request->tags),
        ]);
        if ($request->hasFile('futured_file')) {
            $request->merge([
                'featured_image' => upload_file("futured_file", "news"),
            ]);
        }
        if (is_array($request->news_category)) {
            DB::beginTransaction();
            $news = NewsModel::create([
                'futured_image' => $request->featured_image,
                'video_url' => $request->video_url,
                'news_category_id' => $request->news_category[0],
                'status' => 'pending'
            ]);
            if ($news) {
                $details = NewsDetailModel::create([
                    'news_id' => $news->id,
                    'title' => $request->title,
                    'short_description' => $request->short_description,
                    'description' => $request->description,
                ]);
                foreach ($request->news_category as $news_category) {
                    $category = NewsCategoryModel::where('id', $news_category)->first();
                    if ($category) {
                        $category->news()->attach($news);
                    }
                }
                if ($request->tags) {
                    $tags = [];
                    $created = auth()->id();
                    foreach ($request->tags as $tag) {
                        $tag = TagModel::updateOrCreate(
                            [
                                'secure_token' => Str::slug(trim($tag))
                            ],
                            [
                                "name" => trim($tag)
                            ]
                        );
                        if ($tag) {
                            $tags[] = [
                                "id" => Str::uuid(),
                                "news_id" => $news->id,
                                "model_id" => $tag->id,
                                "model_type" => TagModel::class,
                                "created_by" => $created,
                            ];
                        }
                    }
                    NewsTagModel::insert($tags);
                }
                patchFile($news, NewsModel::class, "id", false, "images");
            }
            DB::commit();
            return response()->json(['message' =>  "News created successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => Response::$statusTexts[Response::HTTP_NOT_ACCEPTABLE],
                'message' => "Must Select Atleast One Category",
                'data' => [],
            ], Response::HTTP_NOT_ACCEPTABLE);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news_categories = NewsCategoryModel::orderBy('name', 'ASC')->get();
        $news = NewsModel::where('id', $id)->first();
        if ($news) {
            return view('admin.news.show', compact('news_categories', 'news'));
        }
        return redirect()->back()->with('error', 'News Not Found');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news_categories = NewsCategoryModel::orderBy('name', 'ASC')->get();
        $news = NewsModel::where('id', $id)->first();
        if ($news) {
            return view('admin.news.edit', compact('news_categories', 'news'));
        }
        return redirect()->back()->with('error', 'News Not Found');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'futured_file' => 'required',
        ]);
        request()->merge([
            "tags" => explode(",", $request->tags),
        ]);
        $news = NewsModel::where('id', $id)->first();
        if ($news) {
            DB::beginTransaction();
            if ($request->hasFile('futured_file')) {
                if ($news->featured_image != null) {
                    // delete_file($news->featured_image);
                }
                $request->merge([
                    'featured_image' => upload_file("futured_file", "news"),
                ]);
            } else {
                $request->merge([
                    'featured_image' => $news->featured_image
                ]);
            }
            $news->update([
                'futured_image' => $request->featured_image,
                'video_url' => $request->video_url,
                'news_category_id' => $request->news_category[0],
            ]);
            $details = NewsDetailModel::create([
                'news_id' => $news->id,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
            if ($request->news_category) {
                DB::table('category_news')->where("news_model_id", $news->id)->delete();
                foreach ($request->news_category as $news_category) {
                    $category = NewsCategoryModel::where('id', $news_category)->first();
                    if ($category) {
                        $category->news()->attach($news);
                    }
                }
            }
            if ($request->tags) {
                $tags = [];
                $created = auth()->id();
                NewsTagModel::where("news_id", $news->id)->delete();
                foreach ($request->tags as $tag) {
                    $tag = TagModel::updateOrCreate(
                        [
                            'secure_token' => Str::slug(trim($tag))
                        ],
                        [
                            "name" => trim($tag)
                        ]
                    );
                    if ($tag) {
                        $tags[] = [
                            "id" => Str::uuid(),
                            "news_id" => $news->id,
                            "model_id" => $tag->id,
                            "model_type" => TagModel::class,
                            "created_by" => $created,
                        ];
                    }
                }
                NewsTagModel::insert($tags);
            }
            patchFile($news, NewsModel::class, "id", false, "images");
            DB::commit();
            return response()->json(['message' =>  "News updated successful.", 'data' => null], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>  "Unknown error occur.", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = NewsModel::where('id', $id)->first();
        if ($news) {
            DB::beginTransaction();
            $news_details = NewsDetailModel::where('news_id', $news->id)->delete();
            $news->delete();
            if ($news->tags->count() > 0) {
                foreach ($news->tags as $tag) {
                    $tag->delete();
                }
            }
            if ($news->featured_image != null) {
                delete_file($news->featured_image);
            }
            if ($news->files) {
                foreach ($news->files as $file) {
                    delete_file($file->file);
                }
            }
            DB::commit();
            return response()->json(['message' =>  "News deleted successful.", 'data' => null], Response::HTTP_OK);
        }
        return response()->json(['message' =>  "News data not found", 'data' => null], Response::HTTP_BAD_REQUEST);
    }

    public function status($id)
    {
        if (NewsStatusEnum::exists(request()->input("status"))) {
            $news = NewsModel::where("id", $id)->first();
            if ($news) {
                $news->update(["status" => request()->input("status")]);
                if (NewsStatusEnum::Published->value == request()->input("status")) {
                    if ($news->published_at == null) {
                        $news->published_at = Carbon::now()->format('Y-m-d H:i:s');
                        $news->save();
                    }

                }
            }
            return redirect()->back()->with('success', 'News status updated');
        }
        return redirect()->back()->with('error', 'News status update failed');
    }
}
