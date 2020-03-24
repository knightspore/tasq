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

        return view('welcome', [
            'tasks' => $tasks
        ]);

        return view('welcome');
    }
}
