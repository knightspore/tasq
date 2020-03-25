@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<div style="height: 80vh;" class="container text-center mt-4">

    <!--Guest Welcome Area-->

    @guest
    <div style="padding-top: 15em;">
        <h1 class="">Welcome to <span class="text-success">Travel Tractions</span> Task Manager</h1>
    </div>
    @endguest

    <!--User Dashboard-->

    @auth
    <h1>Welcome, <span class="text-success">{{ Auth::user()->name }}</span>.</h1>
    <h5 class="mb-4">What are we working on today?</h5>

    <div class="row">
        <div class="col-md-8 text-left shadow-sm">
            <!--TOP 3 PRIORTY-->
            <h2 class="py-3">❕ Top Priority Pickups</h2>

            @foreach(array_slice($tasks->sortByDesc('priority')->toArray(), 0, 3) as $task)
            <h4>{{ $task['task'] }} <span class="text-muted">- {{ $task['type'] }}</span></h4>
            <h5 class="text-success">{{ $task['site'] }}</h5>
            <a href="/post/{{ $task['id'] }}" class="text-secondary" target="_blank"><button
                    class="btn btn-sm btn-outline-success mb-5 shadow-sm">View Task</button></a>
            @endforeach

            <hr>
            <!--RECENTLY ADDED TASKS-->
            <h2 class="py-3">📫 Recently Added</h2>
            <!--Gets the latest 5 posts and puts them in an array-->
            @foreach(array_slice($tasks->sortByDesc('created_at')->toArray(), 0, 3) as $task)
            <h4>{{ $task['task'] }} <span class="text-muted">- {{ $task['type'] }}</span></h4>
            <h5 class="text-info">{{ $task['site'] }}</h5>
            <a href="/post/{{ $task['id'] }}" class="text-secondary" target="_blank"><button
                    class="btn btn-sm btn-outline-info mb-5 shadow-sm">View Task</button></a>
            @endforeach

        </div>
        <div class="col-md-4 text-left">
            
            
            <div class="container mx-auto pt-4">@include('components.weather')

            <h4 class="py-4">🎯 Tasks you're working on</h4>

            @foreach($tasks as $task)
            @if(($task->user) == Auth::user()->name && (($task->progress) === "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
            </div>
            <hr>
            <h4 class="py-4">🔥 KPI this Month</h4>

        </div>
    </div>

    @endauth
</div>

@endsection
