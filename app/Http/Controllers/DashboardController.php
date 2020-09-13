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
        $totalNew = Task::get()->where('progress', '==', 'Not Picked Up')->count();
        $totalWip = Task::get()->where('progress', '==', 'WIP')->count();
        $totalEdit = Task::get()->where('progress', '==', 'Editing')->count();

        $totals = [$totalNew, $totalWip, $totalEdit];

        return Inertia::render('Dashboard', [
            'tasks' => Task::orderBy('due', 'desc')->get(['id', 'due', 'user', 'site', 'name', 'progress', 'words', 'type']),
            'users' => User::get(['id', 'name']),
            'projects' => Project::get(),
            'totals' => $totals,
        ]);
    }
}
