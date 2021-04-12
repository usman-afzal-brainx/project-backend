@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row pt-3 pl-3">
        <div class="col-sm-5">
            <h2>Employee Form</h2>
            <form method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="f_name" class="form-label">Father'name</label>
                    <input type="text" class="form-control" name="f_name" id="f_name">
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <select name="department" id="department">
                        @forelse ($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                        @empty
                        <p>No departments in the database.</p>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <select name="designation" id="designation">
                        @forelse ($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->name}}</option>
                        @empty
                        <p>No designations in the database.</p>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="project" class="form-label">Project</label>
                    <select name="project" id="project">
                        @forelse ($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                        @empty
                        <p>No departments in the database.</p>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <select name="company" id="company">
                        @forelse ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @empty
                        <p>No company in the database.</p>
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection