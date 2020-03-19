@extends('layouts.app')
<!--This is the individual Task or "Post Listing" View-->
@section('title', $task->task )

@section('content')

<div class="container pt-5">
    
        <h1><badge class="badge badge-info">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        <h2 class="text-secondary">{{ $task->progress }}</h2>
        <h3>Due {{\Carbon\Carbon::parse($task->due)->diffForHumans()}}</h3>
        <h3 class="text-primary"><a href="https://{{ $task->site }}" target="_blank">{{ $task->site }}</a></h3> 
        @isset ($task->folder)
        <h6><a href="{{ $task->folder }} "target="_blank">📁 View Folder</a></h6>
        @endisset
        @isset ($task->live)
        <h6><a class="ml-3" href="{{ $task->live }} "target="_blank">🌐 View Live Link</a></h6>
        @endisset

        <hr class="mb-3">

        <div class="row">
            <div class="card bg-info text-white col-md-8 m-2">
            
            <div class="card-body">
                
                <h2 class="card-title">{{ $task->type }}</h2>
                <p>{{ $task->comment }}</p>
                <h4><strong>🎯 {{ $task->points }} Points</strong></h4>
                <hr>
                <p><a href="#" class="text-muted">View Site SOP</a></p>
            </div>
                
            </div>

            <div class="col-md-4 text-md-right">
                <button class="btn btn-primary m-1 mx-auto">🤺 <strong>{{ $task->user }}</strong<></button>
                <button class="btn btn-warning m-1 mx-auto">Edited ✔</button>
                <button class="btn btn-outline-success m-1 mx-auto">Complete ❔</button>
            </div>
        </div>

        <hr class="mb-3">

       <p><a href=""></a></p>

       <a href="{{ URL::previous() }}" class="text-secondary"><button class="btn btn-outline-secondary">Back</button></a>

       

    </div>

@endsection