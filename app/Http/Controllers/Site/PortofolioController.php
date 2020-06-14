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

        $portofolios = Portofolio::with(["images"])->where('status', 1)->whereHas( "categories", function($query) {
            $query->where("status", 1);
        })->get();
        return view("layouts.site.portofolio", ["categories" => $categories, "portofolios" => $portofolios]);
    }
}
