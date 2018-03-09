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
Auth::routes();

Route::get('/', 'FrontendController@index')->name('home');

Route::get('/backend', 'BackendController@backend')->name('backend');

Route::get('/{cat_id}', 'FrontendController@show_sort_cat')->where('cat_id', '[0-9]+'); // the {cat_id} is a wildcard and have to be restricted with regex to only accept numbers

Route::get('/fullblog/{blog_id}', 'FrontendController@fullblog')->where('blog_id', '[0-9]+');

Route::post('/fullblog/{blog_id}', 'FrontendController@store_comment')->where('blog_id', '[0-9]+');

Route::post('/zoeken', 'FrontendController@zoeken');


Route::post('/backend', 'BackendController@store');

Route::get('/edit/{blog_id}', 'BackendController@show_blog_detail')->where('blog_id', '[0-9]+');

Route::post('/edit/{blog_id}', 'BackendController@store_blog_detail')->where('blog_id', '[0-9]+');

Route::get('/edit/{blog_id}/{comment_id}', 'BackendController@delete_comment')->where(['blog_id' => '[0-9]+', 'comment_id' => '[0-9]+']);


Route::get('/create_cat', 'CategoryController@show');

Route::post('/create_cat', 'CategoryController@store');

Route::get('/posts/invoer', 'CategoryController@create_cat_menu');


Route::get('/user-login', 'Auth\LoginController@showLoginForm')->name('user.login');

Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::post('/user-login', 'Auth\LoginController@userLogin')->name('user.login.submit');


Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::get('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

