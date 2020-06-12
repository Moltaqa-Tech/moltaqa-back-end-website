<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Portofolio;
use Illuminate\Http\Request;

use App\PortofolioCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PortofolioCategoryController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $portofolioCategories = PortofolioCategory::when($request->search, function($q) use ($request) {
            return $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate(static::PAGINATION_COUNT);

        return view("dashboard.porto-category.index", ["portofolioCategories" => $portofolioCategories]);
    }// end of index

    public function create()
    {
        return view('dashboard.porto-category.create');

    }//end of create

    public function store(Request $request)
    {

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required']];

        }//end of for each

        $request->validate($rules);

        $request_data = $request->all();

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        PortofolioCategory::create($request_data);
        session()->flash('success', trans('porto-category.added_successfully'));
        return redirect()->route('dashboard.portofolio-categories.index');
    }//end of store

    public function edit(PortofolioCategory $portofolioCategory)
    {
        return view('dashboard.porto-category.edit', ['portofolioCategory' => $portofolioCategory ]);
    }//end of edit

    public function show(Request $request, PortofolioCategory $portofolioCategory)
    {
        $portofolios = Portofolio::where("category_id", $portofolioCategory->id)->when($request->search, function($q) use ($request) {
            return $q->where('title', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.porto-category.portos", ["portofolios" => $portofolios]);
    }// end of show

    public function update(Request $request, PortofolioCategory $portofolioCategory)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required']];

        }//end of for each


        $request->validate($rules);

        $request_data = $request->all();
        // check status
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        $portofolioCategory->update($request_data);
        session()->flash('success', trans('porto-category.updated_successfully'));
        return redirect()->route('dashboard.portofolio-categories.index');

    }//end of update

    public function destroy(PortofolioCategory $portofolioCategory)
    {
        $portofolioCategory->delete();
        session()->flash('success', trans('porto-category.deleted_successfully'));
        return redirect()->route('dashboard.portofolio-categories.index');
    }//end of destroy
}
