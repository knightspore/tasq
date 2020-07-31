{{-- Individual Task View --}}
@extends('layouts.app')

@section('title', $task->task )
@section('description', $task->comment )

@section('content')

<div class="container pt-5">

    {{-- Success Alert --}}
    @if (Session::has('success'))
    <div class="alert alert-success" role="alert" style="top:2%; position: fixed; left:2%; z-index:100; width: 300px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading p-1">Success!</h4>
        <p class="p-1">{{ Session::get('success') }}</p>
    </div>
    @endif

    {{-- Task Priority & Name --}}
    @if (($task->priority) == 0)
    <h1>
        <badge class="badge badge-dark">{{ $task->priority}}</badge> {{ $task->task }} 📋
    </h1>
    @elseif (($task->priority) <= 3) <h1>
        <badge class="badge badge-info">{{ $task->priority}}</badge> {{ $task->task }}</h1>
        @elseif (($task->priority) <= 6) <h1>
            <badge class="badge badge-primary">{{ $task->priority}}</badge> {{ $task->task }}</h1>
            @elseif (($task->priority) <= 8) <h1>
                <badge class="badge badge-warning">{{ $task->priority}}</badge> {{ $task->task }}</h1>
                @else
                <h1>
                    <badge class="badge badge-danger">{{ $task->priority}}</badge> {{ $task->task }}
                </h1>
                @endif

                {{-- Date, Site, Folder, Live Link --}}
                <h3>Due {{\Carbon\Carbon::parse($task->due)->diffForHumans()}}</h3>
                <h3 class="text-primary"><a href="/project/{{ !empty($task->proj) ? $task->proj->id:'' }}" target="_blank">{{ $task->site }}</a></h3>
                <div class="">
                    @isset ($task->folder)
                    <h6><a class="mr-sm-2" href="{{ $task->folder }} " target="_blank">📁 View Folder</a></h6>
                    @endisset
                    @isset ($task->live)
                    <h6><a class="" href="{{ $task->live }} " target="_blank">🌐 View Live Link</a></h6>
                    @endisset
                </div>

                <hr class="mb-3">

                <div class="d-grid m-2">
                    @empty ($task->folder)
                    {{-- Button to trigger Modal --}}
                    <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal"
                        data-target="#postfolder">
                        📁 Add Task Folder
                    </button>
                    {{-- Modal --}}
                    <div class="modal fade" id="postfolder" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add a Google Drive link</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <label for="postfolder">Double check your sharing settings</label>
                                    <div class="input-group mb-3">
                                        <form class="d-inline-block text-center mx-auto" action="/folder" method="POST">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            <input type="text" class="form-control mb-2" id="postfolder"
                                                name="postfolder" aria-describedby="basic-addon3" placeholder="https://drive.google.com/">
                                            <button type="submit" class="btn btn-primary">Add link</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endempty

                    @empty ($task->live)
                    @isset($task->folder)
                    {{-- Button to trigger Modal --}}
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal"
                        data-target="#livelink">
                        🔗 Add Live Link
                    </button>
                    {{-- Modal --}}
                    <div class="modal fade" id="livelink" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add a live link</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <label for="livelink">Use a Clean URL (No Tags)</label>
                                    <div class="input-group mb-3">
                                        <form class="d-inline-block text-center mx-auto" action="/livelink"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            <input type="text" class="form-control mb-2" name="livelink" id="livelink"
                                                aria-describedby="basic-addon3" placeholder="https://example.com/">
                                            <button type="submit" class="btn btn-primary">Add Link</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endisset
                    @endempty


                    @if ($task->progress == 'Complete')
                    <form class="d-inline-block text-center mx-auto" action="/archivepost" method="POST">
                        @csrf
                        <input type="hidden" name="task_id" value="{{ $task->id }}" />
                        <button type="submit" class="btn btn-sm btn-outline-secondary">😴 Archive Task</button>
                    </form>
                    @endif
                </div>

                            @if (($task->progress) == "Complete")
                            <div class="card m-2 h-100">
                            @else
                            <div class="card bg-dark text-white m-2">
                                @endif
                               {{-- TASK CARD --}}
                                <div class="card-body">
                                    <h2 class="card-title"><strong>{{ $task->type }}</strong> | {{ $task->words }} Words</h2>
                                   {{-- ASSIGN & STATUS BUTTONS --}}
                                    <div class="m-2">
                                       {{-- PICK UP TASK --}}
                                        @if ($task->user == NULL)
                                        <form class="d-inline-block" action="/pickup" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            <button class="btn btn-secondary" type="submit">➕ Pick up Task</button>
                                        </form>
                                        @else

                                       {{-- DISPLAY TASK USER --}}
                                        @foreach ($users as $user)
                                        @if ($task->user == $user->id)
                                        <a href="/user/{{ $task->user }}" target="_blank"><button
                                                class="btn btn-primary m-1 mx-auto">🤺 <strong>{{ $user->name }}</strong<>
                                                    </button></a>
                                        @endif
                                        @endforeach

                                       {{-- BECOME TASK EDITOR --}}
                                        @if ($task->editor == NULL)
                                        <form class="d-inline-block" action="/editing" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            <button class="btn btn-warning m-1 mx-auto" type="submit"><strong>📝
                                                    Edit</strong></button>
                                        </form>
                                        @else

                                       {{-- DISPLAY EXISTING EDITOR --}}
                                        @foreach ($users as $user)
                                        @if ($task->editor == $user->id)
                                        <button type="submit" class="btn btn-warning m-1 mx-auto"><strong>📝
                                                {{$user->name}}</strong></button>
                                        @endif
                                        @endforeach
                                        @endif

                                       {{-- COMPLETE TASK --}}
                                        @if ($task->editor == NULL)
                                       {{-- SHOW NO COMPLETE INDICATION --}}
                                        @elseif ($task->progress != 'Complete')
                                        <form class="d-inline-block" action="/complete" method="POST">
                                            @csrf
                                            <input type="hidden" name="task_id" value="{{ $task->id }}" />
                                            <button class="btn btn-success m-1 mx-auto" type="submit"><strong>Complete
                                                    ❔</strong></button>
                                        </form>

                                       {{-- SHOW COMPLETION --}}
                                        @else
                                        <button class="btn btn-success m-1 mx-auto">Complete ✔</button>
                                        @endif

                                        @endif

                                    </div>

                                    <p>{{ $task->comment }}</p>
                                    <hr>

                                    @if (Auth::user()->level >= 5)
                                    @foreach ($users as $user)
                                    @if ($user->id == $task->created_by)
                                    <p class="text-dark">This task was created by <a href="/user/{{ $user->id }}"
                                            class="text-dark">{{ $user->name }}</a>.</p>
                                    @endif
                                    @endforeach
                                    <button class="btn btn-light btn-sm shadow-sm"><a href="/post/{{ $task->id }}/edit">Edit Task Details</a></button>
                                    @endif
                                </div>

                            </div>

                    </div>
                </div>

</div>







                @endsection
