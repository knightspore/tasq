<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

    public function new()
    {
        return Inertia::render('Tasks/Create', [
            'creator' => Auth::user()
        ]);
    }

    public function create(Request $request)
    {
        $t = Task::create($request->all());

        dd($request->all(), $t->all());



        Task::create($request->all());

        return Redirect::route('dashboard');
    }

    public function update($id)
    {

    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->progress = 'Complete';
        $task->completed = 1;
        $task->save();

        return Redirect::route('tasks.view', $id);
    }

    public function archive($id)
    {
        $task = Task::find($id);
        $task->archived = 1;
        $task->save();

        return Redirect::route('tasks.view', $id);
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();

        return Redirect::route('dashboard');

    }
}
