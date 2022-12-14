<?php

use Illuminate\Support\Facades\Route;

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
    return view('guest.home');
})->name('home');

Auth::routes();

Route::middleware('auth')
        ->name('admin.')
        ->prefix('admin')
        ->namespace('Admin')
        ->group(function(){
            Route::get('/', 'HomeController@index')->name('index');
            Route::get('/my-profile', 'HomeController@profile')->name('profile');
            Route::get('/my-reports', 'HomeController@report')->name('report');
            Route::resource('dishes', 'DishController');
            Route::get('order', 'OrderController@index')->name('order.index');
            Route::get('order/{order}', 'OrderController@show')->name('order.show');
        });

// potrebbe creare problemi?
Route::get('{any?}', function(){
    return view('guest.home');
})->where('any', '.*')->name('home');

