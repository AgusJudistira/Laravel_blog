<?php



Route::get('/', 'BlogsController@index');
Route::get('/show_sort_cat/{cat_id}', 'BlogsController@show_sort_cat');

Route::get('/backend', 'BlogsController@backend');

Route::post('/posts/invoer', 'BlogsController@store');

Route::get('/detail/detail', 'BlogsController@detail');

Route::get('/create_cat', 'CategoryController@show');

Route::get('/posts/invoer', 'CategoryController@create_cat_menu');

Route::post('/create_cat', 'CategoryController@store');




