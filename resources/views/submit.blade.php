@extends('layouts.app')

@section('title', 'Add new Task')

@section('content')

<div class="upload container p-3">

    <h1 class="text-center mb-2">Create a new <span class="text-success">tasq</span>.</h1>
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert" style="top:2%; position: fixed; left:2%; z-index:100; width: 200px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading">🎉 Added!</h4>
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

    <form action="submit" method="POST">
    {{ csrf_field() }}
        <div class="row input-group">
            <input type="hidden" name="created_by" value="{{Auth::user()->id}}"/>
            <!--Task Name-->
            <div class="form-group col-lg">
                <label for="postTask">Task Name</label>
                <input name="taskname"type="text" id="postTask" class="form-control" placeholder="Enter task name" required>
            </div>

            <!--Task Website-->
            <div class="form-group col-lg">
                <label for="postSite">Project</label>
                <input name="site" type="text" id="postSite" class="form-control" placeholder="example.com" required>
            </div>

            <!--Due-date-->
            <div class="form-group col-lg">
                <label for="postDuedate">Due Date</label>
                <input name="due" type="date" id="postDuedate" class="form-control" required>
            </div>

        </div>

        <div class="row input-group">
            <!--Priority-->
            <div class="form-group col-lg">
                <label for="postPriority">Priority</label>
                <select name="priority" class="form-control" id="postPriority" required>
                    <option>10</option>
                    <option>9</option>
                    <option>8</option>
                    <option>7</option>
                    <option>6</option>
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>
            </div>

            <!--level-->
            <div class="form-group col-lg">
                <label for="postLevel">Level</label>
                <select name="level" id="postLevel" class="form-control" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <!--Type-->
            <div class="form-group col-lg">
                <label for="postType">Task Type</label>
                <input name="type" id="postType" class="form-control" placeholder="Blog Post" required>
            </div>

            <!--Words-->
            <div class="form-group col-lg">
                <label for="postWords">Words</label>
                <input name="words" type="number" id="postWords" class="form-control" placeholder="1000" required>
            </div>

        </div>

        <!--Project-->
        <div class="form-group" required>
            <div class="">
                <label>Client or Internal Project?</label></div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="postProjectClient"
                    value="Client">
                <label class="form-check-label" for="postProject">Client</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="postProjectInternal"
                    value="Internal">
                <label class="form-check-label" for="postProjectInternal">Internal</label>
            </div>
        </div>

        <!--Comment-->

        <div class="form-group">
            <label for="postComment">Comments</label>
            <textarea name="comments" class="form-control" id="postComment" cols="10" rows="3"></textarea>
        </div>

        <!--Submit Single Task (post)-->

        <div class="mt-3">
            <button class="btn btn-info" type="submit" id="btnSubmit">Submit</button>
        </div>

    </form>

    <hr>

    <h2 class="mt-3">Add Multiple Tasks as CSV</h2>
    <form class="text-muted">
        <div class="form-group">
            <label for="uploadPostsCsv"><a href="/task-template.csv">Click here</a> for an example .csv file. (Open with Excel or Google Docs)</label>
            <input type="file" class="form-control-file" id="uploadPostsCsv">

        </div>

        <button type="submit" class="btn btn-info" id="btnUpload" href="#">Upload</button>

    </form>

</div>


@endsection
