<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function show()
    {
        $p = Project::all();

        return Inertia::render('Projects/Show', [
            'projects' => $p,
        ]);
    }
}
