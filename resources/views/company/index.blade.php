@extends('layout')

@section('content')

<div class="container pt-3 mb-5">

    @forelse($companies as $company)
    <div class="company">
        <h2><a href="{{route('company.show',['company'=>$company->id] )}}">Company</a></h2>
        <h4>Name:</h4>
        <p>{{$company->name}}</p>
        <h4>City:</h4>
        <p>{{$company->city->name}}</p>
        <h4>Country</h4>
        <p>{{$company->city->country->name}}</p>
        <h4>Logo</h4>
        <img src=" {{asset($company->logo_url) }}" alt=""><br>
        <div class="button pt-2">
            <a href="{{route('company.edit',['company'=>$company])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('company.delete',['company'=>$company])}}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    @empty
    <p>No companies in the database</p>
    @endforelse
    <a href="{{route('company.create')}}" class="btn btn-primary">Create</a>
    <div class="d-flex justify-content-center">
        {!! $companies->links() !!}
    </div>
</div>

@endsection