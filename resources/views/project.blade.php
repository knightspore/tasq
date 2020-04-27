@extends('layouts.app')

<!--This is the individual Project or Website View-->

@section('title', $thisproject->name )

@section('content')

<div class="container pt-3">

        @if (Session::has('success'))
        <div class="alert alert-success" role="alert" style="top:2%; position: fixed; left:2%; z-index:100; width: 200px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading">Success!</h4>
        <p>{{ Session::get('success') }}</p>
        </div>
        @endif

        @if (Session::has('danger'))
        <div class="alert alert-danger" role="alert" style="bottom:10px; position: fixed; left:2%; z-index:100">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="alert-heading">That didn't work... 🤔 Message support if this keeps happening.</h4>
        <p>{{ Session::get('danger') }}</p>
        </div>
        @endif

    <div class="row mt-2">
        <div class="col-md-5 py-3 text-center">
        <div class="mx-auto">
        @isset($thisproject->logo)
        <img src="{{ $thisproject->logo }}" alt="{{ $thisproject->name }} Logo" class="responsive-image w-25 mx-auto d-block rounded-circle mb-4 shadow-sm img-thumbnail">
        @else
        <img src="https://scontent.fcpt1-1.fna.fbcdn.net/v/t1.0-9/52351556_1102226693290301_5029265171558694912_n.png?_nc_cat=106&_nc_sid=85a577&_nc_oc=AQlJ1ZTnLdwLVhcMhR-vtQiBPlUSGSC94jB0ZRjoHb3F8cK2AfKb7UU8jKcFzNPOxdw&_nc_ht=scontent.fcpt1-1.fna&oh=02750184f02d8fefde2ed82e9a0bd19e&oe=5EC01C5F" alt="{{ $thisproject->name }} Logo" class="responsive-image w-25 mx-auto d-block rounded-circle mb-4 shadow-sm img-thumbnail">
        @endisset
        </div>
        
        <h1><span class="text-success mb-5">{{ $thisproject->name }}</span></h1>
        
        <h4><a href="https://{{ $thisproject->site }}" class="text-muted" target="_blank">{{ $thisproject->site }}</a></h4>
        <hr>
        <div class="text-center">
        <h5>Account Manager: <span class="text-success">{{ $thisproject->accountmgr }}</span></h5>
        <h5>Niche: <span class="text-success">{{ $thisproject->niche }}</span></h5>
        @if($thisproject->client == 1)
        <h5>Client Project</h5>
        @else
        <h5>Internal Project</h5>
        @endif
        <h5><a href="{{ $thisproject->sop }}" class="text-dark">🔗 SOP</a></h5>
        @if (Auth::user()->level >= 5)
        <h6><a href="/project/{{ $thisproject->id }}/edit" class="text-small text-dark">Edit Project</a></h6>
        <h6>Asana ID: <span class="text-success">{{ $thisproject->asana_id }}</span></h6>
        @endif
        </div>
            
        </div>
        <div class="col-md-7 py-3">
        <!-- About Project -->
            <h2 class="pb-3">🧰 Project Info</h2>
        <!--Assigned Tasks-->
            <h2 class="pb-3">🙌🏽 Tasks</h2>
            @foreach($tasks as $task)
            @if($task->site == $thisproject->site)
            @include('components.minitask')
            @endif
            @endforeach
        </div>
    </div>
</div>

@endsection