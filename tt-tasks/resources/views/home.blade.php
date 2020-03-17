@extends('layouts.app')

@section('content')

<!--Main Task Table-->

<div class="table-container mt-4 px-5">

    <h1 class="pl-1">Today's Tasks</h1>
    <p class="pl-1">Logged in as <a href="mailto:{{ Auth::user()->email }}" class="text-info">{{ Auth::user()->email }}</a></p>

    <table class="table table-bordered table-sm table-hover table-responsive-lg shadow">
        <thead class="thead-lg thead-dark text-center">
            <tr scope="row">
                <th scope="col" id="col-priority">📣</th>
                <th scope="col" id="col-level">lvl</th>
                <th scope="col" id="col-due">Due</th>
                <th scope="col" id="col-user">Owner</th>
                <th scope="col" id="col-project">Project<br></th>
                <th scope="col" id="col-site">Site</th>
                <th scope="col" id="col-type">Type<br></th>
                <th scope="col" id="col-task">Task</th>
                <th scope="col" id="col-points">KPI 🔥</th>
                <th scope="col" id="col-status">Status<br></th>
                <th scope="col" id="col-folder">📁</th>
                <th scope="col" id="col-comment">Comment</th>
                <th scope="col" id="col-editor">Editor</th>
                <th scope="col" id="col-completed">Completed</th>
                <th scope="col" id="col-live">Live</th>
            </tr>
        </thead>
        <tobdy>

            <!--BEGIN TABLE SCRIPT-->
            
            @foreach($posts as $post)
            <tr scope="row">

                <!--POST PRIORTY- high prio - text-white bg-danger--> 
                <td class="text-center" id="row-prio">{{ $post->priority }}</td>

                <!--POST LEVEL-->
                <td class="text-muted text-center" id="row-id">{{ $post->level }}</td>

                <!--DUE DATE-->
                <td class="text-center" id="row-due">{{ $post->due }}</td>

                <!--POST OWNER-->
                <td class="" id="row-user">{{ $post->user }}</td>

                <!--CLIENT / INTERNAL-->
                <td class="text-muted text-center" id="row-proj">{{ $post->project }}</td>

                <!--PROJECT WEBSITE-->
                <td class="" id="row-site"><a href="https://{{ $post->site }}">{{ $post->site }}</a></td>

                <!--TASK TYPE-->
                <td class="" id="row-type">{{ $post->type }}</td>

                <!--TASK NAME-->
                <td class="" id="row-task">{{ $post->task }}</td>

                <!--TASK POINTS-->
                <td class="text-center" id="row-pts">{{ $post->points }}</td>

                <!--PROGRESS STATUS-->

                <td class="text-center" id="row-stat">{{ $post->progress }}</td>

                <!--FOLDER LINK-->
                <td class="text-center" id="row-src"><a href="{{ $post->folder }}" target="_blank">📁</a></td>

                <!--COMMENTS-->
                <td class="" id="row-cmt">{{ $post->comment }}</td>

                <!--EDITOR NAME-->
                <td class="" id="row-edtr">{{ $post->editor }}</td>

                <!--COMPLETED DATE-->
                <td class="" id="row-compl">{{ $post->completed }}</td>

                <!--LIVE LINK-->
                <td class="text-center" id="row-live"><a href="{{ $post->live }}" target="_blank">🌐</a></td>

            </tr>
            @endforeach

            <tr scope="row" class="text-light bg-success">
                <td class="text-center">0<br></td>
                <td class="text-muted text-center">4</td>
                <td>03 May 2020<br></td>
                <td>Katja S<br></td>
                <td class="text-center">Client</td>
                <td><a href="https://travelvivi.com">travelvivi.com</a></td>
                <td>Audit</td>
                <td>✅ Medium Audit</td>
                <td class="text-center">15000</td>
                <td class="text-light bg-success">Complete </td>
                <td class="text-center"><a href="#">📁</a></td>
                <td>Client Sheet<br></td>
                <td>Tyla O</td>
                <td>May</td>                
                <td class="text-center" id="row-live"><a href="#" target="_blank">🌐</a></td>

            </tr>
            </tr>

            </tbody>
    </table>

    <button class="btn btn-info d-block"><a href="/home" class="text-light p1">🔃 Refresh</a></button>

</div>

@endsection
