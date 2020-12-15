<?php

//dry  don't  repeat your self
Route::get('/', 'HomeController@index')->name('store.home');
Route::resource('menu', 'MenuController');
Route::resource('store', 'StoreController');
Route::resource('product', 'ProductController');
Route::resource('addition', 'AdditionController');
//Route::get('site/edit', 'SettingController@edit')->name('site.edit');
//Route::put('site/update/{setting}', 'SettingController@update')->name('site.update');
// Route::resource('message', 'MessageController');
