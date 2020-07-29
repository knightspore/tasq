{{-- Main Task Sheet / Home --}}
@extends('layouts.app')

@section('title', 'All Tasqs')

@section('content')

<h1 class="mb-4 text-center">📃 Tasqs</h1>

    @if ($agent->isMobile() or $agent->isTablet())
    @include('components.home.card')
    @else
    @include('components.home.table')
    @endif

@endsection
