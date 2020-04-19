@extends('layouts.app')

@section('title', 'Travel Tractions Team')

@section('content')

<div class="container mt-4">

    <h1>🌍 The Team</h1>
    <div class="row justify-center">
        @foreach ($users as $user)
        <div class="col-md-4 col-lg-3">
            @include('components.usercard')
            </div>
        @endforeach
    </div>
</div>

@endsection
