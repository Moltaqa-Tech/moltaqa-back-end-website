<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\ContactUs;
use App\Support;
use Illuminate\Http\Request;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class ContactUsController extends Controller
{


    public function index()
    {
        $currentLanguage = LaravelLocalization::getCurrentLocale();
        $supports = Support::where("locale", $currentLanguage)->where("status", 1)->get();
        return view('layouts.site.contact-us', ["supports" => $supports]);
    }

    public function store(Request $request)
    {
        $contactUs = new ContactUs();
        $contactUs->name = $request->contactName;
        $contactUs->email = $request->contactEmail;
        $contactUs->message = $request->contactMessage;
        $contactUs->save();
        return redirect()->back();
    }
}
