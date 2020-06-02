<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::where("status", 1)->get();
        
        return view("layouts.blog", ["blogs" => $blogs]);
    }
}
