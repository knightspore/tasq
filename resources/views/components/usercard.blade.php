<!--Generates a simple small user card with contact details-->

<div class="card m-3 col-lg-2 col-md-3 col-sm-6 text-center p-2">
    <img class="card-img-top rounded-circle img-thumbnail w-75 mx-auto" src="{{ $user->avatar }}"
        alt="{{ $user->name }}">
    <div class="card-body">
        <h4 class="card-title"><a href="/user/{{ $user->id }}" class="text-dark">{{ $user->name }}</a></h4>
        <h6 class="text-success">{{ $user->role }}</h6>
        <p class="card-text"><small class="text-muted">Slack | <a href="mailto:{{ $user->email }}">Email</a> |
                Asana</small></p>
    </div>
</div>
