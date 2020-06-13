<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Blog;

class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::where("status", 1)->orderBy("updated_at", "DESC")->get();
        // update views count
        $this->updateViewsCount($blogs);

        return view("layouts.site.blog", ["blogs" => $blogs]);
    }

    // update views count
    public function updateViewsCount($blogs)
    {
        foreach($blogs as $blog) {
            $Key = 'val_' . $blog->id;
            if(! (\Session::has($Key))) {
                $blog->update(["views_count" => ($blog->views_count + 1)]);
                \Session::put($Key, 1);
            }
        }
    }

}
