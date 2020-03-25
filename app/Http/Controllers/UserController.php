<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Setup for /id/ profiles
    public function view($id) {
        $userId = User::findOrFail($id);

        return view('user', [
            'user'=>$userId
        ]);
    }

}
