<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $tasks = Posts::all();
        $users = User::all();

        return view('welcome', [
            'tasks' => $tasks,
            'users' => $users,
        ]);

        return view('welcome');
    }
}
