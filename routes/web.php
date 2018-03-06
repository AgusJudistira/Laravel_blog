<?php


Route::get('/', 'BlogsController@index');
Route::get('/{cat_id}', 'BlogsController@show_sort_cat')->where('cat_id', '[0-9]+'); // the {cat_id} is a wildcard and have to be restricted with regex to only accept numbers

Route::get('/backend', 'BlogsController@backend');

Route::post('/backend', 'BlogsController@store');

Route::get('/edit/{blog_id}', 'BlogsController@show_blog_detail')->where('blog_id', '[0-9]+');

Route::post('/edit/{blog_id}', 'BlogsController@store_blog_detail')->where('blog_id', '[0-9]+');

Route::get('/edit/{blog_id}/{comment_id}', 'BlogsController@delete_comment')->where(['blog_id' => '[0-9]+', 'comment_id' => '[0-9]+']);

Route::get('/fullblog/{blog_id}', 'BlogsController@fullblog')->where('blog_id', '[0-9]+');

Route::post('/fullblog/{blog_id}', 'BlogsController@store_comment')->where('blog_id', '[0-9]+');
Route::post('/',[
    'uses' => 'BlogsController@postSearch',
    'as' => 'search'
 ]);
Route::get('/create_cat', 'CategoryController@show');
Route::post('/create_cat', 'CategoryController@store');
Route::get('/posts/invoer', 'CategoryController@create_cat_menu');
// Route::get('/{cat_id}', 'BlogsController@show_sort_cat');//deze moet altijd als laatste








