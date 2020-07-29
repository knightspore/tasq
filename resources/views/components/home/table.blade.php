<div class="table-container mt-4 px-lg-5">
    <table class="table table-bordered table-sm table-hover shadow bg-light">
        <thead class="thead thead-dark text-center">
            <tr scope="row">
                <th scope="col" id="col-priority">📣</th>
                <th scope="col" id="col-level">lvl</th>
                <th scope="col" id="col-due">Due</th>
                <th scope="col" id="col-user">Assignee</th>
                <th scope="col" id="col-project">Project<br></th>
                <th scope="col" id="col-site">Site<br></th>
                <th scope="col" id="col-task">Task</th>
                <th scope="col" id="col-points">Words</th>
                <th scope="col" id="col-status">Status<br></th>
                <th scope="col" id="col-folder">📁</th>
                <th scope="col" id="col-editor">Editor</th>
                <th scope="col" id="col-live">Live</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr scope="row">
                <!--POST PRIORTY- high prio - text-white bg-danger-->
                <td class="align-middle @if (($task->priority) == 0) bg-dark text-light @elseif (($task->priority) <= 6) bg-light @elseif (($task->priority) <= 8) bg-warning @else bg-success text-light @endif" id="row-prio">{{ $task->priority }}</td>

                <!--POST LEVEL-->
                	<td class="align-middle text-muted font-weight-light" id="row-id">{{ $task->level }}</td>

                <!--DUE DATE-->
	                @if (Str::contains(\Carbon\Carbon::parse($task->due)->diffForHumans(), 'from'))
	                <td class="align-middle" id="row-due">{{\Carbon\Carbon::parse($task->due)->diffForHumans()}}</td> <!--This needs to be fixed in the future-->
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
                	<td class="align-middle font-weight-light" id="row-site"><a href="/project/{{ !empty($task->proj) ? $task->proj->id:'' }}" target="_blank">{{ $task->site }}</a></td>

                <!--TASK NAME-->
	                @if (($task->progress) == "Not Picked Up")
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-success">{{ $task->task }}</span></a> <span class="font-weight-light"> - {{ $task->type }}</span></td>
	                @elseif (($task->progress) == "Complete")
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-muted">{{ $task->task }}</span></a> <span class="font-weight-light text-muted"> - {{ $task->type }}</span></td>
	                @else
	                <td class="align-middle" id="row-task"><a href="/post/{{ $task->id }}"><span class="font-weight-bold text-dark">{{ $task->task }}</span></a> <span class="font-weight-light"> - {{ $task->type }}</span></td>
	                @endif

                <!--TASK WORDS-->
	                @if (($task->progress) == "Complete")
	                <td class="align-middle" id="row-words">✔</td>
	                @else
	                <td class="align-middle text-dark" id="row-words">{{ $task->words }}</td>
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
					<!--<a href="/user/{{ $task->edited->id }}" class="text-dark" style="text-decoration: none;">{{ $task->edited->name }}</a>--!>
					<a href="#" class="text-dark" style="text-decoration: none;">{{ $task->edited->name }}</a>
					@endisset
					</td>

                <!--LIVE LINK-->

	                <td class="align-middle bg-dark" id="row-live">
					@isset($task->live)
					<a href="{{ $task->live }}" target="_blank">🌐</a>
					@endisset
	                </td>
            </tr>
            @endforeach
            </tbody>
    </table>
</div>
