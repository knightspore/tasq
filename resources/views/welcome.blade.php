@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div style="height: 80vh;" class="container text-center mt-4">
    @guest
        @include('layouts.login')
    @endguest

    @auth
    <!--User Dashboard-->
    <div class="row">
        <div class="col-md-8 text-left">
            <h2 class="py-3 text-center">🎯 Tasks you're working on</h2>
                @if(Auth::user()->task == '[]')
                    <h3 class="text-center">Your queue is empty.</h3>
                @else
                    @foreach($myTasks->where('archived', '==', '0') as $task)
                    @include('components.minitask')
                    @endforeach
                @endif
        </div>
        <div class="col-md-4 text-left">
            <h4 class="pt-4 pb-3 text-center">📫 Top Priority Pickups</h4>
            @foreach( $topTen as $task )
                @if ($loop->iteration <= 5)
                @include('components.minitask')
                @endif
            @endforeach
        </div>
    </div>
    @endauth
</div>
@endsection
