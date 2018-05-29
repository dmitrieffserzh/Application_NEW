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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');





// ADMIN
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'name' => 'admin'], function() {

	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	// POSTS
	Route::resource('posts', 'PostController', [ 'as' => 'admin' ]);

	// CATEGORIES
	Route::resource('categories', 'CategoryController', [ 'as' => 'admin' ]);

});



// FRONT
Route::get('news', 'PostController@index')->name('news.index');
Route::get('news/{any?}', 'PostController@index')->where('any','.*')->name('news.category');