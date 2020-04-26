<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Posts;
use Session;
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

    public function edit($id) {

        //Imports
        $project = Project::findOrFail($id);
        $projects = Project::all();
        $tasks = Posts::all();
        $users = User::all();

        return view('project.edit', [
            'project'=>$project,
            'projects'=>$projects,
            'tasks'=>$tasks,
            'users'=>$users,
        ]);
    }

    public function save($id) {
        $name = request('name');
        $site = request('site');
        $logo = request('logo');
        $sop = request('sop');
        $niche = request('niche');
        $accountmgr = request('accountmgr');
        $clientname = request('clientname');
        
        $p = Project::findOrFail($id);
        $p->update(['name' => $name]);
        $p->update(['site' => $site]);
        $p->update(['logo' => $logo]);
        $p->update(['sop' => $sop]);
        $p->update(['niche' => $niche]);
        $p->update(['accountmgr' => $accountmgr]);
        $p->update(['clientname' => $clientname]);

        Session::flash('success', 'Project Updated.');

        $projects = Project::all();
        $tasks = Posts::all();
        $users = User::all();

        return view('project', [
            'thisproject'=>$p,
            'projects'=>$projects,
            'tasks'=>$tasks,
            'users'=>$users,
        ]);

    }
}
