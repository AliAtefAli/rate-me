<?php

//dry  don't  repeat your self
Route::get('/', 'HomeController@index')->name('dashboard.home');
Route::resource('user', 'UserController');
Route::post('user/changePassword/{user}', 'UserController@changePassword')->name('user.changePassword');
Route::post('user/changeRole/{user}', 'UserController@changeRole')->name('user.changeRole');
Route::put('user/delete', 'UserController@delete');
Route::resource('category', 'CategoryController');
Route::resource('menu', 'MenuController');
Route::resource('store', 'StoreController');
Route::resource('product', 'ProductController');
Route::delete('productDelete', 'ProductController@delete')->name('product.delete');
Route::resource('addition', 'AdditionController');
Route::resource('subscription', 'SubscriptionController');
Route::get('site/edit', 'SettingController@edit')->name('site.edit');
Route::put('site/update/{setting}', 'SettingController@update')->name('site.update');
Route::resource('role', 'RoleController');
Route::get('role/permission/{id}', 'RoleController@editPermission')->name('edit.permission');
Route::post('role/permission/{id}', 'RoleController@savePermission')->name('save.permission');
Route::resource('permission', 'PermissionController');
Route::resource('offer', 'OfferController');
//Route::resource('message', 'MessageController');
// Messages
Route::get('message/', 'MessageController@index')->name('message.index');
Route::get('message/{id}', 'MessageController@show')->name('message.show');
Route::get('message/makeRead/{id}', 'MessageController@makeAsRead')->name('message.makeAsRead');
Route::put('message/replyNotification/{id}', 'MessageController@replyNotification')->name('message.replyNotification');
Route::put('message/replySMS/{id}', 'MessageController@replySMS')->name('message.replySMS');
Route::put('message/replyEmail/{id}', 'MessageController@replyEmail')->name('message.replyEmail');
//Route::resource('complaint', 'ComplaintController');
// Complaints
Route::get('complaint/', 'complaintController@index')->name('complaint.index');
Route::get('complaint/{id}', 'ComplaintController@show')->name('complaint.show');
Route::get('complaint/makeRead/{id}', 'ComplaintController@makeAsRead')->name('complaint.makeAsRead');
Route::put('complaint/replyNotification/{id}', 'ComplaintController@replyNotification')->name('complaint.replyNotification');
Route::put('complaint/replySMS/{id}', 'ComplaintController@replySMS')->name('complaint.replySMS');
Route::put('complaint/replyEmail/{id}', 'ComplaintController@replyEmail')->name('complaint.replyEmail');
