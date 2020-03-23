@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container">

    <div class="mb-4">
        <h1 class="">Task Cards</h1>
            <p class="pl-1">Logged in as <a href="mailto:{{ Auth::user()->email }}" class="text-info">{{ Auth::user()->name }}</a></p>

            <button class="btn btn-primary"><a href="/post" class="text-light">🔃 Refresh</a></button>
            <button class="btn btn-outline-secondary"><a href="{{ URL::previous() }}" class="text-secondary">Back</a></button>
    </div>

    <div class="row masonry-grid">

        <!--Generate Post Cards from Database-->
        @foreach ($posts->sortByDesc('priority') as $post)
        <div class="col-lg-3 col-sm-6 masonry-column">

            <div class="card card-outline-primary mb-2 shadow">
                <div class="card-header">
                    <div>
                    @if (($post->priority) == 0)
                    <h5 class="card-title"><span class="badge badge-dark">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) <= 5)
                    <h5 class="card-title"><span class="badge">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) <= 8)
                    <h5 class="card-title"><span class="badge badge-warning">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @else
                    <h5 class="card-title"><span class="badge badge-success">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @endif

                        <hr>

                    </div>
                    <div> 
                    @if (($post->progress) == "Complete")
                    <h6 class="badge font-weight-light p1 text-light badge-primary text-success mb-1">{{ $post->progress }}</h6>
                    @elseif (($post->progress) == "WIP")
                    <h6 class="badge font-weight-light p1 text-light badge-warning mb-1">{{ $post->progress }}</h6> 
                    @elseif (($post->progress) == "Not Picked Up")
                    <h6 class="badge font-weight-light p1 text-light badge-success mb-1">{{ $post->progress }}</h6> 
                    @else
                    <h6 class="badge font-weight-light p1 text-light badge-secondary text-secondary mb-1">{{ $post->progress }}</h6> 
                    @endif

                    <h6 class="badge font-weight-light p1 badge-info">{{ $post->site }}</h6> 

                    @isset($post->due)
                    <h6 class="badge font-weight-light p1 text-light badge-dark text-secondary mb-1">Due {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </h6>
                    @endisset
                    
                    <h6 class="badge font-weight-light p1 badge-dark">{{ $post->points }} points</h6>

                    </div>
                    @isset($post->user)
                    <h6 class="badge font-weight-light p1 text-light badge-dark mb-1">{{ $post->user }}</h6>
                    @endisset
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2">{{ $post->type }}</h6>

                    @isset($post->comment)
                    <hr>
                    <h6 class="card-subtitle text-muted">{{ Str::limit($post->comment, 140) }}</h6>
                    @endisset
                    @empty($post->comment)
                    @endempty
                </div>

                <div class="card-footer">
                    <a href="/post/{{ $post->id }}" class="card-link">View Task</a>
                </div>

            </div>

        </div>
        @endforeach
    </div>
</div>


@endsection
