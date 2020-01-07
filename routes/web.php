<?php

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
    return view('signup');
});

Route::get('/signin', function () {
    return view('signin');
})->name('login');

Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot.password');

Route::get('user/reset_password', function () {
    return view('reset_password');
});


Route::group(['prefix' => 'user'], function () {

    Route::post('account/create', 'UserController@create')->name('create.account');
    Route::post('account/login', 'UserController@login')->name('login.account');
    Route::post('password/reset', 'UserController@resetPassword')->name('reset.password');
    Route::post('password/reset/update', 'UserController@updatePassword')->name('update.password');
    Route::get('password/reset/{email}/{token}', 'UserController@setPassword')->name('set.password');
    Route::get('email/verify/{id}/{token}', 'UserController@verifyEmail')->name('verify.email');
    Route::get('/account/dashboard', 'UserController@dashboard')->name('dashboard');
  
});
