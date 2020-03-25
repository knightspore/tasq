<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

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

        $posts = Posts::all();

        return view('home', [
            'posts' => $posts
        ]);

        return view('home');
    }

        

}
