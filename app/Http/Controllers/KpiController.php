<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KpiController extends Controller
{


    public function index()
    {

        $users = User::all();

        return view('kpi', [
            'users' => $users
        ]);

        return view('kpi');
    }
}
