<?php


Route::get('/', 'BlogsController@index');
Route::get('/frontend', 'CategoryController@show');//??????

Route::get('/create_cat', 'CategoryController@show');

Route::post('/create_cat', 'CategoryController@store');


Route::get('/backend', 'BlogsController@backend');


Route::post('/posts/invoer', 'BlogsController@store');

Route::get('/detail/detail', 'BlogsController@detail');


