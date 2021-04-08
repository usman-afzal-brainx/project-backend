@extends('layout')

@section('content')

<div class="container pt-3 ">
    @forelse($companies as $company)
    <div class="company">
        <h2>Company</h2>
        <h4>Name:</h4>
        <p>{{$company->name}}</p>
        <h4>City:</h4>
        <p>{{$company->city->name}}</p>
        <h4>Country</h4>
        <p>{{$company->city->country->name}}</p>
        <h4>Logo</h4>
        <img src="{{asset('/storage/'.$company->logo_url) }}" alt="">
    </div>
    @empty
    <p>No companies in the database</p>
    @endforelse
</div>

@endsection