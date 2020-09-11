<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Dash
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

// Tasks
Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', [TaskController::class, 'show'])->name('tasks.show');

// Projects
Route::middleware(['auth:sanctum', 'verified'])->get('/projects', [ProjectController::class, 'show'])->name('projects.show');
