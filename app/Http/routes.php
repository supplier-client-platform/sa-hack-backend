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
    Route::get('product/all','ProductController@index');
    Route::get('product/{id}','ProductController@index_get');
    Route::post('product/new','ProductController@store');
    Route::patch('product/update/{id}','ProductController@update');
    Route::delete('product/delete/{id}','ProductController@destroy');
});

Route::group(['prefix' => 'order'], function () {
    Route::get('order/all','OrderController@index');
    Route::get('order/{id}','OrderController@index_id');
    Route::post('order/new','OrderController@store');
    Route::patch('order/update/{id}','OrderController@update');
    Route::delete('order/delete/{id}','OrderController@destroy');

});