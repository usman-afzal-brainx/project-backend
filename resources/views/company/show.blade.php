@extends('layout')

@section('content')
<div class="container pt-3">
    @forelse ($employees as $employee)
    <div class="employee">
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
    </div>
    @empty
    <p>No employees yet.</p>
    @endforelse
    <a href="/company" class="btn btn-primary">Back</a>
</div>


@endsection