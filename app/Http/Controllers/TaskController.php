<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function show()
    {
        return Inertia::render('Tasks/Show', [
            'tasks' => Task::orderBy('due', 'desc')->get(['id', 'due', 'user', 'site', 'name', 'progress']),
            'users' => User::get(),
            'projects' => Project::get()
        ]);
    }

    public function view($id) {
        $task = Task::find($id);
        $user = User::find($task->user);
        $editor = User::find($task->editor);
        $project = Project::find($task->site);

        return Inertia::render('Tasks/View', [
            'task' => $task,
            'user' => $user,
            'project' => $project,
            'editor' => $editor,
        ]);
    }
}
