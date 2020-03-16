@extends('layouts.app')

@section('content')

    <!--Main Task Table-->

    <div class="table-container p-3">

    	<h2 class="pl-1">{{ Auth::user()->name }}'s Tasks</h2>
    	<p class="pl-1">{{ Auth::user()->email }}</p>

        <table class="table table-bordered table-sm table-hover table-responsive-lg shadow">
            <thead class="thead-dark text-center">
                <tr scope="row">
                    <th scope="col" id="col-priority">Priority</th>
                    <th scope="col" id="col-level">Level</th>
                    <th scope="col" id="col-due">Due</th>
                    <th scope="col" id="col-user">User</th>
                    <th scope="col" id="col-project">Project<br></th>
                    <th scope="col" id="col-site">Site</th>
                    <th scope="col" id="col-type">Type<br></th>
                    <th scope="col" id="col-task">Task</th>
                    <th scope="col" id="col-points">Points</th>
                    <th scope="col" id="col-status">Status<br></th>
                    <th scope="col" id="col-folder">Folder</th>
                    <th scope="col" id="col-comment">Comment</th>
                    <th scope="col" id="col-editor">Editor</th>
                    <th scope="col" id="col-completed">Completed</th>
                    <th scope="col" id="col-live">Live</th>
                </tr>
            </thead>
            <tobdy>
                <tr scope="row">
                    <td class="bg-danger text-center">8</td>
                    <td class="text-muted text-center">2<br></td>
                    <td>20 April 2020</td>
                    <td>Matt D</td>
                    <td class="text-center">Internal<br></td>
                    <td><a href="https://traveltractions.com">traveltractions.com</a></td>
                    <td>Content</td>
                    <td>10 Best Digital Nomad Tips<br></td>
                    <td class="text-center">1000</td>
                    <td class="text-info">In Progress<br></td>
                    <td><a href="#"><i><img src="https://www.svgrepo.com/show/3361/folder.svg" class="img-fluid ml-3" style="width: 30%"></i></a></td>
                    <td>Use pictures from pixabay.com</td>
                    <td>Tammi D</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr scope="row" class="bg-light">
                    <td class="bg-light text-center">0<br></td>
                    <td class="text-muted text-center">4</td>
                    <td>03 May 2020<br></td>
                    <td>Katja S<br></td>
                    <td class="text-center">Client</td>
                    <td><a href="https://travelvivi.com">travelvivi.com</a></td>
                    <td>Audit</td>
                    <td>✅ Medium Audit</td>
                    <td class="text-center">15000</td>
                    <td class="text-light bg-success">Complete </td>
                    <td><a href="#"><i><img src="https://www.svgrepo.com/show/3361/folder.svg" class="img-fluid ml-3" style="width: 30%"></i></a></td>
                    <td>Client Sheet<br></td>
                    <td>Tyla O</td>
                    <td>May</td>
                    <td></td>
                </tr>
                </tr>
                <tr scope="row">
                    <td>$prio</td>
                    <td>$lvl</td>
                    <td>$due</td>
                    <td>$user</td>
                    <td>$proj</td>
                    <td>$site</td>
                    <td>$type</td>
                    <td>$task</td>
                    <td>$pts</td>
                    <td>$prog</td>
                    <td>$src</td>
                    <td>$cmnt</td>
                    <td>$edtr</td>
                    <td>$done</td>
                    <td>$Live</td>
                </tr>
                </tbody>
        </table>
    </div>

@endsection
