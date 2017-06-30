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

/*
    
    用户认证系统

*/

Route::group(['namespace' => 'Auth'], function () {

    // Sessions
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);

    // Registration
    Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'RegisterController@register']);

     // Password reset
    Route::get('password/reset', ['as' => 'password.forgot', 'uses' => 'ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.forgot.post', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'ResetPasswordController@reset']);

    // Email address confirmation
    Route::get('email-confirmation', ['as' => 'email.send_confirmation', 'uses' => 'EmailConfirmationController@send']);
    Route::get('email-confirmation/{email_address}/{code}', ['as' => 'email.confirm', 'uses' => 'EmailConfirmationController@confirm']);

});

Route::get('/dashboard', 'DashboardController@show')->name('dashboard');
