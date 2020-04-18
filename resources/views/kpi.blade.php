@extends('layouts.app')

@section('title', 'KPI Points')

@section('content')

<div class="container mt-4">

  <h1>🔥 Team KPI Points</h1>
    <table class="table table-dark shadow">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Jan</th>
          <th scope="col">Feb</th>
          <th scope="col">March</th>
          <th scope="col">April</th>
          <th scope="col">May</th>
          <th scope="col">Jun</th>
          <th scope="col">Jul</th>
          <th scope="col">Aug</th>
          <th scope="col">Sep</th>
          <th scope="col">Oct</th>
          <th scope="col">Nov</th>
          <th scope="col">Dec</th>
        </tr>
      </thead>
      <tbody>
      @foreach( $users as $user)
        <tr>
          <th scope="row"><a href="/user/{{ $user->id }}" class="text-white">{{ $user->name }} - <span class="text-muted">{{ $user->role }}</span></a></th>
          <td class="bg-light text-dark text-left">{{ !empty($user->task) ? $user->task->where('progress', 'Complete')->sum('points'):'' }}</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
          <td class="bg-light text-dark text-left">0</td>
        </tr>
      @endforeach
      </tbody>
    </table>

</div>


@endsection