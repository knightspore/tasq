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

Route::get('/', 'WelcomeController@index')->name('welcome');        // Dashboard Welcome Page
Route::get('/home', 'HomeController@index')->name('home');          // Home Page - Task Sheet View
Route::get('/submit', 'SubmitController@index')->name('submit');    // Add new Post
Route::get('/post', 'PostController@index')->name('post');          // Card
Route::get('/kpi', 'KpiController@index')->name('kpi');             // KPI Page
Route::get('/user', 'UserController@index')->name('user');          // User
Route::get('/team', 'TeamController@index')->name('team');          // Team

//Add Tasks to Database
Route::post('submit', 'SubmitController@store');

//Add user to task
Route::post('pickup', 'PostController@pickup');

//Add live link to Article

//View Individual Posts
Route::get('/post/{id}', 'PostController@view')->name('task');


//View Individual Users
Route::get('/user/{id}', 'UserController@view')->name('profile');


Route::redirect('/cannabis-oil.co.za', 'https://docs.google.com/spreadsheets/d/1trD-4E03KMg_MFCF6J33JrepcT2VuuXjXQJnsAKUw4U/edit#gid=358460968', 301);
Route::redirect('/sa-airlines.co.za', 'https://docs.google.com/spreadsheets/d/1IACNzqdMb-nP0EBPxsaS8u80Jk0bpdPaT0lqx8lnKqQ/edit#gid=0', 301);
Route::redirect('/domesticflights-southafrica.co.za', 'https://docs.google.com/spreadsheets/d/1IACNzqdMb-nP0EBPxsaS8u80Jk0bpdPaT0lqx8lnKqQ/edit#gid=0', 301);

