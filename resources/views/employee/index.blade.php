@extends('layout')

@section('content')

<div class="container">
    @forelse ($employees as $employee)
    <div class="employee" style="border-bottom: 1px solid; margin-bottom:50px;">
        <h3>Name:</h3>
        <p>{{$employee->name}}</p>
        <h3>Designation:</h3>
        <p>{{$employee->designation->name}}</p>
        <h3>Department:</h3>
        <p>{{$employee->department->name}}</p>
        <h3>Company:</h3>
        <p>{{$employee->company->name}}</p>
        @forelse ($employee->projects as $project)
        <h4>Project {{$project->id}}</h4>
        <p>{{$project->name}}</p>
        @empty
        <p>No projects yet.</p>
        @endforelse
        <div class="buttons">
            <a href="{{route('employee.edit',['employee'=>$employee])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('employee.delete', ['employee'=>$employee])}}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    @empty
    <p>No employees yet.</p>
    @endforelse
    <a href="{{route('employee.create')}}" class="btn btn-primary">Create</a>
    <div class="d-flex justify-content-center">
        {!! $employees->links() !!}
    </div>
</div>

@endsection