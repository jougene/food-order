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
    return redirect('orders/create');
});

Route::get('orders', 'OrderController@index');
Route::get('orders/create', 'OrderController@create');

Route::post('orders', 'OrderController@store');
