<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index() 
    {
        return view('web.explore.index');
    }

    public function explore_detail() 
    {
        return view('web.explore.explore-details');
    }
}

