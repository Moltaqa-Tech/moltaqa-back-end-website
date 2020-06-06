<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view("auth.login");
    }//end of showLogin

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);// end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }//end of if

        $userData = array(
            'email' => $request->email,
            'password' => $request->password
        );// end of userData

        // attempt to do the login
        if (Auth::attempt($userData)) {
            // Redirect to Dashboard
            return Redirect::to('/dashboard');
        } else {
            // validation dos not  success, send back to form with error message
            return Redirect::to('dashboard/login')->withErrors(['message' => 'Invalid user or password']);
        }//end of if
    }// end of doLogin

    public function logout()
    {
        // logout user
        Auth::logout();
        // redirect to login page
        return Redirect::to('dashboard/login');
    }//end of logout 
}
