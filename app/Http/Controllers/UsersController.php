<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function view($id)
    {
        $u = User::find($id);
        $t = Task::get()->where('user', '==', $u->id);
        return Inertia::render('Users/View', [
            'user' => $u,
            'userTasks' => $t,
        ]);
    }
}
