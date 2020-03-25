@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<!--Main Task Table-->

<div class="table-container mt-4 px-lg-5">

    <h1 class="mb-4">Task Tracker</h1>

    <table class="table table-bordered table-sm table-hover table-responsive-lg shadow bg-light">
        <thead class="thead-sm thead-dark text-center">
            <tr scope="row">
                <th scope="col" id="col-priority">📣</th>
                <th scope="col" id="col-level">lvl</th>
                <th scope="col" id="col-due">Due</th>
                <th scope="col" id="col-user">Assignee</th>
                <th scope="col" id="col-project">Project<br></th>
                <th scope="col" id="col-site">Site<br></th>
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
            @if ($post->priority > 0)
            <tr scope="row">

                <!--POST PRIORTY- high prio - text-white bg-danger-->
                @if (($post->priority) == 0)
                <td class="align-middle bg-dark text-light" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 6) 
                <td class="align-middle bg-light" id="row-prio">{{ $post->priority }}</td>
                @elseif (($post->priority) <= 8) 
                <td class="align-middle bg-warning" id="row-prio">{{ $post->priority }}</td>
                @else
                <td class="align-middle bg-success text-light" id="row-prio">{{ $post->priority }}</td>
                @endif

                <!--POST LEVEL-->
                <td class="align-middle text-muted font-weight-light" id="row-id">{{ $post->level }}</td>

                <!--DUE DATE-->
                @if (Str::contains(\Carbon\Carbon::parse($post->due)->diffForHumans(), 'from'))
                <td class="align-middle" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @else
                <td class="align-middle text-muted" id="row-due">  {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
                @endif

                <!--ASSIGNEE-->
                <td class="align-middle" id="row-user">{{ $post->user }}</td>

                <!--CLIENT / INTERNAL-->
                <td class="align-middle text-muted font-weight-light" id="row-proj">{{ $post->project }}</td>

                <!--SITE-->
                <td class="align-middle font-weight-light" id="row-site"><a href="https://{{ $post->site }}" target="_blank">{{ $post->site }}</a></td>

                <!--TASK NAME-->
                @if (($post->progress) == "Not Picked Up")
                <td class="align-middle" id="row-task"><a href="/post/{{ $post->id }}"><span class="font-weight-bold text-success">{{ $post->task }}</span></a> <span class="font-weight-light"> - {{ $post->type }}</span></td>
                @else
                <td class="align-middle" id="row-task"><a href="/post/{{ $post->id }}"><span class="font-weight-bold text-dark">{{ $post->task }}</span></a> <span class="font-weight-light"> - {{ $post->type }}</span></td>
                @endif

                <!--TASK POINTS-->
                @if (($post->progress) == "Complete")
                <td class="align-middle" id="row-pts">✔</td>
                @else
                <td class="align-middle text-dark" id="row-pts">{{ $post->points }}</td>
                @endif

                <!--PROGRESS STATUS-->
                @if (($post->progress) == "Complete")
                <td class="align-middle text-muted" id="row-stat">{{ $post->progress }}</td>
                @elseif (($post->progress) == "WIP")
                <td class="align-middle text-warning" id="row-stat">{{ $post->progress }}</td>
                @elseif (($post->progress) == "Not Picked Up")
                <td class="align-middle text-success" id="row-stat">{{ $post->progress }}</td>
                @else (($post->progress) == null)
                <td class="align-middle" id="row-stat">{{ $post->progress }}</td>
                @endif

                <!--FOLDER LINK-->
                @isset($post->folder)
                <td class="align-middle" id="row-src"><a href="{{ $post->folder }} "target="_blank">📁</a></td>
                @endisset

                @empty($post->folder)
                <td class="align-middle"></td>
                @endempty

                <!--COMMENTS-->
                <td class="align-middle" id="row-cmt">{{ Str::limit($post->comment, 15) }}</td>

                <!--EDITOR NAME-->
                <td class="align-middle" id="row-edtr">{{ $post->editor }}</td>

                <!--LIVE LINK-->
                @isset($post->live)
                <td class="align-middle bg-dark" id="row-live"><a href="{{ $post->live }}" target="_blank">🌐</a>
                </td>
                @endisset

                @empty($post->live)
                <td class="align-middle bg-dark"></td>
                @endempty
            </tr>
            @endif
            @endforeach
            </tbody>
    </table>

    <button class="btn btn-info d-block mb-5"><a href="/home" class="text-light p1">🔃 Refresh</a></button>

</div>

@endsection
