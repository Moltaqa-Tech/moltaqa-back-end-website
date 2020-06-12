<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\PriceAttr;
use Illuminate\Http\Request;

use App\PriceCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PriceCategoryController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $priceCategories = PriceCategory::when($request->search, function($q) use ($request) {
            return $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate(static::PAGINATION_COUNT);

        return view("dashboard.price-category.index", ["priceCategories" => $priceCategories]);
    }// end of index


    public function show(PriceCategory $priceCategory)
    {
        $priceAttrs = PriceAttr::where("price_type", $priceCategory->price_type)->where("locale", $priceCategory->locale)->get();
        $activePriceAttrs = $priceCategory->attrs()->where("active", 1)->pluck("attr_id")->all();
        $activePriceCases = $priceCategory->attrs()->where("status", 1)->pluck("attr_id")->all();
        return view("dashboard.price-category.attrs", ["priceAttrs" => $priceAttrs, "priceCategory" => $priceCategory, 'activePriceAttrs' => $activePriceAttrs, 'activePriceCases' => $activePriceCases]);
    }//end of show


    public function saveCategoryAttrs(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:price_categories,id',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $categoryId = $request->category_id;
        $priceCategory = PriceCategory::find($categoryId);
        $categoryAttrs = isset($request->attrs) ? $request->attrs :[];
        $categoryAttrsStatus = isset($request->cases) ? $request->cases :[];
        $priceAttrIds = PriceAttr::where("price_type", $priceCategory->price_type)->pluck("id")->all();

        $priceCategory->attrs()->detach();

        foreach($priceAttrIds as $id) {
            $priceCategory->attrs()->attach($id, ["active" => in_array($id, $categoryAttrs), "status" => in_array($id, $categoryAttrsStatus)]);
        }

        // $priceCategory->attrs()->attach(array_diff($priceAttrIds, $categoryAttrs), ["active" => 0]);

        session()->flash('success', trans('price-category.saved_successfully'));
        return redirect()->route('dashboard.price-categories.index');
    }

    public function create()
    {
        return view('dashboard.price-category.create');

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'saved_price' => 'required|numeric|min:0',
            'price_type' => 'required|numeric|between:1,2',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['locale'] = (isset($request->locale) && $request->locale == 'on') ? 'ar': 'en' ;

        PriceCategory::create($request_data);
        session()->flash('success', trans('price-category.added_successfully'));
        return redirect()->route('dashboard.price-categories.index');
    }//end of store

    public function edit(PriceCategory $priceCategory)
    {
        return view('dashboard.price-category.edit', ['priceCategory' => $priceCategory ]);
    }//end of edit

    public function update(Request $request, PriceCategory $priceCategory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'max:255',
            'price' => 'numeric|min:0',
            'saved_price' => 'numeric|min:0',
            'price_type' => 'numeric|between:1,2',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();
        // check status
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['locale'] = (isset($request->locale) && $request->locale == 'on') ? 'ar': 'en' ;
        $priceCategory->update($request_data);
        session()->flash('success', trans('price-category.updated_successfully'));
        return redirect()->route('dashboard.price-categories.index');

    }//end of update

    public function destroy(PriceCategory $priceCategory)
    {
        $priceCategory->delete();
        session()->flash('success', trans('price-category.deleted_successfully'));
        return redirect()->route('dashboard.price-categories.index');
    }//end of destroy
}
