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
        @if ($user->dp_url)
        <h3>Dp:</h3>
        <img src="{{asset($user->dp_url) }}" alt="">
        @endif
    </div>
    <a href="/user/edit" class="btn btn-primary mt-5">Edit</a>
</div>

@endsection