<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\ContactUs;

class ContactUsController extends Controller
{
    const PAGINATION_COUNT = 10;

    public function index()
    {
        $contactMessages = ContactUs::paginate(static::PAGINATION_COUNT);
        return view('dashboard.contact.index', ["contactMessages" => $contactMessages]);
    }
}
