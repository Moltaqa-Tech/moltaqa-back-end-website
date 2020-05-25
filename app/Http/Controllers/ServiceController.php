<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $workFlows = Service::where("status", 1)->where("work_flow", 1)->get();
        return view("layouts.services", ["services" => $services, "workFlows" => $workFlows]);
    }
}
