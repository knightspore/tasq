<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Support\Facades\DB;
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
    public function update() 
    {
        $user = request('user_id');

        //Fill Post User
        Posts::where('id', $id)->update(['user', $user]);
        
        //Success
        Session::flash('success', 'You picked up a new task.');
        return view('/');

    }

}
