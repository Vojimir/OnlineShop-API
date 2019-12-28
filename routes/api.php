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

Route::post('/register', 'RegisterController@create');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::resource('/managers', 'ManagerController');
Route::resource('/shops', 'ShopController');
Route::resource('/articles', 'ArticleController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});

