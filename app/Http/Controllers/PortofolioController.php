<?php

namespace App\Http\Controllers;

use App\Portofolio;
use App\PortofolioCategory;

class PortofolioController extends Controller
{
    //

    public function index()
    {
        $categories = PortofolioCategory::where("status", 1)->get();
        $categoryAllId = PortofolioCategory::where("status", 1)->where("name", "like", "%all%")->first()->id;
        $portofolios = Portofolio::with("images")->where('status', 1)->get();
        return view("layouts.portofolio", ["categories" => $categories, "portofolios" => $portofolios, "categoryAllId" => $categoryAllId]);
    }
}
