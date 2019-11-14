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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function()
        {
            return View::make('welcome');
        });
        Route::get('/home', 'HomeController@index')->name('home');
        Auth::routes();
        Route::get('/admin/users','UserController@users')->middleware('auth');
        Route::get('/users/{id}','UserController@usersID')->middleware('auth');
        Route::resource('admin/clients','ClientsController')->middleware('auth');
        Route::resource('admin/projects','ProjectsController')->middleware('auth');
        Route::resource('admin/certification','CertificationsController')->middleware('auth');

        Route::resource('admin/slider','SliderController');
        Route::resource('admin/product','ProductController');





    });


