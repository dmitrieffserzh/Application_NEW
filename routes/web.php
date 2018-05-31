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


	// IMAGE UPLOADER
	Route::post('/upload', 'ImageController@upload_news_image')->name('admin.news.upload');
});


// FRONT
Route::post('/login', 'Auth\LoginController@ajax_auth');

Route::get('news', 'PostController@index')->name('news.index');
Route::get('news/{any?}', 'PostController@index')->where('any','.*')->name('news.category');


// USERS
Route::get('users', 'ProfileController@index')->name('users.list');
Route::get('user/id{id}', 'ProfileController@profile')->name('users.profile');
Route::get('user/id{id}/edit', 'ProfileController@edit')->name('users.profile.edit');
Route::post('user/id{id}/update', 'ProfileController@update')->name('users.profile.update');
// POSTS

//Route::resource('posts','PostController');
Route::group(['middleware' => 'filter.view.counts'], function() {
    Route::get('stories', 'StoryController@index')->name('stories.index');
    Route::get('stories/story_id{id}', 'StoryController@show')->name('stories.view');
});

// COMMENTS
Route::post('add_comment', 'CommentController@add_comment')->name('comment.add');
//Route::get('posts', 'PostController@index')->name('posts.index');
//Route::post('posts', 'PostController@index')->name('posts.index');
//Route::post('posts/create_in_list', 'PostController@createInList')->name('posts.create_in_list');
//Route::post('upload','PostController@upload')->name('upload');

// LIKE
Route::post('like', ['as' => 'like', 'uses' => 'LikeController@like']);

// IMAGE UPLOADER
Route::post('image_upload', 'ImageController@upload')->name('image.upload');

// FOLLOWERS
Route::post('follow_handler','FollowController@follow')->name('follow_handler');