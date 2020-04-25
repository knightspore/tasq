<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Session;
use Illuminate\Http\Request;
use Asana\Client;

class UserController extends Controller
{
    //Setup for /id/ profiles
    public function view($id) {
        //Imports
        $user = User::findOrFail($id);
        $posts = Posts::all();
        $users = User::all();

        // dd($user);

        return view('user', [
            'user'=>$user,
            'posts'=>$posts,
            'users'=>$users
        ]);
    }

    public function edit($id) 
    {
        $userId = User::findOrFail($id);
        $posts = Posts::all();
        $users = User::all();

        return view('user.edit', [
            'user'=>$userId,
            'posts'=>$posts,
            'users'=>$users
        ]);
    }

    public function save()
    {
        $userid = request('thisuser');
        $name = request('username');
        $email = request('email');
        $role = request('role');
        $level = request('level');

        //Fill New User Details
        $userToEdit = User::findOrFail($userid);

        $userToEdit->update(['name' => $name]);
        $userToEdit->update(['email' => $email]);
        $userToEdit->update(['role' => $role]);
        $userToEdit->update(['level' => $level]);

        // dd($userToEdit);

        Session::flash('success', 'Profile Updated.');

        return back();

    }

    

}
