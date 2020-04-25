@extends('layouts.app')

<!--Edit User Profile View-->

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
            <h4><a href="mailto:{{ $user->email }}" class="badge badge-primary">📧 Email</a>
                <span class="badge badge-success">🌠 Lvl {{ $user->level }}</span>
                <span class="badge badge-success">🔥 KPI {{ !empty($user->task) ? $user->task->where('progress', 'Complete')->sum('points'):'' }}</span>
            </h4>
        </div>
        <div class="col-md-9 py-3">
        <!--Edit Profile-->
            <h2 class="pb-3">👾 Edit Profile</h2>
            <form action="save" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="thisuser" value="{{$user->id}}"/>
                <div class="row input-group">
                    <div class="form-group col-sm">
                        <label for="username">Name</label>
                        <input name="username" type="text" id="username" class="form-control" value="{{ $user->name }}" placeholder="First Name">
                    </div>
                    <div class="form-group col-sm">
                        <label for="email">Email</label>
                        <input name="email"type="text" id="email" class="form-control" value="{{ $user->email }}" placeholder="me@example.com">
                    </div>
                    <div class="form-group col-sm">
                        <label for="role">Role</label>
                        <input name="role"type="text" id="role" class="form-control" value="{{ $user->role }}" placeholder="Content Intern">
                    </div>
                </div>
                <div class="row input-group">
                    <div class="form-group col-sm">
                        <label for="level">Level</label>
                        <input name="level"type="text" id="level" class="form-control" value="{{ $user->level }}" placeholder="{{ $user->level }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="avatar">Avatar</label>
                        <input name="avatar" type="text" id="avatar" class="form-control" value="{{ $user->avatar }}" placeholder="Link to Avatar">
                    </div>
                    <div class="form-group col-sm">
                        <label for="slackid">Slack ID</label>
                        <input name="slackid"type="text" id="slackid" class="form-control" placeholder="{{ $user->slack_id }}">
                    </div>
                </div>
                
                <div class="mt-3"><button class="btn btn-info" type="submit" id="btnSubmit">Save Changes</button></div>
        </div>
</div>


@endsection