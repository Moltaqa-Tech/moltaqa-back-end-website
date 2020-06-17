<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\Review;
use App\Service;
use App\Team;

class HomeController extends BaseController
{
    
    public function index() {

        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $servicesTitle = "";
        foreach($services as $service) {
            $servicesTitle .=( " - "  . $service->title);
        }

        $teams = Team::where("status", 1)->get();
        $lastWork = Portofolio::with(["images"])->where("status", 1)->whereHas( "categories", function($query) {
            $query->where("status", 1);
        })->latest("id")->first();
        // portofolio part
        $categories = PortofolioCategory::where("status", 1)->get();
        $portofolios = Portofolio::with(["images"])->where("status", 1)->whereHas( "categories", function($query) {
            $query->where("status", 1);
        })->get();

        // Client said
        $reviews = Review::where("status", 1)->latest("id")->get();

        return view('layouts.site.home', ["teams" => $teams, "services" => $services, "lastWork" => $lastWork, "categories" => $categories, "portofolios" => $portofolios, "reviews" => $reviews, 'services_title' => substr($servicesTitle, 2)]);
    }
}
