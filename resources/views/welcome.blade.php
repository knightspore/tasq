{{-- Dashboard / Login --}}
@extends('layouts.app')

@section('title', 'Home')
@section('description', 'Tasq Dashboard')

@section('content')

<div style="height: 80vh;" class="container text-center mt-4">
    @guest
        @include('layouts.login')
    @endguest

    @auth
    {{-- User Dashboard --}}
    <div class="row">
        <div class="col-lg-8 text-left">
            <h2 class="py-3 text-center">🎯 Your Queue</h2>
                @if(Auth::user()->task == '[]')
                    <h3 class="text-center">Your queue is empty.</h3>
                @else
                    @foreach($userTasks as $task)
                    @include('components.minitask')
                    @endforeach
                @endif
        </div>
        <div class="col-lg-4 text-left">
            <h4 class="pt-4 pb-3 text-center">📫 Top Priority</h4>
            @foreach( $newTasks as $task )
                @if ($loop->iteration <= 3)
                @include('components.minitask')
                @endif
            @endforeach
        </div>
    </div>
    @endauth
</div>
@endsection
