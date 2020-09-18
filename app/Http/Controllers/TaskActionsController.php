<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskActionsController extends Controller
{
    public function pickup($id)
    {
        $task = Task::find($id);
        $task->progress = 'WIP';
        $task->user = Auth::user()->id;
        $task->save();

        return Redirect::route('tasks.view', $id);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $task->progress = 'Editing';
        $task->editor = Auth::user()->id;
        $task->save();

        return Redirect::route('tasks.view', $id);
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
