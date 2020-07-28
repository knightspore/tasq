<div class="border rounded shadow p-3 mb-4">
    <h3><span class="badge badge-success">{{ $task->priority }}</span> {{ $task->task }} <span class="text-muted"></span></h3>
    <hr>
    <h5 class="text-dark">{{ $task->type }} | {{ $task->site }}</h5>
    <h6 class="text-dark">{{ $task->words }} Words</h6>
    @isset($task->user->name)
    <h5 class="text-dark">{{ $task->user->name }}</h5>
    @endisset
    @isset($task->comment)
    <div class="border rounded shadow-sm mb-2">
    <p class="p-3">{{$task->comment}}</p>
    </div>
    @endisset
    <a href="/post/{{ $task['id'] }}" class="text-secondary" target="_blank"><button
            class="btn btn-sm btn-outline-success shadow-sm">View</button></a>
</div>
