@extends('layouts.app')

@section('title', 'Card View')

@section('content')
<div class="container mt-4 px-lg-5">

        <h1 class="mb-4">Card View</h1>

    <div class="row">

        @foreach ($tasks->sortByDesc('priority') as $task)
        @if ($task->priority > 0)
            @include('components.taskcards')
        @endif
        @endforeach

    </div>
</div>


@endsection
