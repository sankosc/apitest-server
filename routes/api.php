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

Route::post('login', 'Api\AuthController@login');
Route::get('hello', 'Api\TestController@hello');
Route::get('refresh', 'Api\AuthController@refresh');

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::get('me', 'Api\AuthController@me');
    Route::post('echo', 'Api\TestController@echo');
});
