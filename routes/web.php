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

Route::get('/', function () {return view('welcome');}) -> name('welcome');


Route::get('posts', 'PostController@index') -> name('post.index');
Route::get('posts/{id}', 'PostController@show') -> name('post.show');
Route::get('posts/{id}#{comment}?page=1', 'PostController@show') -> name('post.show.comment');
Route::get('profile/{id}', 'UserController@show') -> name('profile.show');
Route::get('create', 'PostController@create') -> name('post.create');
Route::get('home', 'HomeController@index')->name('home');

Route::post('create', 'PostController@store') -> name('post.store');
Route::post('posts/{id}', 'CommentController@store') -> name('comment.store');

/*
Admin Routes
*/
Route::group(['middleware' => ['admin']], function () {
    Route::post('posts/{id}/delete', 'PostController@destroy') -> name('post.destroy');
    Route::post('comment/{id}/delete', 'CommentController@destroy') -> name('comment.destroy');
});

/*
Content Owner Routes
*/
Route::group(['middleware' => ['owner']], function () {
    Route::post('posts/{id}/delete', 'PostController@destroy') -> name('post.user.destroy');
    Route::post('posts/{id}/edit', 'PostController@edit') -> name('post.user.edit');
    Route::post('posts/{id}/update', 'PostController@update') -> name('post.user.update');
    Route::post('comment/{id}/delete', 'CommentController@destroy') -> name('comment.user.destroy');
});

Auth::routes();