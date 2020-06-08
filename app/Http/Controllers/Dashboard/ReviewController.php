<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\review;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $reviews = Review::when($request->search, function($q) use ($request) {
            return $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.review.index", ["reviews" => $reviews]);
    }// end of index

    public function create()
    {
        return view('dashboard.review.create');

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|max:255',
            'url' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "review_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/reviews');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['satisfied'] = (isset($request->satisfied) && $request->satisfied == 'on') ? 1: 0 ;

        Review::create($request_data);
        session()->flash('success', trans('review.added_successfully'));
        return redirect()->route('dashboard.reviews.index');
    }//end of store

    public function edit(review $review)
    {
        return view('dashboard.review.edit', ['review' => $review ]);
    }//end of edit

    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'max:255',
            'url' => 'url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->image) {
                // delete image if exist
            if ($review->image_path != null && Storage::disk("public_uploads")->exists('/reviews/' . $review->image_path)) {
                Storage::disk('public_uploads')->delete('/reviews/' . $review->image_path);
            }//end of if

            // upload new image
            $image = $request->file('image');
            $name = "review_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/reviews');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['satisfied'] = (isset($request->satisfied) && $request->satisfied == 'on') ? 1: 0 ;
        
        $review->update($request_data);
        session()->flash('success', trans('review.updated_successfully'));
        return redirect()->route('dashboard.reviews.index');

    }//end of update

    public function destroy(Review $review)
    {
        // delete image if exist
        if ($review->image_path != null && Storage::disk("public_uploads")->exists('/reviews/' . $review->image_path)) {
            Storage::disk('public_uploads')->delete('/reviews/' . $review->image_path);
        }//end of if

        $review->delete();
        session()->flash('success', trans('review.deleted_successfully'));
        return redirect()->route('dashboard.reviews.index');
    }//end of destroy
}
