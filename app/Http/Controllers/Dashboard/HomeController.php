<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view("layouts.dashboard.app");
    }// end of index
}
