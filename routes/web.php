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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@getLastTodos')->name('getLastTodos');
//Route::post('/add', 'HomeController@createTodo')->name('createTodo');

Route::resource('todos', 'HomeController', ['only' => ['index', 'store', 'create', 'getLastTodos']]);

Route::put('/toggle', 'HomeController@toggle')->name('toggle_status');

Route::get('/users/{id}', 'UserController@show')->name('users.show');
