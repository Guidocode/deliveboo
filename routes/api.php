<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ristoranti', 'Api\PageController@index');
Route::get('tipi', 'Api\PageController@getType');
// Route::get('ristoranti-filtrati/{name}', 'Api\PageController@filteredReasearch');

