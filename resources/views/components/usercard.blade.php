<!--Generates a simple small user card with contact details-->


<div class="card m-2 text-center">
        <div class="card-body border-primary">
        <img class="card-img-top rounded-circle img-thumbnail mb-3" src="{{ $user->avatar }}" alt="{{ $user->name }}">

            <h4 class="card-title"><a href="/user/{{ $user->id }}" class="text-dark">{{ $user->name }}</a></h4>
            <h5 class="text-success">{{ $user->role }}</h5>
            <p class="card-text"><small class="text-muted">Slack | <a href="mailto:{{ $user->email }}">Email</a> |
                    <a href="{{ $client->users->getUser($user->email)->gid }}">Asana</a> </small></p>
        </div>
</div>
