<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Blog;

class BaseController extends Controller
{


    public function __construct()
    {
        // Get Last Two Blogs
        $blogs = Blog::where("status", 1)->latest('id')->limit(2)->get();
        $blog1_desc = isset($blogs[0]) ? $blogs[0]->brief_description : null;
        $blog2_desc = isset($blogs[1]) ? $blogs[1]->brief_description : null;

        view()->share('blog1_desc', $blog1_desc);
        view()->share('blog2_desc', $blog2_desc);
    }

}
