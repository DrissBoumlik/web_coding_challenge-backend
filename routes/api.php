<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get( 'shops/likedshops/', 'ShopUserController@liked_shopes' );

    Route::resource( 'shops', 'ShopController', [
        'except' => [
            'create',
            'store',
            'edit',
            'update',
            'destroy'
        ]
    ] );

    Route::resource( 'shopusers', 'ShopUserController', [
        'except' => [
            'create',
            'show',
            'edit'
        ]
    ] );

});
