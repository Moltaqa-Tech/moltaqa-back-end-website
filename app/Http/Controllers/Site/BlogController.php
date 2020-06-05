<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::where("status", 1)->get();

        return view("layouts.site.blog", ["blogs" => $blogs]);
    }
}
