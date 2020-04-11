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

        return view('post');
    }

    

    /*
    public function create(Request $request)
    {
        $newPost = new Posts();
        $newPost->taskname = $request->task;
        
        //{Posts the Databse}
        $newPost->save();

        return redirect('/');


    }
    */

    public function view($id) {
        $postId = Posts::findOrFail($id);
        $users = User::all();

        return view('task', [
            'task'=>$postId,
            'users' => $users
        ]);
    }

}
