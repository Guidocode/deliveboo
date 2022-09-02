<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ristoranti', 'Api\PageController@index');

Route::get('tipi', 'Api\PageController@getType');
Route::get('{slug}','Api\PageController@getRestaurant');
// Route::get('ristoranti-filtrati', 'Api\PageController@filteredReasearch');
