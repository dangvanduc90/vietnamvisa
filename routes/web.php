<?php

//Auth::routes();

Route::namespace('User')->group(function () {
    // auth user
//    Route::get('/login', 'LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'LoginController@login')->name('post.user.login');
    Route::post('/signup', 'RegisterController@register')->name('post.user.signup');
    Route::get('/logout', 'LoginController@logout')->name('post.user.logout');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', 'UserController@profile')->name('profile');
    });

    Route::get('/', 'HomeController@index')->name('home');
});
