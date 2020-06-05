<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\blog;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $blogs = Blog::when($request->search, function($q) use ($request) {
            return $q->where('title', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.blog.index", ["blogs" => $blogs]);
    }// end of index

    public function create()
    {
        return view('dashboard.blog.create');

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'brief_description' => 'required|max:255',
            'description' => 'required|max:510',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "blog_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\uploads\blogs');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        Blog::create($request_data);
        session()->flash('success', trans('blog.added_successfully'));
        return redirect()->route('dashboard.blogs.index');
    }//end of store

    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', ['blog' => $blog ]);
    }//end of edit

    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'max:255',
            'brief_description' => 'max:255',
            'description' => 'max:520',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->image) {
                // delete image if exist
            if ($blog->image_path != null && Storage::disk("public_uploads")->exists('/blogs/' . $blog->image_path)) {
                Storage::disk('public_uploads')->delete('/blogs/' . $blog->image_path);
            }//end of if

            // upload new image
            $image = $request->file('image');
            $name = "blog_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\uploads\blogs');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        $blog->update($request_data);
        session()->flash('success', trans('blog.updated_successfully'));
        return redirect()->route('dashboard.blogs.index');

    }//end of update

    public function destroy(Blog $blog)
    {
        // delete image if exist
        if ($blog->image_path != null && Storage::disk("public_uploads")->exists('/blogs/' . $blog->image_path)) {
            Storage::disk('public_uploads')->delete('/blogs/' . $blog->image_path);
        }//end of if

        $blog->delete();
        session()->flash('success', trans('blog.deleted_successfully'));
        return redirect()->route('dashboard.blogs.index');
    }//end of destroy
}
