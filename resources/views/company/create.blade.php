@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row pt-3 pl-3">
        <div class="col-sm-6">
            <form method="POST" action="/company/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="city">
                </div>
                <div class="mb-3">
                    <label for="Country" class="form-label">Country</label>
                    <input type="text" class="form-control" name="country" id="Country">
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" name="logo" id="logo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection