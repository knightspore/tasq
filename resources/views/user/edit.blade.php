{{--Edit User Profile --}}
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
            <a href="mailto:{{ $user->email }}" class="badge badge-info">📧 Email</a>
            @isset($user->location)
            <span class="badge badge-info">🌍 {{ $user->location }}</span>
            @endisset
            @isset($user->personallink)
            <a href="https://{{$user->personallink}}" class="badge badge-info" target="_blank">🌐 Personal</a>
            @endisset
            @if ( $user->id == Auth::user()->id)
            <span class="badge badge-dark"><a href="/user/{{ $user->id }}/edit" class="text-light">Edit Profile</a></span>
            @endif
        </div>
        <div class="col-md-9 py-3">
        {{--Edit Profile--}}
            <h2 class="pb-3">👾 Edit Profile</h2>
            <form action="save" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="thisuser" value="{{$user->id}}"/>
                <div class="row input-group">
                    <div class="form-group col-lg">
                        <label for="username">Name</label>
                        <input name="username" type="text" id="username" class="form-control" value="{{ $user->name }}" placeholder="First Name">
                    </div>
                    <div class="form-group col-lg">
                        <label for="email">Email</label>
                        <input name="email"type="text" id="email" class="form-control" value="{{ $user->email }}" placeholder="me@example.com">
                    </div>
                    <div class="form-group col-lg">
                        <label for="role">Role</label>
                        <input name="role"type="text" id="role" class="form-control" value="{{ $user->role }}" placeholder="Content Intern">
                    </div>
                </div>
                <div class="row input-group">
                    <div class="form-group col-lg">
                        <label for="level">Level</label>
                        <input name="level"type="text" id="level" class="form-control" value="{{ $user->level }}" placeholder="{{ $user->level }}">
                    </div>
                    <div class="form-group col-lg">
                        <label for="avatar">Avatar</label>
                        <input name="avatar" type="text" id="avatar" class="form-control" value="{{ $user->avatar }}" placeholder="Link to Avatar">
                    </div>
                    <div class="form-group col-lg">
                        <label for="slack_id">Slack ID</label>
                        <input name="slack_id"type="text" id="slack_id" class="form-control" value="{{ $user->slack_id }}" placeholder="{{ $user->slack_id }}">
                    </div>
                </div>
                <div class="row input-group">
                    <div class="form-group col-lg">
                        <label for="location">Location</label>
                        <input name="location"type="text" id="location" class="form-control" value="{{ $user->location }}" placeholder="{{ $user->location }}">
                    </div>
                    <div class="form-group col-lg">
                        <label for="personallink">Personal Link</label>
                        <input name="personallink"type="text" id="personallink" class="form-control" value="{{ $user->personallink }}" placeholder="{{ $user->personallink }}">
                    </div>
                </div>

                <div class="mt-3"><button class="btn btn-info" type="submit" id="btnSubmit">Save Changes</button></div>
        </div>
</div>
@endsection
