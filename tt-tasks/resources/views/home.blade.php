@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<?php use Carbon\Carbon; ?>


<!--Main Task Table-->

<div class="table-container mt-4 px-lg-5">

    <h1 class="pl-1">Today's Tasks</h1>
    <p class="pl-1">Logged in as <a href="mailto:{{ Auth::user()->email }}"
            class="text-info">{{ Auth::user()->email }}</a></p>

    <table class="table table-bordered table-sm table-hover table-responsive-lg shadow">
        <thead class="thead-sm thead-dark text-center">
            <tr scope="row">
                <th scope="col" id="col-priority">📣</th>
                <th scope="col" id="col-level">lvl</th>
                <th scope="col" id="col-due">Due</th>
                <th scope="col" id="col-user">Assignee</th>
                <th scope="col" id="col-project">Project<br></th>
                <th scope="col" id="col-type">Type<br></th>
                <th scope="col" id="col-task">Task</th>
                <th scope="col" id="col-points">🎯</th>
                <th scope="col" id="col-status">Status<br></th>
                <th scope="col" id="col-folder"></th>
                <th scope="col" id="col-comment">Comment</th>
                <th scope="col" id="col-editor">Editor</th>
                <th scope="col" id="col-live">Live</th>
            </tr>
        </thead>
        <tobdy>

            <!--BEGIN TABLE SCRIPT-->

            @foreach($posts->sortByDesc('priority') as $post)

            <tr scope="row">

                <!--POST PRIORTY- high prio - text-white bg-danger-->
                @if (($post->priority) == 0)
                <td class=" bg-dark" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 3)                         
                <td class=" bg-info" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 6) 
                <td class=" bg-primary" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 8) 
                <td class=" bg-warning" id="row-prio">{{ $post->priority }}</td>
                @else
                <td class=" bg-danger text-light" id="row-prio">{{ $post->priority }}</td>
                @endif

                <!--POST LEVEL-->
                <td class=" text-muted" id="row-id">{{ $post->level }}</td>

                <!--DUE DATE-->
                @if (Str::contains(\Carbon\Carbon::parse($post->due)->diffForHumans(), 'from'))
                <td class="" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @else
                <td class="text-muted" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @endif

                <!--POST OWNER-->
                <td class=" " id="row-user">{{ $post->user }}</td>

                <!--CLIENT / INTERNAL-->
                <td class=" text-muted " id="row-proj"><a href="https://{{ $post->site }}" target="_blank">{{ $post->project }}</a></td>


                <!--TASK TYPE-->
                <td class=" " id="row-type">{{ $post->type }}</td>

                <!--TASK NAME-->
                <td class=" font-weight-bold" id="row-task"><a href="/post/{{ $post->id }}" class="text-dark">{{ $post->task }}</a></td>

                <!--TASK POINTS-->
                <td class=" bg-dark text-light" id="row-pts">{{ $post->points }}</td>

                <!--PROGRESS STATUS-->
                @if (($post->progress) == "Complete")
                <td class=" text-light bg-success" id="row-stat">{{ $post->progress }}</td>
                @elseif (($post->progress) == "WIP")
                <td class="  bg-warning text-white" id="row-stat">{{ $post->progress }}</td>
                @else (($post->progress) == null)
                <td class="  text-secondary" id="row-stat">{{ $post->progress }}</td>
                @endif

                <!--FOLDER LINK-->
                @isset($post->folder)
                <td class=" " id="row-src"><a href="{{ $post->folder }} "target="_blank">📁</a>
                </td>
                @endisset

                @empty($post->folder)
                <td></td>
                @endempty

                <!--COMMENTS-->
                <td class="" id="row-cmt">{{ Str::limit($post->comment, 35) }}</td>

                <!--EDITOR NAME-->
                @if (($post->progress) == 'WIP')
                <td class="" id="row-edtr"><a href="#">✖</a></td>
                @else
                <td class="" id="row-edtr">{{ $post->editor }}</td>
                @endif

                <!--LIVE LINK-->
                @isset($post->live)
                <td class="bg-dark" id="row-live"><a href="{{ $post->live }}" target="_blank">🌐</a>
                </td>
                @endisset

                @empty($post->live)
                <td class="bg-dark"></td>
                @endempty
            </tr>
            @endforeach
            </tbody>
    </table>

    <button class="btn btn-info d-block"><a href="/home" class="text-light p1">🔃 Refresh</a></button>

</div>

@endsection
