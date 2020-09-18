<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskActionsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;
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

// Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

// Task Actions
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/view', [TaskController::class, 'view'])->name('tasks.view');
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/new', [TaskController::class, 'new'])->name('tasks.new');
Route::middleware(['auth:sanctum', 'verified'])->post('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::middleware(['auth:sanctum', 'verified'])->post('tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');

Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/pickup', [TaskActionsController::class, 'pickup'])->name('task.pickup');
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/edit', [TaskActionsController::class, 'edit'])->name('task.edit');
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/complete', [TaskActionsController::class, 'complete'])->name('task.complete');
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/archive', [TaskActionsController::class, 'archive'])->name('task.archive');
Route::middleware(['auth:sanctum', 'verified'])->get('tasks/{task}/delete', [TaskActionsController::class, 'delete'])->name('task.delete');

// Projects Page
Route::middleware(['auth:sanctum', 'verified'])->get('/projects', [ProjectController::class, 'show'])->name('projects.show');

// User + Profile Routes
Route::middleware(['auth:sanctum', 'verified'])->get('user/{user}/view', [UsersController::class, 'view'])->name('users.view');
