<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index() 
    {
        return view("web.listing.index");
    }

    public function detail() 
    {
        return view('web.listing.detail');
    }

    public function detailList() 
    {
        return view('web.listing.listing_list');
    }
}
