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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');

Route::get('category', 'CategoryController@index');

Route::get('store/{id}', 'StoreController@index');
Route::get('store/{id}/show', 'StoreController@show');

Route::get('menu/{id}', 'MenuController@index');
Route::get('menu/{id}/show', 'MenuController@show');

Route::get('product/{id}', 'ProductController@index');
Route::get('product/{id}/show', 'ProductController@show');

Route::get('favorite/{id}', 'FavoriteController@show');

Route::post('rate', 'FavoriteController@store');

