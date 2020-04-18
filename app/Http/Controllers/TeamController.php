<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;
use Asana\Client;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        $users = User::all();
        $posts = Posts::all();

        // Access Token Instructions:
        
        // 1. set your token environment variable to a Personal Access Token found in Asana Account Settings
        
        // create a $client->with a Personal Access Token
        $client = Client::accessToken('1/898650441958819:ee9a906811ddb6d29c939372d5a8b91c');

        return view('team', [
            'posts' => $posts,
            'users' => $users,
            'client' => $client
        ]);

        return view('team');
    }
    
}
