<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\UserCollection;
use App\Task;
use App\Project;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// API Info
Route::get('/', function() {
    return [
        'routes' => [
            'tasks' => '/task',
            'projects' => '/project',
            'users' => '/user',
        ],
    ];
});

// API Routes
Route::get('/tasks', 'Api\ApiController@tasks');

Route::get('/projects', 'Api\ApiController@projects');

Route::get('/users', 'Api\ApiController@users');
