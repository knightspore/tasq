<?php

use Illuminate\Support\Facades\Http;
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

// Main Pages

Route::get('/', 'WelcomeController@index')->name('welcome');                        // Dashboard Welcome Page
Route::get('/home', 'HomeController@index')->name('home');                          // Home Page - Task Sheet View
Route::get('/post', 'PostController@index')->name('post');                          // Card view Page
Route::get('/archive', 'ArchiveController@index')->name('archive');                 // Archive View (Posts Below 0)
Route::get('/team', 'TeamController@index')->name('team');                          // Team
Route::get('/projects', 'ProjectController@all')->name('projects');
Route::get('/submit', 'SubmitController@index')->name('submit');                    // Add new Post Page
Route::post('submit', 'SubmitController@store');                                    // Submit Task

Route::get('/post/{id}', 'PostController@view')->name('task');                      // View Individual Posts
Route::get('/post/{id}/edit', 'PostController@edit')->name('edittask');             // View Individual Posts
Route::post('/post/{id}/save', 'PostController@save')->name('savetask');            // Edit Existing Post

// Individual Task View Interactions
Route::post('pickup', 'PostController@pickup')->name('pickup');                     //Add user to task
Route::post('archivepost', 'PostController@archivepost')->name('archivepost');      //Archive Task
Route::post('editing', 'PostController@editing')->name('editing');                  // Edit Task
Route::post('complete', 'PostController@complete')->name('complete');               // Complete Task
Route::post('folder', 'PostController@folder')->name('folder');                     // Add Task Folder
Route::post('livelink', 'PostController@livelink')->name('livelink');               // Add Live Link

Route::get('/kpi', 'KpiController@index')->name('kpi');                             // KPI Page
Route::get('/user', 'UserController@index')->name('user');                          // User
Route::get('/user/{id}', 'UserController@view')->name('profile');                   //View Individual Users
Route::get('/user/{id}/edit', 'UserController@edit')->name('editprofile');                      //View Individual Users
Route::post('/user/{id}/save', 'UserController@save')->name('saveprofile');                     //View Individual Users


Route::get('/project/{id}', 'ProjectController@view')->name('project');                         // View Individual Project
Route::get('/project/{id}/edit', 'ProjectController@edit')->name('editproject');                // View Individual Project
Route::post('/project/{id}/save', 'ProjectController@save')->name('saveproject');               // View Individual Project

Route::get('/admin', 'AdminController@index')->name('admin');
