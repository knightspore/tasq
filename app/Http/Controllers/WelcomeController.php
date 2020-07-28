<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Posts;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $tasks = Posts::all();
        $userTasks = $tasks->where('user', '==', Auth::user()->id)->where('archived', '==', '0');
        $topTen = $tasks->where('progress', '==', 'Not Picked Up')->sortByDesc('priority');

        return view('welcome', [
            'tasks' => $tasks,
            'userTasks' => $userTasks,
            'topTen' => $topTen,
        ]);
    }
}
