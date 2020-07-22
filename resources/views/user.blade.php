@extends('layouts.app')

<!--Individual User Profile View-->

@section('title', $user->name)

@section('content')

<div class="container pt-3">

    <!-- SUCCESS -->
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert" style="top:2%; position: fixed; left:2%; z-index:100; width: 300px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading p-1">Success!</h4>
        <p class="p-1">{{ Session::get('success') }}</p>
    </div>
    @endif

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
        </div>

        <div class="col-md-4 py-3">
             <!--Editing Tasks-->
             <h2 class="pb-3">📝 Editing</h2>
            @foreach($posts as $task)
            @if (($task->editor) == $user->id && (($task->progress) != "Complete"))

            @include('components.minitask')

            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
