<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function view($id) {
        $task = Task::find($id);
        $user = User::find($task->user);
        $editor = User::find($task->edited);
        $project = Project::find($task->proj);

        if ($task->progress == 'Not Picked Up') {
            return Inertia::render('Tasks/View', [
                'task' => $task,
            ]);
        } else {
            return Inertia::render('Tasks/View', [
                'task' => $task,
                'user' => $user,
                'project' => $project,
                'editor' => $editor,
            ]);
        };
    }
}
