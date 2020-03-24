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
        
        @foreach ($posts->sortByDesc('priority') as $post)
        @include('components.taskcards')
        @endforeach
        
    </div>
</div>


@endsection
