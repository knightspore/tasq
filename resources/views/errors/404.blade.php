{{-- 404 Page --}}
@extends('layouts.app')

@section('title', 'Not Found')

@section('content')

<div class="container text-center">

    <div class="jumbotron jumbotron-fluid rounded shadow-sm bg-white">
        <h1 class="display-5">404</h1>
        <p class="lead">We Couldn't Find That Page 😢 Please feel free to add a bug report on <a
                href="https://github.com/knightspore/tasq">Tasq's Github Repo</a>.</p>
    </div>

</div>

@endsection
