<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\UserResource;
use App\Task;
use App\Project;
use App\User;

class ApiController extends Controller
{
    public function tasks()
    {
        return TaskResource::collection(Task::all());
    }

    public function projects()
    {
        return ProjectResource::collection(Project::all());
    }

    public function users()
    {
        return UserResource::collection(User::all());
    }
}
