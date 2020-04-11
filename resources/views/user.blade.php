@extends('layouts.app')

<!--Individual User Profile View-->

@section('title', $user->name)

@section('content')

<div class="container pt-3">

    <div class="row mt-2">
        <div class="col-md-4 py-3">
        <div class="mx-auto">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }} Profile Picture" class="responsive-image w-75 mx-auto d-block rounded-circle mb-4 shadow-sm img-thumbnail">
        </div>
        
        <h1><span class="text-success mb-5">{{ $user->name }}'s Profile</span></h1>
        
        <h4 class="text-muted">{{ $user->role }} </h4>
            <h4><a href="mailto:{{ $user->email }}" class="badge badge-primary">📧</a>
                <span class="badge badge-success">Lvl {{ $user->level }}</span>
                <span class="badge badge-success">🔥 KPI:</span>
            </h4>
        </div>
        <div class="col-md-8 py-3 shadow-sm">
        <!--Assigned Tasks-->
            <h2 class="pb-3">🎯 Working On</h2>
            @foreach($posts as $task)
            @if(($task->user) == $user->name && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
        <!--Editing Tasks-->
            <h2 class="pb-3">📝 Editing</h2>
            @foreach($posts as $task)
            @if (($task->editor) == $user->name && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
        <!--Completed Tasks-->
            <h2 class="pb-3">✔ Recently Completed</h2>
            @foreach($posts as $task)
            @if (($task->user) == $user->name && (($task->progress) == "Complete") && (($task->priority) >= 1))

            @include('components.minitask')

            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection