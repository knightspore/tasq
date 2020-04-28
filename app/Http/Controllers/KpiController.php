<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KpiController extends Controller
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

    public function index()
    {

        $users = User::all();

        return view('kpi', [
            'users' => $users
        ]);

        return view('kpi');
    }
}
