<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'API\UserController@login');
    Route::post('/register', 'API\UserController@register');
    Route::post('/join_driver', 'API\UserController@join_driver');
    Route::post('/logout', 'API\UserController@logout')->middleware('auth:api');
    // Route::get('/getUser/{id}', 'API\UserController@getUser');
    // Route::get('/show/{id}', 'API\UserController@show');
    Route::post('/update', 'API\UserController@update')->middleware('auth:api');
    Route::post('/reset_password', 'API\UserController@reset_password')->middleware('auth:api');
    Route::post('/forget_password', 'Auth\ForgotPasswordController@getResetToken');
    Route::post('/verify', 'API\UserController@verify');
    Route::post('/fcm_token', 'API\UserController@fcm_token')->middleware('auth:api');
    Route::post('/sending', 'API\UserController@sendSMS');
    Route::post('/sendVerificationCode', 'API\UserController@sendVerificationCode');
   
    //Craftat

    Route::get('/all_products', 'API\ProductController@all_products');
    Route::get('/home_page', 'API\ProductController@home_page');

   


    // Static App
    Route::get('/all_pages', 'API\AppController@all_pages');
    Route::get('/pages/{slug}', 'API\AppController@getPage');
    Route::post('/message_contact', 'API\AppController@message');
    Route::get('/settings', 'API\AppController@get_setting');
    Route::get('/faq', 'API\AppController@faq');
    Route::get('/ads', 'API\AppController@ads');
    Route::get('/slider', 'API\AppController@slider');
    
});