<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\ContactUs;

class ContactUsController extends Controller
{

    public function getUnSeenMessagesCount()
    {
       return ContactUs::where("is_seen", 0)->count();
    }// end of function

}//end of class
