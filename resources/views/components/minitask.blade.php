<!--Mini tasks as seen on the dashboard-->

<div class="card mx-auto bg-dark text-light shadow mb-4">
    <img src="" alt="" class="card-image">
    <div class="card-body">
    
        @if (($task->priority) == 0)
        <h5 class="card-title"><span class="badge badge-dark">{{ $task->priority }}</span> {{ $task->task }}</h5>
        @elseif (($task->priority) <= 5)
        <h5 class="card-title"><span class="badge">{{ $task->priority }}</span> {{ $task->task }}</h5>
        @elseif (($task->priority) <= 8)
        <h5 class="card-title"><span class="badge badge-warning">{{ $task->priority }}</span> {{ $task->task }}</h5>
        @else
        <h5 class="card-title"><span class="badge badge-success">{{ $task->priority }}</span> {{ $task->task }}</h5>
        @endif

        <p class="card-text">
            <strong>Due:</strong> {{ \Carbon\Carbon::parse($task->due)->diffForHumans() }}
            <br>
            <strong>For:</strong> {{ $task->site }}
            <br>
            <strong>Status:</strong> {{ $task->progress }}
            @if (($task->user) != Auth::user()->name)
            <br>
            @foreach ($users as $user)
            @if ($task->user == $user->id)
            <strong>Assigned to:</strong> {{ $user->name }}
            @endif
            @endforeach
            @endif
        </p>
        <a href="/post/{{ $task->id }}" class="btn btn-sm btn-light text-dark">View Task</a>
    </div>
</div>
