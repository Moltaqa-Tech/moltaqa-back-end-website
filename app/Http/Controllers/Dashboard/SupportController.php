<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\PriceAttr;
use Illuminate\Http\Request;

use App\PriceCategory;
use App\Support;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SupportController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $supports = Support::when($request->search, function($q) use ($request) {
            return $q->whereTranslationLike('title', 'LIKE', '%' . $request->search . '%');
        })->paginate(static::PAGINATION_COUNT);

        return view("dashboard.support.index", ["supports" => $supports]);
    }// end of index

    public function create()
    {
        return view('dashboard.support.create');

    }//end of create

    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'max:255',
        //     'description' => 'max:255',
        //     'location' => 'max:255',
        //     'email' => 'email',
        //     'phone' => 'max:255',
        // ]);// end of validator

        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator);
        // }//end of if

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.title' => ['required', 'max:255']];
            $rules += [$locale . '.description' => ['required', 'max:522']];
            $rules += [$locale . '.location' => ['required', 'max:255']];

        }//end of for each

        $rules += ['email' => ['required', 'email']];
        $rules += ['phone' => ['required', 'max:255']];

        $request->validate($rules);

        $request_data = $request->all();

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        Support::create($request_data);
        session()->flash('success', trans('support.added_successfully'));
        return redirect()->route('dashboard.supports.index');
    }//end of store

    public function edit(Support $support)
    {
        return view('dashboard.support.edit', ['support' => $support ]);
    }//end of edit

    public function update(Request $request, Support $support)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|max:255',
        //     'description' => 'required|max:255',
        //     'location' => 'required|max:255',
        //     'email' => 'required|email',
        //     'phone' => 'max:255',
        // ]);// end of validator

        // if ($validator->fails()) {
        //     return Redirect::back()->withErrors($validator);
        // }//end of if

        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.title' => ['required', 'max:255']];
            $rules += [$locale . '.description' => ['required', 'max:522']];
            $rules += [$locale . '.location' => ['required', 'max:255']];

        }//end of for each

        $rules += ['email' => ['required', 'email']];
        $rules += ['phone' => ['required', 'max:255']];

        $request->validate($rules);

        $request_data = $request->all();
        // check status
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        $support->update($request_data);
        session()->flash('success', trans('support.updated_successfully'));
        return redirect()->route('dashboard.supports.index');

    }//end of update

    public function destroy(Support $support)
    {
        $support->delete();
        session()->flash('success', trans('support.deleted_successfully'));
        return redirect()->route('dashboard.supports.index');
    }//end of destroy
}
