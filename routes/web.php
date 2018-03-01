<?php


Route::get('/show_sort_cat/{cat_id}', 'BlogsController@show_sort_cat');
Route::get('/', 'BlogsController@index');
Route::get('/backend', 'BlogsController@backend');
Route::post('/posts/invoer', 'BlogsController@store');
Route::get('/edit/{blog_id}', 'BlogsController@show_blog_detail');
Route::post('/edit/{blog_id}', 'BlogsController@store_blog_detail');
Route::get('/fullblog/{blog_id}', 'BlogsController@fullblog');
Route::get('/create_cat', 'CategoryController@show');
Route::post('/create_cat', 'CategoryController@store');
Route::get('/posts/invoer', 'CategoryController@create_cat_menu');







