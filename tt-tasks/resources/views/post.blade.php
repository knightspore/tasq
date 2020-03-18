@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container">

<h1 class="pl-1">Today's Tasks</h1>
    <p class="pl-1 mb-4">Logged in as <a href="mailto:{{ Auth::user()->email }}"
            class="text-info">{{ Auth::user()->email }}</a></p>

            <button class="btn btn-primary d-block mx-auto mb-4"><a href="/home" class="text-light p1">🔃 Refresh</a></button>

    <div class="row masonry-grid">

        <!--Generate Post Cards from Database-->
        @foreach ($posts->sortByDesc('priority') as $post)
        <div class="col-lg-3 col-sm-4 masonry-column">

            <div class="card card-outline-primary mb-2 shadow">
                <div class="card-header">
                    <div>
                    @if (($post->priority) < 3)
                    <h5 class="card-title"><span class="badge badge-info">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) < 6)
                    <h5 class="card-title"><span class="badge badge-primary">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) < 9)
                    <h5 class="card-title"><span class="badge badge-warning">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @else
                    <h5 class="card-title"><span class="badge badge-danger">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @endif

                    </div>
                    <div> 
                    @if (($post->progress) == "Complete")
                    <h6 class="badge text-light badge-success text-success mb-1">{{ $post->progress }}</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-info">{{ $post->points }} points</h6>
                    @elseif (($post->progress) == "WIP")
                    <h6 class="badge text-light badge-warning text-warning mb-1">{{ $post->progress }}</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-info">{{ $post->points }} points</h6>
                    @else
                    <h6 class="badge text-light badge-secondary text-secondary mb-1">Not picked up</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-info">{{ $post->points }} points</h6>
                    @endif
                    @isset($post->due)
                    <h6 class="badge text-light badge-info text-secondary mb-1">Due {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </h6>
                    @endisset
                    </div>
                    @isset($post->user)
                    <h6 class="badge text-light badge-dark mb-1">{{ $post->user }}</h6>
                    @endisset
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2">{{ $post->type }}</h6>

                    @isset($post->comment)
                    <hr>
                    <h6 class="card-subtitle text-muted">{{ $post->comment }}</h6>
                    @endisset
                    @empty($post->comment)
                    @endempty
                </div>

                <div class="card-footer">
                    <a href="#" class="card-link">View Task</a>
                </div>

            </div>

        </div>
        @endforeach
    </div>
</div>


@endsection
