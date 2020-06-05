<?php

// Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
//     Route::get('/', 'WelcomeController@index')->name('welcome');
// });//end of dashboard routes

Route::prefix('dashboard')->name('dashboard.')->namespace("Dashboard")->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/', 'WelcomeController@index')->name("welcome");
    Route::get('/contact-messages', 'ContactUsController@index')->name("contact");
});//end of dashboard routes

