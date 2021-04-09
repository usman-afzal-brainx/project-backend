@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row pt-3 pl-3">
        <div class="col-sm-6">
            <h2>Company Form</h2>
            <form method="POST" action="/company/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="mb-3">
                    <label for="no_employees" class="form-label">Number of Employees</label>
                    <input type="text" class="form-control" name="no_employees" id="no_employees">
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" name="logo" id="logo">
                </div>
                <div class="mb-3">
                    <label for="city">City</label>
                    <select name="city">
                        @forelse ($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @empty
                        <p>No countries in the database.</p>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="country">Country</label>
                    <select name="country">
                        @forelse ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @empty
                        <p>No countries in the database.</p>
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection