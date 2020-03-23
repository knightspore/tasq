@extends('layouts.app')
<!--This is the individual Task or "Post Listing" View-->
@section('title', $task->task )

@section('content')

<div class="container pt-5">
    
        @if (($task->priority) == 0)
        <h1><badge class="badge badge-dark">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        @elseif (($task->priority) <= 3)                         
        <h1><badge class="badge badge-info">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        @elseif (($task->priority) <= 6) 
        <h1><badge class="badge badge-primary">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        @elseif (($task->priority) <= 8) 
        <h1><badge class="badge badge-warning">{{ $task->priority}}</badge> {{ $task->task }}</h1>        
        @else
        <h1><badge class="badge badge-danger">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        @endif

        <h3>Due {{\Carbon\Carbon::parse($task->due)->diffForHumans()}}</h3>
        <h3 class="text-primary"><a href="https://{{ $task->site }}" target="_blank">{{ $task->site }}</a></h3> 
        <div class="row ml-2">
            @isset ($task->folder)
            <h6><a href="{{ $task->folder }} "target="_blank">📁 View Folder</a></h6>
            @endisset
            @isset ($task->live)
            <h6><a class="ml-sm-2" href="{{ $task->live }} "target="_blank">🌐 View Live Link</a></h6>
            @endisset
            </div>

        <hr class="mb-3">

        <div class="m-2">

                @if ($task->user == NULL)
                <button class="btn btn-outline-secondary">➕ Pick up Task</button>
                @else
                <button class="btn btn-outline-primary m-1 mx-auto">🤺 <strong>{{ $task->user }}</strong<></button>

                    @if ($task->editor == NULL)
                    <button class="btn btn-outline-warning m-1 mx-auto">Edit ✏</button>
                    @else
                    <button class="btn btn-warning m-1 mx-auto">Edited by {{$task->editor}} ✔</button>
                    @endif

                    @if ($task->progress == 'Complete')
                    <button class="btn btn-success m-1 mx-auto">Complete ✔</button>
                    @else
                    <button class="btn btn-outline-success m-1 mx-auto">Complete ❔</button>
                    @endif

                @endif

                


                
            </div>
            
            <div class="card bg-info text-white m-2">
            <div class="card-body">
                <h2 class="card-title"><strong>{{ $task->type }}</strong> 🎯 {{ $task->points }} Points</h2>
                <h4></h4>
                <p>{{ $task->comment }}</p>
                <hr>
                <p><a href="/{{ $task->site }}" class="text-light" target="_blank">View Site SOP</a></p>
            </div>
                
            </div>
        <hr class="mb-3">
       
        
        <div class="d-grid m-2">
        @empty ($task->folder)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#postfolder">
        📁 Add Task Folder
        </button>
        <!--Modal Popup-->
        <div class="modal fade" id="postfolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Google Drive link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <label for="postfolder">Double check your sharing settings</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://drive.google.com/</span>
                    </div>
                    <input type="text" class="form-control" id="postfolder" aria-describedby="basic-addon3">
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        @endempty

        @empty ($task->live)
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#livelink">
        🔗 Add Live Link
        </button>
        <!--Modal Popup-->
        <div class="modal fade" id="livelink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a live link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="live-link">Use a clean url</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://example.com/post-name/</span>
                        </div>
                        <input type="text" class="form-control" id="live-link" aria-describedby="basic-addon3">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        @endempty


       @if ($task->progress == 'Complete')
       <a href="#" class="text-muted"><p>😴 Archive Task</p></a>
        @endif
        </div>


        
        <hr class="mb-3">


       <a href="{{ URL::previous() }}" class="text-secondary"><button class="btn btn-outline-secondary">Back</button></a>

       

    </div>

@endsection