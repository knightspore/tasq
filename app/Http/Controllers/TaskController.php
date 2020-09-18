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
        $task = Task::with(['owner', 'edited', 'proj'])->find($id);

        return Inertia::render('Tasks/View', [
            'task' => $task,
        ]);
    }

    public function new()
    {
        return Inertia::render('Tasks/Create', [
            'creator' => Auth::user()
        ]);
    }

    public function create(Request $request)
    {
        $t = new Task();

        $t->name = $request->name;
        $t->priority = $request->priority;
        $t->due = $request->due;
        $t->site = $request->site;
        $t->type = $request->type;
        $t->words = $request->words;
        $t->is_client = $request->is_client;
        $t->progress = $request->progress;
        $t->comment = $request->comment;

        $t->save();

        return Redirect::route('tasks.view', $t->id);
    }

    public function update($id)
    {

    }
}
