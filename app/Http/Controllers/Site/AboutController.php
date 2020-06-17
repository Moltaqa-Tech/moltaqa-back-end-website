<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Review;

class AboutController extends BaseController
{

    public function index()
    {
        $reviews = Review::where("status", 1)->get();
        return view('layouts.site.about', ["reviews" => $reviews]);
    }//end of index
}
