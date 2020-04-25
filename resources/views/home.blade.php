@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<!--Main Task Table-->

<div class="table-container mt-4 px-lg-5">

    <h1 class="mb-4">📃 Task Sheet</h1>

    <table class="table table-bordered table-sm table-hover table-responsive-lg shadow bg-light">
        <thead class="thead thead-dark text-center">
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
					<a href="/user/{{ !empty($task->owner) ? $task->owner->id:'' }}" class="text-dark" style="text-decoration: none;">{{ !empty($task->owner) ? $task->owner->name:'' }}
					</a>
					</td>

                <!--CLIENT / INTERNAL-->
                	<td class="align-middle text-muted font-weight-light" id="row-proj">{{ $task->project }}</td>

                <!--SITE-->
                	<td class="align-middle font-weight-light" id="row-site"><a href="project/{{ !empty($task->proj) ? $task->proj->id:'' }}" target="_blank">{{ $task->site }}</a></td>

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
	                <td class="align-middle" id="row-src">
	                @isset($task->folder)
					<a href="{{ $task->folder }} "target="_blank">📁</a>
					@endisset
					</td>

				<!--EDITOR NAME-->
					
                	<td class="align-middle" id="row-edtr">
					@isset($task->editor)
					<a href="/user/{{ $task->edited->id }}" class="text-dark" style="text-decoration: none;">{{ $task->edited->name }}</a>
					@endisset
					</td>

                <!--LIVE LINK-->
	                
	                <td class="align-middle bg-dark" id="row-live">
					@isset($task->live)
					<a href="{{ $task->live }}" target="_blank">🌐</a>
					@endisset
	                </td>
	                

            </tr>
            @endif
            @endforeach
            </tbody>
    </table>
	
</div>

@endsection
