@extends('layout.app')

@section('content')

<h2> Helow this is the contact page and i'm using blade layouts</h2>

@stop

@section ('footer')

<p>
  this is footer section
</p>

      @if (count($people))
        <ul>
          @foreach($people as $person)
          <li>{{$person}}</li>
          @endforeach
        </ul>
        @endif

@stop
