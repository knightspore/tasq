{{-- All Projects Page --}}
@extends('layouts.app')

@section('title', 'Projects')

@section('content')

<h1 class="mb-4 text-center">💫 Projects</h1>

<div class="table-container mt-4 px-lg-5">

<table class="table table-bordered table-sm table-hover table-responsive-lg shadow bg-light">
        <thead class="thead thead-dark text-center">
            <tr scope="row">
                <th scope="col" id="col-priority">Project</th>
                <th scope="col" id="col-priority">Site</th>
                <th scope="col" id="col-priority">Account Manager - Contact Email</th>
                <th scope="col" id="col-priority">Niche</th>
                <th scope="col" id="col-priority">SOP Link</th>
                </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)

        {{-- Project Name --}}
        <td class="text-left bg-dark text-light" id="row-prio" data-toggle="tooltip" rel="tooltip" data-placement="bottom" @if($project->client == 1) title="Client" @else title="Internal" @endif ><a class="text-white" href="/project/{{ $project->id }}"><strong>{{ $project->name }}</strong></a></td>

        {{-- Website --}}
        <td class="text-center" id="row-prio">@if($project->site != "example.com")<a href="https://{{ $project->site }}" target="blank">🌐</a>@endif</td>

        {{-- Account Manager --}}
        <td class="text-left" id="row-prio">{{ $project->accountmgr }} @if($project->email != "Email")| <span class="text-muted">{{ $project->email }}@endif</span></td>

        {{-- Niche --}}
        <td class="text-center" id="row-prio">@if($project->niche != "Niche"){{ $project->niche }}@endif</td>

        {{-- SOP Link --}}
        <td class="bg-dark" id="row-prio">@if($project->sop != "https://drive.google.com")<a href="{{ $project->sop }}">📎</a>@endif</td>

        </tbody>
        @endforeach

@endsection
