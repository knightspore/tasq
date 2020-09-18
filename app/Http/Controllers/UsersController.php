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
        $t = Task::with('owner', 'edited', 'proj')->get()->where('user', '==', $u->id)->where('archived', '==', '0');
        return Inertia::render('Users/View', [
            'user' => $u,
            'userTasks' => $t,
        ]);
    }
}
