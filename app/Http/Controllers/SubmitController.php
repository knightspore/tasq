<?php

namespace App\Http\Controllers;

use App\Posts;
use Session;
use Illuminate\Http\Request;

class SubmitController extends Controller
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

        return view('submit');
    }

    

    public function store() 
    {
        //Create new post
        $post = new Posts();

        //Fill Post Values
        $post->task = request('taskname');
        $post->priority = request('priority');
        $post->due = request('due');
        $post->created_at = request(date('Y-m-d H:i:s'));
        $post->updated_at = request(date('Y-m-d H:i:s'));
        $post->site = request('site');
        $post->due = request('due');
        $post->level = request('level');
        $post->type = request('type');
        $post->points = request('points');
        $post->progress = "Not Picked Up";
        $post->project = request('inlineRadioOptions');
        $post->comment = request('comments');
        $post->dump = "";

        //Save post values
        $post->save();
        
        //Complete
        Session::flash('success', 'Let the team know!');
        return view('submit');

    }
}
