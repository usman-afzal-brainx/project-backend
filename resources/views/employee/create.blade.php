@extends('layout')

@section('content')

<div class="container-fluid">
    <div class="row pt-3 pl-3">
        <div class="col-sm-5">
            <form method="POST" action="/employee/create" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="department" id="department">
                </div>
                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation">
                </div>
                <div class="mb-3">
                    <label for="project" class="form-label">Project</label>
                    <input type="text" class="form-control" name="project" id="project">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection