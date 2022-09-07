<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ristoranti', 'Api\PageController@index');

Route::get('tipi', 'Api\PageController@getType');
Route::get('ristorante/{slug}','Api\PageController@getRestaurant');

Route::get('filter', 'Api\FilterResturant@index');

Route::resource('order', 'Api\OrderController');

