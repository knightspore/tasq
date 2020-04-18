<!--Generate Post Cards from Database-->
        <div class="col-lg-3 col-sm-6 masonry-column">

            <div class="card text-center card-outline-primary mb-2 shadow-sm">
                <div class="card-header">
                
                    <div>
                    @if ($task->progress == 'Complete')
                    <h5 class="card-title"><span class="badge">{{ $task->priority }}</span> {{ $task->task }}</h5>
                    @else
                    @if (($task->priority) <= 5)
                    <h5 class="card-title"><span class="badge">{{ $task->priority }}</span> {{ $task->task }}</h5>
                    @elseif (($task->priority) <= 8)
                    <h5 class="card-title"><span class="badge badge-warning">{{ $task->priority }}</span> {{ $task->task }}</h5>
                    @else
                    <h5 class="card-title"><span class="badge badge-success">{{ $task->priority }}</span> {{ $task->task }}</h5>
                    @endif
                    @endif

                    </div>
                </div>
                <div class="card-body">
                    <div> 
                    @if (($task->progress) == "Complete")
                    <h6 class="badge p1 text-light badge-primary text-success mb-1">{{ $task->progress }}</h6>
                    @elseif (($task->progress) == "WIP")
                    <h6 class="badge p1 text-light badge-warning mb-1">{{ $task->progress }}</h6> 
                    @elseif (($task->progress) == "Not Picked Up")
                    <h6 class="badge p1 text-light badge-success mb-1">{{ $task->progress }}</h6> 
                    @else
                    <h6 class="badge p1 text-light badge-secondary text-secondary mb-1">{{ $task->progress }}</h6> 
                    @endif

                    <h6 class="badge p1 badge-info">{{ $task->site }}</h6> 

                    @isset($task->due)
                    <h6 class="badge p1 text-light badge-dark text-secondary mb-1">Due {{\Carbon\Carbon::parse($task->due)->diffForHumans()}} </h6>
                    @endisset
                    
                    <h6 class="badge p1 badge-dark">{{ $task->points }} points</h6>

                    </div>
                    @isset($task->user)
                    <h6 class="badge badge-info p1 text-light mb-1">{{ !empty($task->owner) ? $task->owner->name:'' }}</h6>
                    @endisset
                </div>

                <div class="card-footer text-center">
                <a href="/post/{{ $task->id }}" class="card-link text-dark"><button class="btn">View Task</button></a>
                </div>

            </div>

        </div>
