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
        if(Auth::guest()) {
            return view('welcome');
        } else {
            $tasks = Posts::all();
            $newTasks = $tasks->where('progress', '==', 'Not Picked Up')->sortByDesc('priority');
            $userTasks = $tasks->where('user', '==', Auth::user()->id)->where('archived', '==', '0');

            return view('welcome', [
                'tasks' => $tasks,
                'userTasks' => $userTasks,
                'newTasks' => $newTasks,
            ]);
        }
    }
}
