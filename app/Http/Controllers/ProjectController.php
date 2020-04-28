<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Posts;
use Session;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function all() {
        $projects = Project::all();
        $tasks = Posts::all();
        $users = User::all();

        return view('projects', [
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
        $asana_id = request('asana_id');
        $comment = request('comment');
        $email = request('email');
        
        $p = Project::findOrFail($id);
        $p->update(['name' => $name]);
        $p->update(['site' => $site]);
        $p->update(['logo' => $logo]);
        $p->update(['sop' => $sop]);
        $p->update(['niche' => $niche]);
        $p->update(['accountmgr' => $accountmgr]);
        $p->update(['clientname' => $clientname]);
        $p->update(['asana_id' => $asana_id]);
        $p->update(['email' => $email]);
        $p->update(['comment' => $comment]);
        $p->update(['email' => $email]);

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
