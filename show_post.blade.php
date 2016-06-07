@extends ('layout.app')

@section('content')

  <h2>My name is: {{$name}}</h2>
  <h3>And my number is: {{$id}}</h3>
  <p>
    And my password is {{$password}}
  </p>

@stop
