<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\PriceAttr;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PriceAttributeController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $priceAttributes = PriceAttr::when($request->search, function($q) use ($request) {
            return $q->whereTranslationLike('name', 'LIKE', '%' . $request->search . '%');
        })->paginate(static::PAGINATION_COUNT);

        return view("dashboard.price-attribute.index", ["priceAttributes" => $priceAttributes]);
    }// end of index

    public function create()
    {
        return view('dashboard.price-attribute.create');

    }//end of create

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', 'max:255']];

        }//end of for each

        $rules += [ 'price_type' => ['required', 'numeric']];

        $request->validate($rules);

        $request_data = $request->all();

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        PriceAttr::create($request_data);
        session()->flash('success', trans('price-attrs.added_successfully'));
        return redirect()->route('dashboard.price-attrs.index');
    }//end of store

    public function edit(PriceAttr $priceAttr)
    {
        return view('dashboard.price-attribute.edit', ['priceAttr' => $priceAttr ]);
    }//end of edit

    public function update(Request $request, PriceAttr $priceAttr)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', 'max:255']];

        }//end of for each

        $rules += [ 'price_type' => ['required', 'numeric']];

        $request->validate($rules);

        $request_data = $request->all();
        // check status
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        // $priceAttr = PriceAttr::find($id);
        $priceAttr->update($request_data);
        session()->flash('success', trans('price-attribute.updated_successfully'));
        return redirect()->route('dashboard.price-attrs.index');

    }//end of update

    public function destroy(PriceAttr $priceAttr)
    {
        $priceAttr->delete();
        session()->flash('success', trans('price-attribute.deleted_successfully'));
        return redirect()->route('dashboard.price-attrs.index');
    }//end of destroy
}
