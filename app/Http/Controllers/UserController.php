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

    public function save($id)
    {
        $name = request('username');
        $email = request('email');
        $role = request('role');
        $level = request('level');
        $avatar = request('avatar');
        $slack_id = request('slack_id');
        $asana_id = request('asana_id');
        $location = request('location');
        $personallink = request('personallink');

        //Fill New User Details
        $u = User::findOrFail($id);

        $u->update(['name' => $name]);
        $u->update(['email' => $email]);
        $u->update(['role' => $role]);
        $u->update(['level' => $level]);
        $u->update(['avatar' => $avatar]);
        $u->update(['slack_id' => $slack_id]);
        $u->update(['asana_id' => $asana_id]);
        $u->update(['location' => $location]);
        $u->update(['personallink' => $personallink]);

        Session::flash('success', 'Profile Updated.');

        $posts = Posts::all();
        $users = User::all();

        // dd($user);

        return view('user', [
            'user'=>$u,
            'posts'=>$posts,
            'users'=>$users
        ]);

    }

    

}
