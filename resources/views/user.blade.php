@extends('layouts.app')

<!--Individual User Profile View-->

@section('title', $user->name)

@section('content')

<div class="container pt-3">

    <div class="row mt-2">
        <div class="col-md-3 py-3 text-center">
        <div class="mx-auto">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }} Profile Picture" class="responsive-image w-75 mx-auto d-block rounded-circle mb-4 shadow-sm img-thumbnail">
        </div>
        
        <h1><span class="text-success mb-5">{{ $user->name }}</span></h1>
        
        <h4 class="text-muted">{{ $user->role }} </h4>
        <hr>
            <h4><a href="mailto:{{ $user->email }}" class="badge badge-info">📧 Email</a>
                <span class="badge badge-info">🌍 {{ $user->location }}</span>
                <span class="badge badge-success">🌠 Lvl {{ $user->level }}</span>
                <span class="badge badge-success">🔥 KPI {{ !empty($user->task) ? $user->task->where('progress', 'Complete')->sum('points'):'' }}</span>
                @if ( $user->id == Auth::user()->id)
                <span class="badge badge-dark"><a href="/user/{{ $user->id }}/edit" class="text-light">Edit Profile</a></span>
                @endif
            </h4>

        </div>
        <div class="col-md-5 py-3">
        <!--Assigned Tasks-->
            <h2 class="pb-3">🎯 Working On</h2>
            @foreach($posts as $task)
            @if(($task->user) == $user->id && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach            

             <!--Editing Tasks-->
             <h2 class="pb-3">📝 Editing</h2>
            @foreach($posts as $task)
            @if (($task->editor) == $user->id && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
        </div>
        <div class="col-md-4 py-3">

        <!-- Asana Tasks     -->
        @if($user->asana_id != NULL)
        <h2 class="pb-3">🚩 Asana Tasks</h2>
            @foreach((asana()->getTasksByFilter(['assignee' => $user->asana_id,'workspace' => 476947142694091,'completed_since' => 'now']))->data as $asana_task)

            <div class="card my-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $asana_task->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">ID: {{ $asana_task->gid }}</h6>
                    <a href="https://app.asana.com/0/0/{{ $asana_task->gid }}" class="card-link" target="_blank">View</a>
                </div>
            </div>

            @endforeach
        @endif
        </div>
    </div>
</div>

@endsection