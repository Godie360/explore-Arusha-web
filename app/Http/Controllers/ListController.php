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

    public function listing_list() 
    {
        return view('web.listing.listing_list');
    }
}
