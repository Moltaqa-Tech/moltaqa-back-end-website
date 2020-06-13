<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mappers\PricingType;
use App\PriceCategory;

class PriceController extends Controller
{
    public function index() {
        $websiteCategories = PriceCategory::where('price_type', PricingType::WEBSITE_PRICING)->where("status", 1)->get();
        $hostCategories = PriceCategory::where('price_type', PricingType::HOST_PRICING)->where("status", 1)->get();

        return view('layouts.site.pricing', ["websiteCategories" => $websiteCategories, "hostCategories" => $hostCategories]);
    }
}
