<?php

// Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
//     Route::get('/', 'WelcomeController@index')->name('welcome');
// });//end of dashboard routes

// Auth Routes

Route::get('dashboard/login', array('uses' => 'Dashboard\AuthController@showLogin', 'as' => 'login'))->middleware('guest');
Route::post('dashboard/login', array('uses' => 'Dashboard\AuthController@doLogin'));

Route::prefix('dashboard')->name('dashboard.')->middleware(["auth"])->namespace("Dashboard")->group(function () {

    // Logout Route
    Route::get("/logout", "AuthController@logout");

    Route::get('/', 'HomeController@index');
    Route::get('/', 'WelcomeController@index')->name("welcome");
    Route::get('/contact-messages', 'ContactUsController@index')->name("contact");
    Route::resource('/services', 'ServiceController')->except(['show']);
    Route::resource('/blogs', 'BlogController')->except(['show']);
    Route::resource('/teams', 'TeamController')->except(['show']);
    Route::resource('/portofolio-categories', 'PortofolioCategoryController')->except(['show']);
    Route::resource('/price-categories', 'PriceCategoryController');
    Route::resource('/price-attrs', 'PriceAttributeController')->except(['show']);
    Route::post('/category-attrs', 'PriceCategoryController@saveCategoryAttrs');
    Route::resource('/portofolios', 'PortofolioController')->except(['show']);

});//end of dashboard routes

