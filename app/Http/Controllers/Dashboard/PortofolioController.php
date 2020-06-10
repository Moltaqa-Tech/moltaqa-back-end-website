<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\PortofolioImage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $portofolios = Portofolio::when($request->search, function($q) use ($request) {
            return $q->where('title', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.portofolio.index", ["portofolios" => $portofolios]);
    }// end of index

    public function create()
    {
        $portofolioCategories = PortofolioCategory::all();
        return view('dashboard.portofolio.create', ['portofolioCategories' => $portofolioCategories]);

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|max:520',
            'category_id' => 'required|exists:portofolio_categories,id',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['locale'] = (isset($request->locale) && $request->locale == 'on') ? 'ar': 'en' ;
        $portofolio = Portofolio::create($request_data);

        foreach ($request->images as $image) {
            $randStr = substr(str_shuffle(MD5(microtime())), 0, 10);
            $name = "portofolio_" . $randStr . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/portofolios');
            $image->move($destinationPath, $name);
            PortofolioImage::create([
                'image_path' => $name,
                'portofolio_id' => $portofolio->id,
            ]);
        }//end of foreach

        session()->flash('success', trans('portofolio.added_successfully'));
        return redirect()->route('dashboard.portofolios.index');
    }//end of store

    public function edit(Portofolio $portofolio)
    {
        $portofolioCategories = PortofolioCategory::all();
        // dd($portofolioCategories);
        return view('dashboard.portofolio.edit', ['portofolio' => $portofolio, 'portofolioCategories' => $portofolioCategories]);
    }//end of edit

    public function update(Request $request, Portofolio $portofolio)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'max:255',
            'description' => 'max:520',
            'category_id' => 'exists:portofolio_categories,id',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->images) {
            // delete images if exists
            foreach($portofolio->images as $pImage) {
                if ($pImage->image_path != null && Storage::disk("public_uploads")->exists('/portofolios/' . $pImage->image_path)) {
                    Storage::disk('public_uploads')->delete('/portofolios/' . $pImage->image_path);
                }//end of if
                $pImage->delete();
            }

            foreach ($request->images as $image) {
                $randStr = substr(str_shuffle(MD5(microtime())), 0, 10);
                $name = "portofolio_" . $randStr . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/portofolios');
                $image->move($destinationPath, $name);
                PortofolioImage::create([
                    'image_path' => $name,
                    'portofolio_id' => $portofolio->id,
                ]);
            }//end of foreach
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['locale'] = (isset($request->locale) && $request->locale == 'on') ? 'ar': 'en' ;

        $portofolio->update($request_data);
        session()->flash('success', trans('portofolio.updated_successfully'));
        return redirect()->route('dashboard.portofolios.index');

    }//end of update

    public function destroy(Portofolio $portofolio)
    {
        // Delete all portofolio images
        foreach($portofolio->images as $pImage) {
            if ($pImage->image_path != null && Storage::disk("public_uploads")->exists('/portofolios/' . $pImage->image_path)) {
                Storage::disk('public_uploads')->delete('/portofolios/' . $pImage->image_path);
            }//end of if
            $pImage->delete();
        }
        // delete portofolio
        $portofolio->delete();
        session()->flash('success', trans('portofolio.deleted_successfully'));
        return redirect()->route('dashboard.portofolios.index');
    }//end of destroy
}
