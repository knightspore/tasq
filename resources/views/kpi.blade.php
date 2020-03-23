@extends('layouts.app')

@section('title', 'KPI Points')

@section('content')

<div class="container mt-4 px-lg-5">

  <h1 class="pl-1">Team KPI Points🔥</h1>
  <p class="pl-1">Logged in as <a href="mailto:{{ Auth::user()->email }}"
          class="text-info">{{ Auth::user()->name }}</a></p>

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
      @foreach( $people as $person)
        <tr>
          <th scope="row">{{ $person->name }}</th>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
          <td class="bg-light text-dark">0</td>
        </tr>
      @endforeach
      </tbody>
    </table>

</div>


@endsection