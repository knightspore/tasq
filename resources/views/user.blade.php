@extends('layouts.app')

<!--Individual User Profile View-->

@section('title', $user->name)

@section('content')

<div class="container pt-3">

    <div class="row mt-2">
        <div class="col-md-4 py-3">
        <div class="mx-auto">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }} Profile Picture" class="responsive-image w-50 mx-auto d-block rounded-circle mb-4 shadow-sm">
        </div>
        
        <h1><span class="text-success mb-5">{{ $user->name }}</span></h1>
        <h4 class="text-muted">{{ $user->role }} </h4>
            <h4><a href="mailto:{{ $user->email }}" class="badge badge-secondary">📧 E-Mail</a>
                <span class="badge badge-secondary">🔹 {{ $user->level }}</span>
            </h4>
        </div>
        <div class="col-md-8 py-3 shadow-sm">
            <h2>🎯 Assigned Tasks</h2>

        </div>
    </div>
</div>

@endsection