<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Portofolio;
use App\PortofolioCategory;
use App\Service;
use App\Team;

class WelcomeController extends Controller
{
    public function index() {
        return view("welcome");
    }// end of index
}
