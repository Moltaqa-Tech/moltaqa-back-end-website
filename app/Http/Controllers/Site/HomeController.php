<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\Review;
use App\Service;
use App\Team;

class HomeController extends Controller
{
    public function index() {
        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $teams = Team::where("status", 1)->get();
        $lastWork = Portofolio::with(["images"])->whereHas( "category", function($query) {
            $query->where("status", 1);
        })->where("status", 1)->latest("id")->first();
        // portofolio part
        $categories = PortofolioCategory::where("status", 1)->get();
        $portofolios = Portofolio::with(["images"])->whereHas( "category", function($query) {
            $query->where("status", 1);
        })->where('status', 1)->get();
        // dd($portofolios);

        // Client said
        $reviews = Review::where("status", 1)->latest("id")->get();

        return view('layouts.site.home', ["teams" => $teams, "services" => $services, "lastWork" => $lastWork, "categories" => $categories, "portofolios" => $portofolios, "reviews" => $reviews]);
    }
}
