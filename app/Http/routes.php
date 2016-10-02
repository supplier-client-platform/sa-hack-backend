<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'product'], function () {
    Route::get('/products','ProductController@index');
    Route::post('/products/save','ProductController@store');
    Route::patch('/products/update','ProductController@update');
    Route::delete('/products/delete','ProductController@destroy');
});

Route::group(['prefix' => 'order'], function () {
    Route::get('/orders','OrderController@index');
    Route::post('/orders/save','OrderController@store');
    Route::patch('/orders/update','OrderController@update');
    Route::delete('/orders/delete','OrderController@destroy');

});