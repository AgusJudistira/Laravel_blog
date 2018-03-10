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

Route::get('/{cat_id}', 'BlogsController@show_sort_cat')->where('cat_id', '[0-9]+'); // the {cat_id} is a wildcard and have to be restricted with regex to only accept numbers

Route::get('/backend', 'BlogsController@backend');
// Route::get('/', 'BlogsController@show_sort_month');

Route::post('/backend', 'BlogsController@store');

Route::get('/edit/{blog_id}', 'BlogsController@show_blog_detail')->where('blog_id', '[0-9]+');

Route::post('/edit/{blog_id}', 'BlogsController@store_blog_detail')->where('blog_id', '[0-9]+');

Route::get('/edit/{blog_id}/{comment_id}', 'BlogsController@delete_comment')->where(['blog_id' => '[0-9]+', 'comment_id' => '[0-9]+']);

Route::get('/fullblog/{blog_id}', 'BlogsController@fullblog')->where('blog_id', '[0-9]+');

Route::post('/fullblog/{blog_id}', 'BlogsController@store_comment')->where('blog_id', '[0-9]+');

Route::get('/create_cat', 'CategoryController@show');

Route::post('/create_cat', 'CategoryController@store');

Route::get('/posts/invoer', 'CategoryController@create_cat_menu');

Route::post('/zoeken', 'BlogsController@zoeken');







