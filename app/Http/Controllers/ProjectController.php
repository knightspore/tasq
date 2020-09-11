<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function show()
    {
        return Inertia::render('Projects/Show');
    }
}
