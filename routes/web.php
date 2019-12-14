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
Route::get('/posts/{id}', 'PostController@show') -> name('post.show');
Route::get('/create', 'PostController@create') -> name('post.create');

Route::post('/create', 'PostController@store') -> name('post.store');
Route::post('/posts/{id}', 'CommentController@store') -> name('comment.store');
Route::post('/posts/delete/{id}', 'PostController@destroy') -> name('post.destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
