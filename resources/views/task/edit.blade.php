{{-- Edit Task --}}
@extends('layouts.app')

@section('title', $task->task)

@section('content')

<div class="upload container p-3">

    <h1>Edit Task Details</h1>
    <hr>
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert" style="top:2%; position: fixed; left:2%; z-index:100; width: 200px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading">Success!</h4>
        <p>{{ Session::get('success') }}</p>
        </div>
        @endif

        @if (Session::has('danger'))
        <div class="alert alert-danger" role="alert" style="bottom:10px; position: fixed; left:2%; z-index:100">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading">That didn't work... 🤔 Message support if this keeps happening.</h4>
        <p>{{ Session::get('danger') }}</p>
        </div>
        @endif

    <form action="save" method="POST">
    {{ csrf_field() }}
        <div class="row input-group">
        <input type="hidden" name="updated_by" value="{{Auth::user()->id}}"/>
            <!--Task Name-->
            <div class="form-group col-lg">
                <label for="taskname">Task Name</label>
                <input name="taskname"type="text" id="taskname" class="form-control" value="{{ $task->task }}" placeholder="Enter task name">
            </div>

            <!--Task Progress-->
            <div class="form-group col-lg">
                <label for="progress">Progress</label>
                <input name="progress"type="text" id="progress" class="form-control" value="{{ $task->progress }}" placeholder="Task Progress">
            </div>

            <!--Task Owner-->
            <div class="form-group col-lg">
                <label for="user">Owner</label>
                <select name="user" id="user" class="form-control" placeholder="Task User">
                    <option value="{{$task->user}}">{{ $task->owner->name ?? '' }}</option>
                    @foreach($users as $user)
                    @if($user->id != $task->user)
                    <option value="{{$user->id}}">{{ $user->name }}</option>
                    @endif
                    @endforeach
                <select>
            </div>

            <!--Task Editor-->
            <div class="form-group col-lg">
                <label for="editor">Editor</label>
                <select name="editor" id="editor" class="form-control" placeholder="Task Editor">
                    <option value="{{$task->editor}}">{{ $task->edited->name ?? '' }}</option>
                    @foreach($users as $user)
                    @if($user->id != $task->editor)
                    <option value="{{$user->id}}">{{ $user->name }}</option>
                    @endif
                    @endforeach
                <select>
            </div>
        </div>

        <div class="row">
            <!--Task Website-->
            <div class="form-group col-lg">
                <label for="site">Site</label>
                <input name="site" type="text" id="site" class="form-control" value="{{ $task->site }}" placeholder="example.com">
            </div>

            <!--Due-date-->
            <div class="form-group col-lg">
                <label for="due">Due Date</label>
                <input name="due" type="date" id="due" value="{{ $task->due }}" class="form-control">
            </div>

            <!--Priority-->
            <div class="form-group col-lg">
                <label for="priority">Priority</label>
                <input name="priority" class="form-control" value="{{ $task->priority }}" id="priority">
            </div>

            <!--level-->
            <div class="form-group col-lg">
                <label for="level">Level</label>
                <input name="level" class="form-control" value="{{ $task->level }}"  id="level">
            </div>
        </div>

        <div class="row">
            <!--Type-->
            <div class="form-group col-lg">
            <label for="type">Type</label>
            <input name="type" class="form-control" value="{{ $task->type }}" id="type">
            </div>

            <!--Points-->
            <div class="form-group col-lg">
                <label for="points">Points</label>
                <input name="points" type="number" id="points" value="{{ $task->points }}" class="form-control" placeholder="1000">
            </div>

            <!--Project-->
            <div class="form-group col-lg">
                <label for="project">Client or Internal Project?</label>
                <select name="project" id="project" class="form-control" value="{{ $task->project }}">
                    <option>Client</option>
                    <option>Internal</option>
                </select>
            </div>
        </div>

        <!--Comment-->
        <div class="form-group">
            <label for="comment">Comments</label>
            <textarea name="comment" class="form-control" id="comment" cols="10" rows="3">{{$task->comment}}</textarea>
        </div>

        <div class="row">
            <!--Folder-->
            <div class="form-group col-lg">
                <label for="folder">Folder</label>
                <input name="folder" type="text" id="folder" value="{{ $task->folder }}" class="form-control" placeholder="https://drive.google.com/">
            </div>

            <!--Live Link-->
            <div class="form-group col-lg">
                <label for="live">Live Link</label>
                <input name="live" type="text" id="live" value="{{ $task->live }}" class="form-control" placeholder="https://example.com/">
            </div>

            <!--Post Archived-->
            <div class="form-group col-lg">
                <label for="archived">Archived</label>
                <input name="archived" type="text" id="archived" value="{{ $task->archived }}" class="form-control">
            </div>

        </div>

        <!--Save Single Task (post)-->

        <div class="mt-3">
            <button class="btn btn-info" type="submit" id="submit">Save</button>
        </div>

    </form>

</div>



@endsection
