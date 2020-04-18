<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;
use Asana\Client;

class UserController extends Controller
{
    //Setup for /id/ profiles
    public function view($id) {
        //Imports
        $userId = User::findOrFail($id);
        $posts = Posts::all();
        $users = User::all();

        return view('user', [
            'user'=>$userId,
            'posts'=>$posts,
            'users'=>$users
        ]);

        
        



    }

    

}
