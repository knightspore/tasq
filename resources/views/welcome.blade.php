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
    <h1><span class="text-success text-medium">Dashboard</span>.</h1>

    <div class="row">
        <div class="col-md-8 text-left">
            <!--TOP 3 PRIORTY-->
            <h2 class="py-3">📫 Top Priority Pickups</h2>

            @foreach(array_slice($tasks->where('progress', '==', 'Not Picked Up')->sortByDesc('priority')->toArray(), 0, 5) as $task)
            <div class="border rounded shadow-sm p-3 mb-2">
            <h4><span class="badge badge-dark">{{ $task['priority'] }}</span> {{ $task['task'] }} <span class="text-muted">| {{ $task['type'] }}</span></h4>
            <h5 class="text-dark">{{ $task['site'] }}</h5>
            <p>{{$task['user']}}</p>
            <a href="/post/{{ $task['id'] }}" class="text-secondary" target="_blank"><button
                    class="btn btn-sm btn-outline-success shadow-sm">View Task</button></a>
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
