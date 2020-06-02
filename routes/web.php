<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.home');
});

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/pricing', function () {
    return view('layouts.pricing');
});

Route::get('/services', 'ServiceController@index');

Route::get('/portofolio', 'PortofolioController@index');

Route::get('/blog', 'BlogController@index');


// Contact US routes
Route::get('/contact', 'ContactUsController@index');
Route::post('/contact-us', 'ContactUsController@store');



