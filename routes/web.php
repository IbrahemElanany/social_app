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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
	Route::group(['prefix' => 'posts'] , function (){
	    Route::get('/', 'PostsController@index')->name('posts');
		Route::get('/myposts', 'PostsController@myPosts')->name('myposts');
		Route::get('/single/{id}', 'PostsController@singlePost')->name('post.single');
		Route::get('/create', 'PostsController@create')->name('post.add');
		Route::post('/create', 'PostsController@store')->name('post.store');
		Route::get('/edit/{id}', 'PostsController@edit')->name('post.edit');
		Route::post('/update', 'PostsController@update')->name('post.update');
		Route::get('/delete/{id}', 'PostsController@delete')->name('post.delete');

	});
	Route::group(['prefix' => 'comments'] , function (){
		Route::post('/create', 'CommentsController@store')->name('comment.create');
	});
});

Route::namespace('Admin')->prefix('admin')->group(function () {
	Route::get('/login', 'LoginController@login');
	Route::post('/login', 'LoginController@doLogin');
	Route::group(['middleware'=>'Admin:admin'], function () {
		Route::prefix('users')->group(function () {
			Route::get('/', 'UsersController@users')->name('admin.users');
			Route::get('/edit/{id}', 'UsersController@edit')->name('admin.users.edit');
			Route::post('/update', 'UsersController@update')->name('admin.users.update');
			Route::get('/delete/{id}', 'UsersController@deleteUsers')->name('admin.user.delete');
		});
		Route::prefix('posts')->group(function () {
			Route::get('/', 'PostsController@posts')->name('admin.posts');
			Route::get('/delete/{id}', 'PostsController@deletePosts')->name('admin.post.delete');
		});
		Route::prefix('comments')->group(function () {
			Route::get('/', 'CommentsController@comments')->name('admin.comments');
			Route::get('/delete/{id}', 'CommentsController@deleteComments')->name('admin.comment.delete');
		});
		Route::get('/logout', 'AdminController@logout')->name('admin.logout');
	});
});

