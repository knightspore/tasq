<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show()
    {
        $new = Task::get()->where('progress', '==', 'Not Picked Up')->count();
        $wip = Task::get()->where('progress', '==', 'WIP')->count();
        $edit = Task::get()->where('progress', '==', 'Editing')->count();

        $totals = [$new, $wip, $edit];

        return Inertia::render('Dashboard', [
            'tasks' => Task::with(['owner', 'edited', 'proj'])->orderBy('progress', 'asc')->get()->where('archived', '==', '0'),
            'users' => User::with('tasks')->get(),
            'totals' => $totals,
        ]);
    }
}
