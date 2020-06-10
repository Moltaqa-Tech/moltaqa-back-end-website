<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PortofolioController extends Controller
{
    //

    public function index()
    {
        $currentLanguage = LaravelLocalization::getCurrentLocale();
        $categories = PortofolioCategory::where("status", 1)->where("locale", $currentLanguage)->get();

        $portofolios = Portofolio::with(["images"])->where('status', 1)->where("locale", $currentLanguage)->whereHas( "category", function($query) use ($currentLanguage) {
            $query->where("status", 1)->where("locale", $currentLanguage);
        })->get();
        return view("layouts.site.portofolio", ["categories" => $categories, "portofolios" => $portofolios]);
    }
}
