{{-- Edit Project --}}
@extends('layouts.app')

@section('title', $project->name)

@section('content')

<div class="upload container p-3">

    <h1>Edit <span class="text-success">{{ $project->name }}</span></h1>

    <form action="save" method="POST">
    {{ csrf_field() }}
        <div class="row input-group">
        {{-- Get user editing project --}}
        <input type="hidden" name="updated_by" value="{{Auth::user()->id}}"/>
        </div>

        <div class="row input-group">
        {{-- Name --}}
        <div class="form-group col-md">
                <label for="name">Name</label>
                <input name="name"type="text" id="name" class="form-control" value="{{ $project->name }}" placeholder="Project Name">
        </div>

        {{-- Site --}}
        <div class="form-group col-md">
                <label for="site">Site</label>
                <input name="site"type="text" id="site" class="form-control" value="{{ $project->site }}" placeholder="Project site">
        </div>

        {{-- Logo Link --}}
        <div class="form-group col-md">
                <label for="logo">Logo</label>
                <input name="logo"type="text" id="logo" class="form-control" value="{{ $project->logo }}" placeholder="Project logo">
        </div>
        </div>

        <div class="row input-group">
        {{-- SOP --}}
        <div class="form-group col-md">
                <label for="sop">SOP Link</label>
                <input name="sop"type="text" id="sop" class="form-control" value="{{ $project->sop }}" placeholder="SOP Link">
        </div>

        {{-- Niche --}}
        <div class="form-group col-md">
                <label for="niche">Niche</label>
                <input name="niche"type="text" id="niche" class="form-control" value="{{ $project->niche }}" placeholder="Niche">
        </div>

        </div>

        <div class="row input-group">
        {{-- Account Manager --}}
        <div class="form-group col-md">
                <label for="accountmgr">Account Manager</label>
                <input name="accountmgr"type="text" id="accountmgr" class="form-control" value="{{ $project->accountmgr }}" placeholder="Account Manager">
        </div>
        {{-- Client Name --}}
        <div class="form-group col-md">
                <label for="clientname">Client Name</label>
                <input name="clientname"type="text" id="clientname" class="form-control" value="{{ $project->clientname }}" placeholder="Client / Person Name">
        </div>
        {{-- Email --}}
        <div class="form-group col-md">
                <label for="email">Email</label>
                <input name="email"type="text" id="email" class="form-control" value="{{ $project->email }}" placeholder="{{ $project->email }}">
        </div>
        </div>

        <div class="form-group">
            <label for="comment">Comments</label>
            <textarea name="comment" class="form-control" id="comment" cols="10" rows="3">{{$project->comment}}</textarea>
        </div>

        {{-- Save Changes --}}
        <div class="mt-3">
            <button class="btn btn-info" type="submit" id="submit">Save</button>
        </div>

    <form>

</div>

@endsection
