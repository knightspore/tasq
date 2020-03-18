<?php

namespace App\Http\Controllers;

use App\Users;
use App\Posts;
use Illuminate\Http\Request;

class KpiController extends Controller
{


    public function index()
    {

        $posts = Posts::all();

        return view('kpi', [
            'posts' => $posts
        ]);

        return view('kpi');
    }
}
