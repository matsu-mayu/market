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

Route::get('/', 'ItemController@index');

Auth::routes();

Route::get('/top', 'ItemController@index')->name('items.index');
Route::resource('items', 'ItemController');

Route::get('/items/{item}/edit_image', 'ItemController@editImage')->name('items.edit_image');
Route::patch('/items/{item}/edit_image', 'ItemController@updateImage')->name('items.update_image');

Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile', 'ProfileController@update')->name('profile.update');
Route::get('/profile/edit_image', 'ProfileController@editImage')->name('profile.edit_image');
Route::patch('/profile/edit_image', 'ProfileController@updateImage')->name('profile.update_image');

Route::resource('users', 'UserController')->only([
    'show',
]);

Route::get('/users/{user}/exhibitions', 'UserController@exhibitions')->name('users.exhibitions');

Route::resource('likes', 'LikeController')->only([
    'index'    
]);

Route::patch('/items/{item}/toggle_like', 'ItemController@toggleLike')->name('items.toggle_like');

Route::get('/items/{item}/confirm', 'ItemController@confirm')->name('items.confirm');
Route::get('/items/{item}/finish', 'ItemController@finish')->name('items.finish');