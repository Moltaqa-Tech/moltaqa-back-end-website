<?php

namespace App\Http\Controllers;

use App\Mappers\PricingType;
use App\PriceCategory;


class PriceController extends Controller
{
    public function index() {
        $websiteCategories = PriceCategory::where('price_type', PricingType::WEBSITE_PRICING)->where("status", 1)->get();
        $hostCategories = PriceCategory::where('price_type', PricingType::HOST_PRICING)->where("status", 1)->get();
        
        return view('layouts.pricing', ["websiteCategories" => $websiteCategories, "hostCategories" => $hostCategories]);
    }
}
