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

//Route::get('/', 'BlogsController@index');

Route::get('/', function() {
    $blogs = App\Blog::latest()->get();

    return view('blogs.frontend', compact('blogs'));
});

Route::get('/create_cat', 'CategoryController@show');

Route::post('/create_cat', 'CategoryController@store');


Route::get('/backend', 'BlogsController@backend');


Route::post('/posts/invoer', 'BlogsController@store');

Route::get('/detail/detail', 'BlogsController@detail');


