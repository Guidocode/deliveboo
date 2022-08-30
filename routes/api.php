<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('ristoranti', 'Api\PageController@index');
Route::apiResource('types', 'Api\TypesController');


Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
