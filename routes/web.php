<?php
<<<<<<< HEAD

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

Route::get('/', function () {
    return view('welcome');
});
=======
/*
Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');
*/
Route::get('/', 'PostsController@index');
?>
>>>>>>> cee55095efd0b7ade6e8f6d608322b28aafdfff1
