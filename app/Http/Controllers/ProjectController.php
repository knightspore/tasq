<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Posts;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        
    }

    public function view($id) {

        //Imports
        $thisproject = Project::findOrFail($id);
        $projects = Project::all();
        $tasks = Posts::all();
        $users = User::all();

        return view('project', [
            'thisproject'=>$thisproject,
            'projects'=>$projects,
            'tasks'=>$tasks,
            'users'=>$users,
        ]);
    }
}
