<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
