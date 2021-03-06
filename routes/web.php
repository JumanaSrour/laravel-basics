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

Route::get('owner', 'OwnerController@index');
Route::get('car', 'CarController@index')->middleware(['lang', 'timezone', 'country']);
Route::get('mechanic', 'MechanicController@index');
Route::get('student', 'StudentController@index');
Route::get('student/withMainCourses', 'StudentController@indexConditioned');

Route::get('car/create', 'CarController@create');
Route::post('car/store', 'CarController@store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
