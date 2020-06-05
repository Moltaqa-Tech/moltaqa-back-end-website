<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\Service;
use App\Team;

class HomeController extends Controller
{
    public function index() {
        $services = Service::where("status", 1)->where("work_flow", 0)->get();
        $teams = Team::where("status", 1)->get();
        $lastWork = Portofolio::with("images")->where("status", 1)->latest("id")->first();
        // portofolio part
        $categories = PortofolioCategory::where("status", 1)->get();
        $categoryAllId = PortofolioCategory::where("status", 1)->where("name", "like", "%all%")->first()->id;
        $portofolios = Portofolio::with("images")->where('status', 1)->get();
        return view('layouts.site.home', ["teams" => $teams, "services" => $services, "lastWork" => $lastWork, "categories" => $categories, "portofolios" => $portofolios, "categoryAllId" => $categoryAllId]);
    }
}
