<div class="border rounded shadow p-3 mb-4">
    <h3><span class="badge badge-success">{{ $task->priority }}</span> {{ $task->task }} <span class="text-muted"></span></h3>
    <hr>
    <h6 class="text-dark">{{ $task->type }} | {{ $task->site }} | {{ $task->words }} Words</h6>
    @if($task->owner)
    <h6 class="text-dark">Picked up by: <span class="text-success"><strong>{{ $task->owner->name }}</strong></span></h6>
    @else
    <h6><strong>Not picked up.</strong></h6>
    @endif
    @if($task->progress == 'WIP')
    @isset($task->comment)
        <hr>
        <p>{{$task->comment}}</p>
        <hr>
    @endisset
    @endif
    <div class="text-center">
    <a href="/post/{{ $task['id'] }}" class="text-secondary"><button
            class="btn btn-outline-success shadow-sm">View</button></a></div>
</div>
