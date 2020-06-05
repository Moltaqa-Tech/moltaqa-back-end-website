<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Service;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $services = Service::when($request->search, function($q) use ($request) {
            return $q->where('title', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.service.index", ["services" => $services]);
    }// end of index

    public function create()
    {
        return view('dashboard.service.create');

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'desc' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "service_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\uploads\services');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['work_flow'] = (isset($request->work_flow) && $request->work_flow == 'on') ? 1: 0 ;

        Service::create($request_data);
        session()->flash('success', trans('service.added_successfully'));
        return redirect()->route('dashboard.services.index');
    }//end of store

    public function edit(Service $service)
    {
        return view('dashboard.service.edit', ['service' => $service ]);
    }//end of edit

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'max:255',
            'desc' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->image) {
                // delete image if exist
            if ($service->image_path != null && Storage::disk("public_uploads")->exists('/services/' . $service->image_path)) {
                Storage::disk('public_uploads')->delete('/services/' . $service->image_path);
            }//end of if

            // upload new image
            $image = $request->file('image');
            $name = "service_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\uploads\services');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;
        $request_data['work_flow'] = (isset($request->work_flow) && $request->work_flow == 'on') ? 1: 0 ;

        $service->update($request_data);
        session()->flash('success', trans('service.updated_successfully'));
        return redirect()->route('dashboard.services.index');

    }//end of update

    public function destroy(Service $service)
    {
        // delete image if exist
        if ($service->image_path != null && Storage::disk("public_uploads")->exists('/services/' . $service->image_path)) {
            Storage::disk('public_uploads')->delete('/services/' . $service->image_path);
        }//end of if

        $service->delete();
        session()->flash('success', trans('service.deleted_successfully'));
        return redirect()->route('dashboard.services.index');
    }//end of destroy
}
