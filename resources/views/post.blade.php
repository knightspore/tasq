@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container">

    <div class="mb-4">
            <button class="btn btn-sm btn-primary"><a href="/post" class="text-light">🔃 Refresh</a></button>
    </div>

    <div class="row">
        
        @foreach ($posts->sortByDesc('priority') as $post)
            @include('components.taskcards')
        @endforeach
        
    </div>
</div>


@endsection
