@extends('layouts.app')

@section('title', $user->name)

@section('content')


<div class="container pt-3">

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
            <form action="/user/{{ $user->id }}/store" method="POST">
                {{ csrf_field() }}
                <div class="row input-group">
                    <input type="hidden" name="created_by" value="{{Auth::user()->id}}"/>
                    <div class="form-group col-sm">
                        <label for="username">Name</label>
                        <input name="username"type="text" id="username" class="form-control" placeholder="{{ $user->name }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="email">Email</label>
                        <input name="email"type="text" id="email" class="form-control" placeholder="{{ $user->email }}">
                    </div>
                    <div class="form-group col-sm">
                        <label for="role">Role</label>
                        <input name="role"type="text" id="role" class="form-control" placeholder="{{ $user->role }}">
                    </div>
                </div>
                <div class="row input-group">
                    <div class="form-group col-sm">
                        <label for="level">Level</label>
                        <input name="level"type="text" id="level" class="form-control" placeholder="{{ $user->level }}">
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