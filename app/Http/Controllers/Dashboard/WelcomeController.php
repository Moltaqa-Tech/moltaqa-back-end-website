<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\Service;
use App\Blog;
use App\ContactUs;
use App\Team;

class WelcomeController extends Controller
{
    public function index() {
        $blogs_count = Blog::count();
        $services_count = Service::count();
        $teams_count = Team::count();
        $portofolios_count = Portofolio::count();
        $messages_count = ContactUs::count();

        return view("welcome", ['blogs_count'=> $blogs_count,
                                'services_count' => $services_count,
                                'teams_count' => $teams_count,
                                'portofolios_count' => $portofolios_count,
                                'messages_count' => $messages_count,
        ]);
    }// end of index
}
