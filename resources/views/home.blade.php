@extends('layouts.app')

@section('title', 'All Tasqs')

@section('content')

<h1 class="mb-4 text-center">📃 Tasqs</h1>

    {{-- @if (desktop) --}}
    @include('components.home.table')
    {{-- @else --}}
    @include('components.home.card')
    {{-- @endif --}}

@endsection
