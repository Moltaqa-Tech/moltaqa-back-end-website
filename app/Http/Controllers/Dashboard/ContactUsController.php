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

        // mark messages as seen
        $unSeenMessages = ContactUs::where('is_seen', 0);
        $unSeenMessages->update(["is_seen" => 1]);
        return view('dashboard.contact.index', ["contactMessages" => $contactMessages]);
    }
}
