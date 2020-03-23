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
Route::get('/submit', 'SubmitController@index')->name('submit');
Route::get('/post', 'PostController@index')->name('post');
Route::get('/kpi', 'KpiController@index')->name('kpi');

//Add Posts to Database
Route::post('submit', 'SubmitController@store');

//Add live link to Article

//View Individual Posts
Route::get('/post/{id}', 'PostController@view')->name('kpi');

Route::redirect('/cannabis-oil.co.za', 'https://docs.google.com/spreadsheets/d/1trD-4E03KMg_MFCF6J33JrepcT2VuuXjXQJnsAKUw4U/edit#gid=358460968', 301);
Route::redirect('/sa-airlines.co.za', 'https://docs.google.com/spreadsheets/d/1IACNzqdMb-nP0EBPxsaS8u80Jk0bpdPaT0lqx8lnKqQ/edit#gid=0', 301);
Route::redirect('/domesticflights-southafrica.co.za', 'https://docs.google.com/spreadsheets/d/1IACNzqdMb-nP0EBPxsaS8u80Jk0bpdPaT0lqx8lnKqQ/edit#gid=0', 301);

