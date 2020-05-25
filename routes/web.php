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

Route::get('/portofolio', function () {
    return view('layouts.portofolio');
});

Route::get('/blog', function () {
    return view('layouts.blog');
});

Route::get('/contact', function () {
    return view('layouts.contact-us');
});

