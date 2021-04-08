@extends('layout')

@section('content')

<div class="container">

    <div class="user">
        <h3>Name:</h3>
        <p>{{$user->name}}</p>
        <h3>Email:</h3>
        <p>{{$user->email}}</p>
        @if ($user->cnic)
        <h3>CNIC:</h3>
        <p>{{$user->cnic}}</p>
        @endif
        @if ($user->address)
        <h3>Address:</h3>
        <p>{{$user->address}}</p>
        @endif
    </div>

</div>

@endsection