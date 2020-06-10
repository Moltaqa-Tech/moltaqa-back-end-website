<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Service;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceController extends Controller
{

    public function index()
    {
        $currentLanguage = LaravelLocalization::getCurrentLocale();
        $services = Service::where("status", 1)->where("locale", $currentLanguage)->where("work_flow", 0)->get();
        $workFlows = Service::where("status", 1)->where("locale", $currentLanguage)->where("work_flow", 1)->get();
        return view("layouts.site.services", ["services" => $services, "workFlows" => $workFlows]);
    }
}
