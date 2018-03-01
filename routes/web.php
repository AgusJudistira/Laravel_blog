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

Route::get('/', 'BlogsController@index');

Route::get('/backend', 'BlogsController@backend');

Route::post('/posts/invoer', 'BlogsController@store');

Route::get('/edit/{blog_id}', 'BlogsController@show_blog_detail');

Route::post('/edit/{blog_id}', 'BlogsController@store_blog_detail');

Route::get('/fullblog/{blog_id}', 'BlogsController@fullblog');

Route::get('/create_cat', 'CategoryController@show');

Route::post('/create_cat', 'CategoryController@store');

Route::get('/posts/invoer', 'CategoryController@create_cat_menu');








