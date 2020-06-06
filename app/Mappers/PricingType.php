<?php

namespace App\Mappers;


class PricingType
{
    const WEBSITE_PRICING = 1;
    const HOST_PRICING = 2;

    public static function handle($type)
    {
        switch($type) {
            case static::WEBSITE_PRICING:
                return "Website Pricing";
            case static::HOST_PRICING:
                return "Host Pricing";
            default:
                return "";
        }
    }
}
