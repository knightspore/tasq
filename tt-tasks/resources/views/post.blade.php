@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-4 text-center">
        <div class="card m-3 shadow" style="width: 18rem;">
            <div class="card-body">

                <h5 class="card-title">{{ $post->priority }} || {{ $post->task }}</h5>
                @if (($post->progress) == "Complete")
                <h6 class="card-subtitle text-success mb-2">{{ $post->progress }}</h6>
                @elseif (($post->progress) == "WIP")
                <h6 class="card-subtitle text-warning mb-2">{{ $post->progress }}</h6>
                @else (($post->progress) == null)
                <h6 class="card-subtitle text-secondary mb-2">Not picked up</h6>
                @endif
                <h6 class="card-subtitle mb-4">{{ $post->site }}</h6>

                <h6 class="card-subtitle mb-4">{{ $post->type }} - {{ $post->points }}</h6>
                @isset($post->user)
                <h6 class="card-subtitle mb-4 text-muted">{{ $post->user }} is working on this post</h6>
                @endisset
                @empty($post->user)
                @endempty
                
                <a href="#" class="card-link">View Task</a>
            </div>
        </div>
        </div>
        @endforeach

    </div>

</div>

@endsection 
