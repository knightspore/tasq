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
                <th scope="col" id="col-editor">Editor</th>
                <th scope="col" id="col-live">Live</th>
            </tr>
        </thead>
        <tobdy>

            <!--BEGIN TABLE SCRIPT-->

            @foreach($posts->sortByDesc('priority') as $task)
            @if ($task->priority > 0)
            <tr scope="row">

                <!--POST PRIORTY- high prio - text-white bg-danger-->
	                @if (($task->priority) == 0)
	                <td class="align-middle bg-dark text-light" id="row-prio">{{ $task->priority }}</td>
	                @elseif (($task->priority) <= 6) 
	                <td class="align-middle bg-light" id="row-prio">{{ $task->priority }}</td>
	                @elseif (($task->priority) <= 8) 
	                <td class="align-middle bg-warning" id="row-prio">{{ $task->priority }}</td>
	                @else
	                <td class="align-middle bg-success text-light" id="row-prio">{{ $task->priority }}</td>
	                @endif

                <!--POST LEVEL-->
                	<td class="align-middle text-muted font-weight-light" id="row-id">{{ $task->level }}</td>

                <!--DUE DATE-->
	                @if (Str::contains(\Carbon\Carbon::parse($task->due)->diffForHumans(), 'from'))
	                <td class="align-middle" id="row-due">  {{\Carbon\Carbon::parse($task->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
	                @else
	                <td class="align-middle text-muted" id="row-due">  {{\Carbon\Carbon::parse($task->due)->diffForHumans()}} </td> <!--This needs to be fixed in the future-->
	                @endif

                <!--ASSIGNEE-->
				
                <td class="align-middle" id="row-user">
				@foreach ($users as $user)
				@if ($task->user == $user->id)
				<a href="/user/{{ $user->id }}" class="text-dark" style="text-decoration: none;">{{ $user->name }}</a>
				@endif
				@endforeach
				</td>

                <!--CLIENT / INTERNAL-->
                	<td class="align-middle text-muted font-weight-light" id="row-proj">{{ $task->project }}</td>

                <!--SITE-->
                	<td class="align-middle font-weight-light" id="row-site"><a href="https://{{ $task->site }}" target="_blank">{{ $task->site }}</a></td>

                <!--TASK NAME-->
	                @if (($task->progress) == "Not Picked Up")
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-success">{{ $task->task }}</span></a> <span class="font-weight-light"> - {{ $task->type }}</span></td>
	                @elseif (($task->progress) == "Complete")
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-muted">{{ $task->task }}</span></a> <span class="font-weight-light text-muted"> - {{ $task->type }}</span></td>
	                @else
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-dark">{{ $task->task }}</span></a> <span class="font-weight-light"> - {{ $task->type }}</span></td>
	                @endif

                <!--TASK POINTS-->
	                @if (($task->progress) == "Complete")
	                <td class="align-middle" id="row-pts">✔</td>
	                @else
	                <td class="align-middle text-dark" id="row-pts">{{ $task->points }}</td>
	                @endif

                <!--PROGRESS STATUS-->
	                @if (($task->progress) == "Complete")
	                <td class="align-middle text-muted" id="row-stat">{{ $task->progress }}</td>
	                @elseif (($task->progress) == "WIP")
	                <td class="align-middle text-warning" id="row-stat">{{ $task->progress }}</td>
	                @elseif (($task->progress) == "Not Picked Up")
	                <td class="align-middle text-success" id="row-stat">New</td>
	                @else (($task->progress) == null)
	                <td class="align-middle" id="row-stat">{{ $task->progress }}</td>
	                @endif

                <!--FOLDER LINK-->
	                @isset($task->folder)
	                <td class="align-middle" id="row-src"><a href="{{ $task->folder }} "target="_blank">📁</a></td>
	                @endisset

	                @empty($task->folder)
	                <td class="align-middle"></td>
	                @endempty

                <!--EDITOR NAME-->
                	<td class="align-middle" id="row-edtr">
					@foreach ($users as $user)
					@if ($task->editor == $user->id)
					<a href="/user/{{ $user->id }}" class="text-dark" style="text-decoration: none;">{{ $user->name }}</a>
					@endif
					@endforeach
					</td>

                <!--LIVE LINK-->
	                @isset($task->live)
	                <td class="align-middle bg-dark" id="row-live"><a href="{{ $task->live }}" target="_blank">🌐</a>
	                </td>
	                @endisset

	                @empty($task->live)
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
