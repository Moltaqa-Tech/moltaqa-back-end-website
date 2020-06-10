<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Blog;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BlogController extends Controller
{


    public function index()
    {
        $currentLanguage = LaravelLocalization::getCurrentLocale();
        $blogs = Blog::where("status", 1)->where("locale", $currentLanguage)->orderBy("updated_at", "DESC")->get();

        return view("layouts.site.blog", ["blogs" => $blogs]);
    }
}
