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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/addTask', 'HomeController@addTask')->name('addTask');
Route::get('/editTask/{id}', 'HomeController@editTask')->name('editTask');
Route::patch('/updateTask/{id}', 'HomeController@updateTask')->name('updateTask');
Route::get('/deleteTask/{id}', 'HomeController@deleteTask')->name('deleteTask');

