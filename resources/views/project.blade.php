@extends('layouts.app')

<!--This is the individual Project or Website View-->

@section('title', $thisproject->name )

@section('content')

<div class="container pt-3">

    <div class="row mt-2">
        <div class="col-md-5 py-3 text-center">
        <div class="mx-auto">
        <img src="https://scontent.fcpt1-1.fna.fbcdn.net/v/t1.0-9/52351556_1102226693290301_5029265171558694912_n.png?_nc_cat=106&_nc_sid=85a577&_nc_oc=AQlJ1ZTnLdwLVhcMhR-vtQiBPlUSGSC94jB0ZRjoHb3F8cK2AfKb7UU8jKcFzNPOxdw&_nc_ht=scontent.fcpt1-1.fna&oh=02750184f02d8fefde2ed82e9a0bd19e&oe=5EC01C5F" alt="{{ $thisproject->name }} Logo" class="responsive-image w-75 mx-auto d-block rounded-circle mb-4 shadow-sm img-thumbnail">
        </div>
        
        <h1><span class="text-success mb-5">{{ $thisproject->name }}</span></h1>
        
        <h4><a href="https://{{ $thisproject->site }}" class="text-muted" target="_blank">{{ $thisproject->site }}</a></h4>
        <hr>
        <div class="text-right">
        <h4><a href="{{ $thisproject->sop }}" class="text-dark">🔗 SOP</a></h4>
        <h4>Account Manager: <span class="text-success">{{ $thisproject->accountmgr }}</span></h4>
        @if($thisproject->client == 1)
        <h4>Client Project</h4>
        @else
        <h4>Internal Project</h4>
        @endif
        </div>
            
        </div>
        <div class="col-md-7 py-3">
        <!--Assigned Tasks-->
            <h2 class="pb-3">🙌🏽 In Progress</h2>
            @foreach($tasks as $task)
            @include('components.minitask')
            @endforeach
        <!--Completed Tasks-->
            <h2 class="pb-3">🥚 New Tasks</h2>
        </div>
    </div>
</div>

@endsection