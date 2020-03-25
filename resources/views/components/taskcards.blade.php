<!--Generate Post Cards from Database-->
        <div class="col-lg-3 col-sm-6 masonry-column">

            <div class="card card-outline-primary mb-2 shadow-sm">
                <div class="card-header">
                    <div>
                    @if (($post->priority) == 0)
                    <h5 class="card-title"><span class="badge badge-dark">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) <= 5)
                    <h5 class="card-title"><span class="badge">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @elseif (($post->priority) <= 8)
                    <h5 class="card-title"><span class="badge badge-warning">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @else
                    <h5 class="card-title"><span class="badge badge-success">{{ $post->priority }}</span> {{ $post->task }}</h5>
                    @endif

                    </div>
                </div>
                <div class="card-body">
                    <div> 
                    @if (($post->progress) == "Complete")
                    <h6 class="badge p1 text-light badge-primary text-success mb-1">{{ $post->progress }}</h6>
                    @elseif (($post->progress) == "WIP")
                    <h6 class="badge p1 text-light badge-warning mb-1">{{ $post->progress }}</h6> 
                    @elseif (($post->progress) == "Not Picked Up")
                    <h6 class="badge p1 text-light badge-success mb-1">{{ $post->progress }}</h6> 
                    @else
                    <h6 class="badge p1 text-light badge-secondary text-secondary mb-1">{{ $post->progress }}</h6> 
                    @endif

                    <h6 class="badge p1 badge-info">{{ $post->site }}</h6> 

                    @isset($post->due)
                    <h6 class="badge p1 text-light badge-dark text-secondary mb-1">Due {{\Carbon\Carbon::parse($post->due)->diffForHumans()}} </h6>
                    @endisset
                    
                    <h6 class="badge p1 badge-dark">{{ $post->points }} points</h6>

                    </div>
                    @isset($post->user)
                    <h6 class="badge p1 text-light badge-dark mb-1">{{ $post->user }}</h6>
                    @endisset
                </div>

                <div class="card-footer">
                    <a href="/post/{{ $post->id }}" class="card-link">View Task</a>
                </div>

            </div>

        </div>
