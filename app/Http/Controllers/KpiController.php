<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KpiController extends Controller
{


    public function index()
    {

        $people = User::all();

        return view('kpi', [
            'people' => $people
        ]);

        return view('kpi');
    }
}
