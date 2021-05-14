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

Route::get('/adminer', function () {
    return view('adminer');
});

Auth::routes(['register' => false]);

Route::resource('students', 'StudentController');
Route::resource('university', 'UniversityController');

Route::get('/home', 'HomeController@index')->name('home');
