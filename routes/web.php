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
    return view('coming');
})->name('login');


Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/signin', function () {
    return view('signin');
})->name('signin');

Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot.password');

Route::get('user/reset_password', function () {
    return view('reset_password');
});

Route::post('/coming', 'UserController@coming')->name('coming');

Route::get('/logout', 'UserController@logout')->middleware('auth');

Route::group(['prefix' => 'user'], function () {

    Route::post('account/create', 'UserController@create')->name('create.account');
    Route::post('account/login', 'UserController@login')->name('login.account');
    Route::post('password/reset', 'UserController@resetPassword')->name('reset.password');
    Route::post('password/reset/update', 'UserController@updatePassword')->name('update.password');
    Route::get('password/reset/{email}/{token}', 'UserController@setPassword')->name('set.password');
    Route::get('email/verify/{id}/{token}', 'UserController@verifyEmail')->name('verify.email');
    Route::get('/account/dashboard', 'UserController@dashboard')->name('dashboard');

    Route::post('/invest/now', 'UserController@invest')->name('invest');

    Route::get('/account/bank', 'UserController@bankAccount')->name('bank.account');
  
    Route::post('/account/bank/save', 'UserController@saveBankAccount')->name('save.bank.account');
    Route::get('/bank/account/delete/{id}', 'UserController@deleteBankAccount')->name('delete.bank.account');
});



Route::get('command/process/transaction', function () {
	
    \Artisan::call('process:transaction');
    dd("Done");
});