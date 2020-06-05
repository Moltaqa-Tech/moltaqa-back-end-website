<?php

// Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
//     Route::get('/', 'WelcomeController@index')->name('welcome');
// });//end of dashboard routes

Route::prefix('dashboard')->name('dashboard.')->namespace("Dashboard")->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/', 'WelcomeController@index')->name("welcome");
    Route::get('/contact-messages', 'ContactUsController@index')->name("contact");
    Route::resource('/services', 'ServiceController')->except(['show']);
    Route::resource('/blogs', 'BlogController')->except(['show']);
    Route::resource('/teams', 'TeamController')->except(['show']);
    Route::resource('/portofolio-categories', 'PortofolioCategoryController')->except(['show']);
});//end of dashboard routes

