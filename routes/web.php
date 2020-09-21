<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/index', 'UserController@index')->name('users.index');

Route::get('/user/create', 'UserController@create')->name('users.create');

Route::post('/user/store', 'UserController@store')->name('users.store');

Route::get('users/{user}/tasks', 'UserTaskController')->name('users_tasks');

Route::get('users/{user}/create', 'TaskController@create')->name('tasks.create');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('tasks', 'TaskController@index');
Route::post('tasks/store', 'TaskController@store')->name('tasks.store');
Route::get('tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::delete('tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
Route::put('tasks/{task}', 'TaskController@update')->name('tasks.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
