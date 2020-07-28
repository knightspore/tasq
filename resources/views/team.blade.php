@extends('layouts.app')

@section('title', 'Team')

@section('content')
<h1 class="mb-4 text-center">🌍 Team</h1>

<div class="container mt-4">
    <div class="row justify-center">
        @foreach ($users as $user)
            <div class="col-md-4 col-lg-3">
                @include('components.usercard')
            </div>
        @endforeach
    </div>
</div>

@endsection
