<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $workFlows = Service::where("status", 1)->where("work_flow", 1)->get();
        return view("layouts.site.services", ["services" => $services, "workFlows" => $workFlows]);
    }
}
