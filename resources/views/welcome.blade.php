@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div style="height: 80vh;" class="container text-center mt-4">

    <!--Guest Welcome Area-->

    @guest
    <div class="jumbotron jumbotron-fluid rounded shadow-sm bg-white">
        <h1 class="display-4">Welcome to <span class="text-success">Travel Tractions</span> Task Manager</h1>
        <p class="lead">Manage your tasks with ease.</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a>
        </p>
    </div>
    @endguest

    <!--User Dashboard-->

    @auth
    <h1><span class="text-success text-medium">Dashboard</span>.</h1>

    <div class="row">
        <div class="col-md-8 text-left">
            <!--TOP 3 PRIORTY-->
            <h2 class="py-3">📫 Top Priority Pickups</h2>

            @foreach(array_slice($tasks->where('progress', '==', 'Not Picked Up')->sortByDesc('priority')->toArray(), 0, 5) as $task)
            <div class="border rounded shadow p-3 mb-4">
            <h3><span class="badge badge-success">{{ $task['priority'] }}</span> {{ $task['task'] }} <span class="text-muted"></span></h3>
            <h5 class="text-dark">{{ $task['type'] }}</h5>
            <h5 class="text-dark"><a href="project/{{ !empty($task->proj) ? $task->proj['id']:'' }}" class="text-dark">{{ $task['site'] }}</a></h5>
            @isset($task['comment'])
            <div class="border rounded shadow-sm mb-2">
            <p class="p-3">{{$task['comment']}}</p>
            </div>
            @endisset
            <a href="/post/{{ $task['id'] }}" class="text-secondary" target="_blank"><button
                    class="btn btn-sm btn-outline-success shadow-sm">View Task</button></a>
            <div class="badge">This is a level {{$task['level']}} task for {{$task['points']}} points.</div>
            </div>
            @endforeach

        </div>
        <div class="col-md-4 text-left">
            <h4 class="pt-4 pb-3">🎯 Tasks you're working on</h4>

            @foreach($tasks as $task)
            @if(($task->user) == Auth::user()->id && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
        </div>
    </div>

    @endauth
</div>

@endsection
