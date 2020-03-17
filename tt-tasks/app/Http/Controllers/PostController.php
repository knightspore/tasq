<?php

namespace App\Http\Controllers;

use App\Posts;
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
}
