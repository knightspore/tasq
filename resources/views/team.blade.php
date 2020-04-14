@extends('layouts.app')

@section('title', 'Travel Tractions Team')

@section('content')

<div class="container mt-4">

    <h1>🌍 The Team</h1>
    <div class="row justify-center">
        @foreach ($users as $user)
            @include('components.usercard')
        @endforeach
    </div>
</div>

@endsection
