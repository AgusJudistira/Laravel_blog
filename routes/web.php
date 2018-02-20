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

Route::get('/', function () {
    //return '<h1>Hello World!</h1>';
    $tasks = DB::table('tasks')->latest()->get();
    //return $tasks;
    return view('welcome', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {

    
    $task = DB::table('tasks')->find($id);
    
    //dd($task);

    return view('tasks.show', compact('tasks'));
});

Route::get('aboutus', function () {
    //return '<h1>Hello World!</h1>';
    return view('aboutus');
});
