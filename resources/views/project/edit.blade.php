@extends('layouts.app')

@section('title', $project->name)

@section('content')

<div class="upload container p-3">

    <h1>Edit <span class="text-success">{{ $project->name }}</span></h1>

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
        <!-- Get user editing project -->
        <input type="hidden" name="updated_by" value="{{Auth::user()->id}}"/>
        </div>

        <div class="row input-group">
        <!-- Name -->
        <div class="form-group col-md">
                <label for="name">Name</label>
                <input name="name"type="text" id="name" class="form-control" value="{{ $project->name }}" placeholder="Project Name">
        </div>

        <!-- Site -->
        <div class="form-group col-md">
                <label for="site">Site</label>
                <input name="site"type="text" id="site" class="form-control" value="{{ $project->site }}" placeholder="Project site">
        </div>

        <!-- Logo Link -->
        <div class="form-group col-md">
                <label for="logo">Logo</label>
                <input name="logo"type="text" id="logo" class="form-control" value="{{ $project->logo }}" placeholder="Project logo">
        </div>
        </div>

        <div class="row input-group">
        <!-- SOP -->
        <div class="form-group col-md">
                <label for="sop">SOP Link</label>
                <input name="sop"type="text" id="sop" class="form-control" value="{{ $project->sop }}" placeholder="SOP Link">
        </div>

        <!-- Niche -->
        <div class="form-group col-md">
                <label for="niche">Niche</label>
                <input name="niche"type="text" id="niche" class="form-control" value="{{ $project->niche }}" placeholder="Niche">
        </div>
        </div>

        <div class="row input-group">
        <!-- Account Manager -->
        <div class="form-group col-md">
                <label for="accountmgr">Account Manager</label>
                <input name="accountmgr"type="text" id="accountmgr" class="form-control" value="{{ $project->accountmgr }}" placeholder="Account Manager">
        </div>
        <!-- Client Name -->
        <div class="form-group col-md">
                <label for="clientname">Client Name</label>
                <input name="clientname"type="text" id="clientname" class="form-control" value="{{ $project->clientname }}" placeholder="Client / Person Name">
        </div>
        </div>

        <!-- Save Changes -->
        <div class="mt-3">
            <button class="btn btn-info" type="submit" id="submit">Save</button>
        </div>

    <form>

</div>

@endsection