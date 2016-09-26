<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('foodorder/create');
});

Route::get('foodorder', 'OrderController@index');
Route::get('foodorder/create', 'OrderController@create');

Route::post('foodorder', 'OrderController@store');
