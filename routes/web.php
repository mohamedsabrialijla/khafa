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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'WEB\User\HomeController@index')->name('home');
//    Route::get('/home', 'WEB\User\HomeController@index')->name('home');
    Route::get('/home', function () {
        return redirect('/');
    })->name('home-page');

    
    
   
    

    Auth::routes();

 

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
        Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
        Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout')->name('admin.logout');
    });







    Route::group(['middleware' => ['web', 'admin', 'auth:admin'], 'prefix' => 'admin', 'as' => 'admin.',], function () {
        Route::get('/', function () {
            return redirect('/admin/home');
        });

        Route::get('home', 'WEB\Admin\HomeController@index')->name('admin.home');
        // change document admin -cpanel
        Route::get('profile', 'WEB\Admin\HomeController@profile')->name('admin.profile');
        Route::post('profile', 'WEB\Admin\HomeController@update')->name('admin.update');
        Route::post('update_password', 'WEB\Admin\HomeController@update_password')->name('admin.update_password');

        Route::get('settings', 'WEB\Admin\SettingController@index')->name('settings.index');
        Route::post('settings', 'WEB\Admin\SettingController@update')->name('settings.update');
        Route::resource('pages', 'WEB\Admin\PageController', ['except' => ['update']]);
        Route::post('pages/{id}', 'WEB\Admin\PageController@update');

        Route::get('/users', 'WEB\Admin\UserController@index')->name('users.all');
        Route::post('/users', 'WEB\Admin\UserController@store')->name('users.store');
        Route::get('/users/create', 'WEB\Admin\UserController@create')->name('users.create')->middleware('auth');
        Route::delete('users/{id}', 'WEB\Admin\UserController@destroy')->name('users.destroy');
        Route::get('/users/{id}/edit', 'WEB\Admin\UserController@edit')->name('users.edit');
        Route::post('/users/{id}', 'WEB\Admin\UserController@update')->name('users.update');

        // change password for user
        // Route::get('/users/{id}/edit_password', 'WEB\Admin\UserController@edit_password')->name('users.edit_password');
        // Route::post('/users/{id}/edit_password', 'WEB\Admin\UserController@update_password')->name('users.edit_password');


        Route::get('/driver_man', 'WEB\Admin\DriverController@index')->name('driver_man.all');
        Route::delete('driver_man/{id}', 'WEB\Admin\DriverController@destroy')->name('driver_man.destroy');
        Route::get('/driver_man/{id}/edit', 'WEB\Admin\DriverController@edit')->name('driver_man.edit');
        Route::post('/driver_man/{id}', 'WEB\Admin\DriverController@update')->name('driver_man.update');
        Route::get('/driver_man/{id}/edit_password', 'WEB\Admin\DriverController@edit_password')->name('driver_man.edit_password');
        Route::post('/driver_man/{id}/edit_password', 'WEB\Admin\DriverController@update_password')->name('driver_man.edit_password');


        Route::get('/ads', 'WEB\Admin\AdsController@index')->name('ads.all');
        Route::post('/ads', 'WEB\Admin\AdsController@store')->name('ads.store');
        Route::get('/ads/create', 'WEB\Admin\AdsController@create')->name('ads.create')->middleware('auth');
        Route::delete('ads/{id}', 'WEB\Admin\AdsController@destroy')->name('ads.destroy');
        Route::get('/ads/{id}/edit', 'WEB\Admin\AdsController@edit')->name('ads.edit');
        Route::post('/ads/{id}', 'WEB\Admin\AdsController@update')->name('ads.update');
        Route::get('/splash/create', 'WEB\Admin\AdsController@create_splash')->name('splash.create')->middleware('auth');
        Route::get('/splash', 'WEB\Admin\AdsController@index_splash')->name('splash.all');
        Route::get('/splash/{id}/edit', 'WEB\Admin\AdsController@edit_splash')->name('splash.edit');

        


        Route::get('/company', 'WEB\Admin\CompanyController@index')->name('company.all');
        Route::post('/company', 'WEB\Admin\CompanyController@store')->name('company.store');
        Route::get('/company/create', 'WEB\Admin\CompanyController@create')->name('company.create')->middleware('auth');
        Route::delete('company/{id}', 'WEB\Admin\CompanyController@destroy')->name('company.destroy');
        Route::get('/company/{id}/edit', 'WEB\Admin\CompanyController@edit')->name('company.edit');
        Route::post('/company/{id}', 'WEB\Admin\CompanyController@update')->name('company.update');


        Route::get('/products', 'WEB\Admin\ProductsController@index')->name('products.all');
        Route::post('/products', 'WEB\Admin\ProductsController@store')->name('products.store');
        Route::get('/products/create', 'WEB\Admin\ProductsController@create')->name('products.create')->middleware('auth');
        Route::delete('products/{id}', 'WEB\Admin\ProductsController@destroy')->name('products.destroy');
        Route::get('/products/{id}/edit', 'WEB\Admin\ProductsController@edit')->name('products.edit');
        Route::post('/products/{id}', 'WEB\Admin\ProductsController@update')->name('products.update');

        
        Route::get('/helps', 'WEB\Admin\HelpController@index')->name('helps.all');
        Route::post('/helps', 'WEB\Admin\HelpController@store')->name('helps.store');
        Route::get('/helps/create', 'WEB\Admin\HelpController@create')->name('helps.create')->middleware('auth');
        Route::delete('helps/{id}', 'WEB\Admin\HelpController@destroy')->name('helps.destroy');
        Route::get('/helps/{id}/edit', 'WEB\Admin\HelpController@edit')->name('helps.edit');
        Route::post('/helps/{id}', 'WEB\Admin\HelpController@update')->name('helps.update');


        Route::get('/contacts', 'WEB\Admin\ContactController@index')->name('contacts.all');
        Route::delete('contacts/{id}', 'WEB\Admin\ContactController@destroy')->name('contacts.destroy');
        Route::get('/contacts/{id}/edit', 'WEB\Admin\ContactController@edit')->name('contacts.edit');


       
    });
});