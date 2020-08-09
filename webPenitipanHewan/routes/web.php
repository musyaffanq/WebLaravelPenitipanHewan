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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('layouts', 'PemilikController@index');

Route::get('layouts/create', 'PemilikController@create');
Route::get('layouts/{pemilik}', 'PemilikController@show')->where('pemilik', '[0-9]+');
Route::post('layouts', 'PemilikController@store');

Route::get('layouts/{pemilik}/edit', 'PemilikController@edit');
Route::patch('layouts/{pemilik}', 'PemilikController@update');

Route::delete('layouts/{pemilik}', 'PemilikController@destroy');