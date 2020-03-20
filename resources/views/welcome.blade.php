@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <!--Welcome Text-->

	<div class="flex-center position-ref text-center d-grid">            
            <div><h1 class=" m-5">Welcome to Travel Tractions Task Manager</h1></div>
            <button class="btn btn-primary"><a class="text-light" href="/login">Sign in</a></button>
    </div>

@endsection