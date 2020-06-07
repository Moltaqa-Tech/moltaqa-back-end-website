<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Team;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    const PAGINATION_COUNT = 5;

    public function index(Request $request)
    {
        $teams = Team::when($request->search, function($q) use ($request) {
            return $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view("dashboard.team.index", ["teams" => $teams]);
    }// end of index

    public function create()
    {
        return view('dashboard.team.create');

    }//end of create

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'job_title' => 'required|max:255',
            'instagram_url' => 'max:255',
            'whatsapp_url' => 'max:255',
            'facebook_url' => 'max:255',
            'twitter_url' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $request_data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = "team_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/teams');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        Team::create($request_data);
        session()->flash('success', trans('team.added_successfully'));
        return redirect()->route('dashboard.teams.index');
    }//end of store

    public function edit(team $team)
    {
        return view('dashboard.team.edit', ['team' => $team ]);
    }//end of edit

    public function update(Request $request, team $team)
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
            if ($team->image_path != null && Storage::disk("public_uploads")->exists('/teams/' . $team->image_path)) {
                Storage::disk('public_uploads')->delete('/teams/' . $team->image_path);
            }//end of if

            // upload new image
            $image = $request->file('image');
            $name = "team_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/teams');
            $image->move($destinationPath, $name);
            $request_data['image_path'] = $name;
        }//end of if

        // check status and work flow
        $request_data['status'] = (isset($request->status) && $request->status == 'on') ? 1: 0 ;

        $team->update($request_data);
        session()->flash('success', trans('team.updated_successfully'));
        return redirect()->route('dashboard.teams.index');

    }//end of update

    public function destroy(team $team)
    {
        // delete image if exist
        if ($team->image_path != null && Storage::disk("public_uploads")->exists('/teams/' . $team->image_path)) {
            Storage::disk('public_uploads')->delete('/teams/' . $team->image_path);
        }//end of if

        $team->delete();
        session()->flash('success', trans('team.deleted_successfully'));
        return redirect()->route('dashboard.teams.index');
    }//end of destroy
}
