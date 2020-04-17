<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $posts = Posts::all();
        return view('post', [
            'posts' => $posts
        ]);
    }

    // VIEW INDIVIDUAL POST
    public function view($id) {
        $postId = Posts::findOrFail($id);
        $users = User::all();

        return view('task', [
            'task'=>$postId,
            'users' => $users
        ]);
    }

    // ADD USER TO TASK
    public function pickup() 
    {
        $user = request('user_id');
        $taskid = request('task_id');

        //Fill Post User
        $selectedtask = Posts::findOrFail($taskid);
        $selectedtask->update(['user' => $user]);
        $selectedtask->update(['progress' => 'WIP']);

        //Return View
        $users = User::all();
        $tasks = Posts::all();
        
        //Success
        Session::flash('success', 'You picked up a new task.');
       
        return view('task', [
            'task' => $selectedtask,
            'users' => $users
        ]);


    }

}
