<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    const PAGINATION_COUNT = 10;

    public function index(Request $request)
    {
        $contactMessages = ContactUs::when($request->search, function($q) use ($request) {
            return $q->where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        })->latest("id")->paginate(static::PAGINATION_COUNT);

        return view('dashboard.contact.index', ["contactMessages" => $contactMessages]);
    }
}
