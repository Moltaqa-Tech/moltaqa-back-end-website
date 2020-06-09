<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;

class PortofolioController extends Controller
{
    //

    public function index()
    {
        $categories = PortofolioCategory::where("status", 1)->get();
        $portofolios = Portofolio::with(["images"])->whereHas( "category", function($query) {
            $query->where("status", 1);
        })->where('status', 1)->get();
        return view("layouts.site.portofolio", ["categories" => $categories, "portofolios" => $portofolios]);
    }
}
