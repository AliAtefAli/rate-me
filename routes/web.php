<?php

Auth::routes();
Route::get('lang/{lang}', 'Website\LocalizeController')->name('lang.switch');

Route::get('/', 'HomeController@index')->name('home');
Route::resource('categories', 'Website\CategoryController');
Route::resource('stores', 'Website\StoreController');
// Route::get('{id}/menu', 'Website\StoreController@showMenu')->name('store.menu');
