<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    
    public function index() 
    {
        $users = User::all();
        $posts = Posts::all();

        return view('team', [
            'posts' => $posts,
            'users' => $users,
        ]);

        return view('team');
    }
    
}
