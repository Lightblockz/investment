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

Route::group(['prefix' => 'mail'], function () {

    Route::post('register/success', 'MailController@registrationMail')->name('success.mail');
    Route::post('password/reset', 'MailController@resetPassword')->name('reset.password.mail');
    
});

Route::get('/', function () {
    return view('signin');
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
    Route::post('/invest/via/bank/save', 'UserController@investViaBank')->name('investbank');
    Route::get('/invest/via/bank', 'UserController@investViaBankView')->name('invest.bank.view');
    Route::get('/account/bank', 'UserController@bankAccount')->name('bank.account');
    Route::post('/account/bank/save', 'UserController@saveBankAccount')->name('save.bank.account');
    Route::get('/bank/account/delete/{id}', 'UserController@deleteBankAccount')->name('delete.bank.account');

    Route::group(['prefix' => 'transactions'], function () {

        Route::get('all', 'UserController@all')->name('all.transaction');
        
    });

    Route::group(['prefix' => 'settings'], function () {

        Route::post('all', 'UserController@settings')->name('settings');
        
    });

});


Route::group(['prefix' => 'admin'], function () {

    Route::get('account/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::group(['prefix' => 'transactions'], function () {

        Route::post('transfer/decline', 'AdminController@declineTransfer')->name('decline.transfer');
        Route::post('transfer/approve', 'UserController@approveTransfer')->name('approve.transfer');
        
    });

    Route::group(['prefix' => 'settings'], function () {

        
        
    });

});





Route::get('command/process/transaction', function () {
	
    \Artisan::call('process:transaction');
    dd("Done");
});