<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(["middleware" => "api"], function () {
    Route::post('regist', 'Api\AuthController@regist');
    Route::post('login', 'Api\AuthController@login');
    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::post('logout', 'Api\AuthController@logout');
        Route::post('refresh', 'Api\AuthController@refresh');
        Route::post('me', 'Api\AuthController@me');
    });
});
