<?php

Route::namespace('User')->group(function () {
    // auth user
    Route::get('/login', 'LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'LoginController@login')->name('post.user.login');
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', 'HomeController@index');
    });

    Route::get('/', 'HomeController@index')->name('home');
});
