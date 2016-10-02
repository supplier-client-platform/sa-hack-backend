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

// HACK: Workaround for CORS issue
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', function () {
    return view('welcome');
});

// CHANGED: update was changed to post, delete was changed to get
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('product/all','ProductController@index');
    Route::get('product/{id}','ProductController@index_get');
    Route::post('product/new','ProductController@store');
    Route::post('product/update/{id}','ProductController@update');
    Route::get('product/delete/{id}','ProductController@destroy');
});

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('order/all','OrderController@index');
    Route::get('order/{id}','OrderController@index_id');
    Route::post('order/new','OrderController@store');
    Route::post('order/update/{id}','OrderController@update');
    Route::get('order/delete/{id}','OrderController@destroy');
});