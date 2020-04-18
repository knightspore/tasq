@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container">

    <div class="mb-4">
            <button class="btn btn-sm btn-primary"><a href="/post" class="text-light">🔃 Refresh</a></button>
    </div>

    <div class="row">
        
        @foreach ($tasks->sortByDesc('priority') as $task)
        @if ($task->priority > 0)
            @include('components.taskcards')
        @endif
        @endforeach
        
    </div>
</div>


@endsection
