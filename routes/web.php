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
    return view('welcome');
});

Route::group(['prefix' => 'user'], function () {

    Route::post('account/create', 'UserController@create')->name('create.account');
    Route::get('email/verify/{id}/{token}', 'UserController@verifyEmail')->name('verify.email');
    Route::get('/account/dashboard', 'UserController@dashboard')->name('dashboard');
  
});
