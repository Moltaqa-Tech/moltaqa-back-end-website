<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
