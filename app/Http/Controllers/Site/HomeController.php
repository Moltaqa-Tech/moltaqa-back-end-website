<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Service;
use App\Team;

class HomeController extends Controller
{
    public function index() {
        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $teams = Team::where("status", 1)->get();

        return view('layouts.home', ["teams" => $teams, "services" => $services]);
    }
}
