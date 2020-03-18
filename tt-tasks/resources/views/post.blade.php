@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container">
    <div class="row">

        <!--Generate Post Cards from Database-->
        @foreach ($posts->sortByDesc('priority') as $post)
        <div class="col-lg-4 col-sm-6">

            <div class="card card-outline-primary mb-2 shadow">
                <div class="card-header">
                    <div>
                    @if (($post->priority) <= 6)
                    <h5 class="card-title"><span class="badge badge-info">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) <= 8)
                    <h5 class="card-title"><span class="badge badge-warning">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @else
                    <h5 class="card-title"><span class="badge badge-danger">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @endif
                    </div>
                    <div> 
                    @if (($post->progress) == "Complete")
                    <h6 class="badge text-light badge-success text-success mb-1">{{ $post->progress }}</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-dark">{{ $post->points }} points</h6>
                    @elseif (($post->progress) == "WIP")
                    <h6 class="badge text-light badge-warning text-warning mb-1">{{ $post->progress }}</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-dark">{{ $post->points }} points</h6>
                    @else
                    <h6 class="badge text-light badge-secondary text-secondary mb-1">Not picked up</h6> <h6 class="badge badge-info">{{ $post->site }}</h6> <h6 class="badge badge-dark">{{ $post->points }} points</h6>
                    @endif
                    </div>
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2">{{ $post->type }}</h6>
                    @isset($post->user)
                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->user }} is working on this post</h6>
                    @endisset
                    @empty($post->user)
                    @endempty

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
