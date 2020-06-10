<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\Review;
use App\Service;
use App\Team;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function index() {
        $currentLanguage = LaravelLocalization::getCurrentLocale();
        $services = Service::where("status", 1)->where("locale", $currentLanguage)->where("work_flow", 0)->get();
        $teams = Team::where("status", 1)->where("locale", $currentLanguage)->get();
        $lastWork = Portofolio::with(["images"])->where("locale", $currentLanguage)->where("status", 1)->whereHas( "category", function($query) use ($currentLanguage) {
            $query->where("status", 1)->where("locale", $currentLanguage);
        })->latest("id")->first();
        // portofolio part
        $categories = PortofolioCategory::where("status", 1)->where("locale", $currentLanguage)->get();
        $portofolios = Portofolio::with(["images"])->where("locale", $currentLanguage)->where("status", 1)->whereHas( "category", function($query) use ($currentLanguage) {
            $query->where("status", 1)->where("locale", $currentLanguage);
        })->get();

        // Client said
        $reviews = Review::where("status", 1)->where("locale", $currentLanguage)->latest("id")->get();

        return view('layouts.site.home', ["teams" => $teams, "services" => $services, "lastWork" => $lastWork, "categories" => $categories, "portofolios" => $portofolios, "reviews" => $reviews]);
    }
}
