<?php

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
Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('user', 'UserController', ['only' => ['index', 'show' , 'store' , 'update' ,'delete']]);
    Route::get('/user/{id}/active', 'UserController@active');
    Route::get('/user/{id}/nonactive', 'UserController@nonactive');
});
