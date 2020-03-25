<!--Mini tasks as seen on the dashboard-->

<div class="card mx-auto bg-dark text-light shadow mb-4">
    <img src="" alt="" class="card-image">
    <div class="card-body">
        <h5 class="card-title">{{ $task->task }}</h5>
        <p class="card-text">
            <strong>Due:</strong> {{ \Carbon\Carbon::parse($task->due)->diffForHumans() }}
            <br>
            <strong>Status:</strong> {{ $task->progress }}
        </p>
        <a href="#" class="btn btn-sm btn-light text-success">View Task</a>
    </div>
</div>
