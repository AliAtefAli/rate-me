<?php

Route::get('/', 'Dashboard\HomeController@index')->name('dashboard.home');
Route::resource('user', 'Dashboard\UserController');
Route::put('user\delete', 'Dashboard\UserController@delete');
Route::resource('category', 'Dashboard\CategoryController');
Route::resource('menu', 'Dashboard\MenuController');
Route::resource('store', 'Dashboard\StoreController');
Route::resource('product', 'Dashboard\ProductController');
Route::delete('productDelete', 'Dashboard\ProductController@delete')->name('product.delete');
Route::resource('subscription', 'Dashboard\SubscriptionController');
Route::get('site/edit', 'Dashboard\SettingController@edit')->name('site.edit');
Route::put('site/update', 'Dashboard\SettingController@update')->name('site.update');
