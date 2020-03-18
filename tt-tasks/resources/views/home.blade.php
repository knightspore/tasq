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
                <td class="align-middle bg-dark" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 3)                         
                <td class="align-middle bg-primary" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 6) 
                <td class="align-middle bg-info" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 8) 
                <td class="align-middle bg-warning" id="row-prio">{{ $post->priority }}</td>
                @else
                <td class="align-middle bg-danger text-light" id="row-prio">{{ $post->priority }}</td>
                @endif

                <!--POST LEVEL-->
                <td class="align-middle text-muted " id="row-id">{{ $post->level }}</td>

                <!--DUE DATE-->
                @if (Str::contains(\Carbon\Carbon::parse($post->due)->diffForHumans(), 'from'))
                <td class="align-middle" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @else
                <td class="align-middle " style="color: #ffc0cb;" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @endif

                <!--POST OWNER-->
                <td class="align-middle " id="row-user">{{ $post->user }}</td>

                <!--CLIENT / INTERNAL-->
                <td class="align-middle text-muted " id="row-proj"><a href="https://{{ $post->site }}" target="_blank">{{ $post->project }}</a></td>


                <!--TASK TYPE-->
                <td class="align-middle " id="row-type">{{ $post->type }}</td>

                <!--TASK NAME-->
                <td class="align-middle font-weight-bold" id="row-task"><a href="#" class="text-dark">{{ $post->task }}</a></td>

                <!--TASK POINTS-->
                <td class="align-middle bg-dark text-light" id="row-pts">{{ $post->points }}</td>

                <!--PROGRESS STATUS-->
                @if (($post->progress) == "Complete")
                <td class="align-middle text-light bg-success" id="row-stat">{{ $post->progress }}</td>
                @elseif (($post->progress) == "WIP")
                <td class="align-middle  bg-warning text-white" id="row-stat">{{ $post->progress }}</td>
                @else (($post->progress) == null)
                <td class="align-middle  text-secondary" id="row-stat">{{ $post->progress }}</td>
                @endif

                <!--FOLDER LINK-->
                @isset($post->folder)
                <td class="align-middle " id="row-src"><a href="{{ $post->folder }} "target="_blank">📁</a>
                </td>
                @endisset

                @empty($post->folder)
                <td></td>
                @endempty

                <!--COMMENTS-->
                <td class="align-middle" id="row-cmt">{{ Str::limit($post->comment, 50) }}</td>

                <!--EDITOR NAME-->
                @if (($post->progress) == 'WIP')
                <td class="align-middle" id="row-edtr"><a href="#">✖</a></td>
                @else
                <td class="align-middle" id="row-edtr">{{ $post->editor }}</td>
                @endif

                <!--LIVE LINK-->
                @isset($post->live)
                <td class="" id="row-live"><a href="{{ $post->live }}" target="_blank">🌐</a>
                </td>
                @endisset

                @empty($post->live)
                <td></td>
                @endempty
            </tr>
            @endforeach
            </tbody>
    </table>

    <button class="btn btn-info d-block"><a href="/home" class="text-light p1">🔃 Refresh</a></button>

</div>

@endsection
