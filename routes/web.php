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

Route::get('/', 'HomeController@index');

Route::get('/view/{post}','HomeController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/posts', 'PostController@index');

Route::post('/posts/dashboard', 'PostController@store');

//Route::get('/posts/dashboard', 'PostController@index');

Route::get('/posts/create', 'PostController@create');

Route::get('/posts/{post}','PostController@show');

Route::get('/posts/{post}/edit', 'PostController@edit');

//Route::patch('/posts/dashboard', 'PostController@update');

Route::patch('/posts/{post}','PostController@update');

Route::delete('/posts/{post}', 'PostController@destroy');




