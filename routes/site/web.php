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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
        'namespace' => 'Site'
    ], function(){

        Route::get('/', 'HomeController@index');

        Route::get('/about', 'AboutController@index');

        Route::get('/pricing', 'PriceController@index');

        Route::get('/services', 'ServiceController@index');

        Route::get('/portofolio', 'PortofolioController@index');

        Route::get('/blog', 'BlogController@index');

        // Contact US routes
        Route::get('/contact', 'ContactUsController@index');
    });

Route::group(['namespace' => 'Site'], function () {
    // set this route outside of localizations group
    // because laravel macamare dosn't support post requests
    Route::post('/contact-us', 'ContactUsController@store');
});



