@extends('layouts.app')

@section('title', 'Add new Task')

@section('content')

<div class="upload container p-3">

    <h1>Add new task as {{ Auth::user()->name}}</h1>

    <form action="/create">

        <div class="row">
            <!--Task Name-->
            <div class="form-group col-sm">
                <label for="postTask">Task Name</label>
                <input name="taskname"type="text" id="postTask" class="form-control" placeholder="Enter task name">
            </div>

            <!--Task Website-->
            <div class="form-group col-sm">
                <label for="postSite">Site</label>
                <input type="text" id="postSite" class="form-control" placeholder="example.com">
            </div>

            <!--Due-date-->
            <div class="form-group col-sm">
                <label for="postDuedate">Due Date</label>
                <input type="date" id="postDuedate" class="form-control">
            </div>
        </div>

        <div class="row">
            <!--Priority-->
            <div class="form-group col-sm">
                <label for="postPriority">Priority</label>
                <select class="form-control" id="postPriority">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
            </div>

            <!--level-->
            <div class="form-group col-sm">
                <label for="postLevel">Level</label>
                <select id="postLevel" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <!--Type-->
            <div class="form-group col-sm">
                <label for="postType">Task Type</label>
                <select id="postType" class="form-control">
                    <option>Info Post</option>
                    <option>List Post</option>
                    <option>Content Mine</option>
                    <option>Optimization</option>
                    <option>Audit</option>
                    <option>Design</option>
                    <option>Social Media</option>
                    <option>Guest Post</option>

                </select>
            </div>

            <!--Points-->
            <div class="form-group col-sm">
                <label for="postPoints">Points</label>
                <input type="number" id="postPoints" class="form-control" placeholder="1000">
            </div>

        </div>

        <!--Project-->
        <div class="form-group">
            <div class="">
                <label>Client or Internal Project?</label></div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="postProjectClient"
                    value="option1">
                <label class="form-check-label" for="postProject">Client</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="postProjectInternal"
                    value="option2">
                <label class="form-check-label" for="postProjectInternal">Internal</label>
            </div>
        </div>

        <!--Comment-->

        <div class="form-group">
            <label for="postComment">Comments</label>
            <textarea class="form-control" id="postComment" cols="10" rows="3"></textarea>
        </div>

        <!--Submit Single Task (post)-->

        <div class="mt-3">
            <button class="btn btn-info" type="submit" id="btnSubmit">Submit</button>
        </div>

    </form>

    <hr>

    <h2 class="mt-3">Add Multiple Tasks as CSV</h2>
    <form>
        <div class="form-group">
            <label for="uploadPostsCsv"><a href="#">Click here</a> for an example .csv file.</label>
            <input type="file" class="form-control-file" id="uploadPostsCsv">
            
        </div>

        {{ csrf_field() }}

        <button class="btn btn-info" id="btnUpload">Upload</button>

    </form>

</div>


@endsection
