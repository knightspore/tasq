@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <!--Welcome Text-->

	<div class="flex-center position-ref text-center">            
            <div><h1 class=" mt-5">Welcome to Travel Tractions Task Manager</h1></div>
            <button class="btn btn-secondary text-light"><a href="/login">Sign in</a></button>
    </div>

@endsection