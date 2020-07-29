<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends Controller
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
        $users = User::all();
        $tasks = Posts::all()->where('priority', '!=', '0')->sortByDesc('priority');
        $agent = new Agent();

        return view('home', [
            'tasks' => $tasks,
            'users' => $users,
            'agent' => $agent,
        ]);
    }

}
