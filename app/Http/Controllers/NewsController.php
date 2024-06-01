<?php

namespace App\Http\Controllers;

use App\Models\News\NewsModel;
use App\Models\News\TagModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = NewsModel::latest();
        if (request()->has('se') && !empty(request()->input("se"))) {
            $news->whereHas('detail', function ($query) {
                $query->where("title", 'like', "%" . request()->input("se") . "%");
            });
        }
        if (request()->has('tag') && !empty(request()->input("tag"))) {
            $tag = TagModel::where("name", 'like', "%" . str_replace("#", "", request()->input("tag")) . "%")->firstOrFail();

            $news->whereHas('tags', function ($query) use ($tag) {
                $query->where('model_id', $tag->id); // Assuming the tag_id is stored in the pivot table
            });
        }
        $news = $news->paginate(6);

        $populars = NewsModel::inRandomOrder()->take(4)->get();
        return view("web.news.index", compact("news", "populars"));
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
          $item = NewsModel::whereSlug($id)->first() ?? abort(404);


          return view("web.news.show", compact('item'));
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
