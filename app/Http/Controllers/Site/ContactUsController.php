<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{


    public function index()
    {
        return view('layouts.contact-us');
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
