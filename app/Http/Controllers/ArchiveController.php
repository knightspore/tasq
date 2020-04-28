<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;

class ArchiveController extends Controller
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

    public function index()
    {
        $users = User::all();
        $posts = Posts::all();

        return view('archive', [
            'posts' => $posts,
            'users' => $users
        ]);    
    }
}
