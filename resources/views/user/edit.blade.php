@extends('layout')

@section('content')

<div class="container">
    <div class="container-fluid">
        <div class="row pt-3 pl-3">
            <div class="col-sm-6">
                @if(!$user)
                <h2>No user currently logged in.</h2>
                @endif
                @if($user)
                <h2>User Form</h2>
                <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="f_name" class="form-label">Father's name</label>
                        <input type="text" class="form-control" name="f_name" id="f_name"
                            value="{{$user->father_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="cnic" class="form-label">CNIC</label>
                        <input type="text" class="form-control" name="cnic" id="cnic" value="{{$user->cnic}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                    </div>

                    <div class="form-group">
                        <label for="dp">Profile Picture</label>
                        <input type="file" class="form-control-file" name="dp" id="dp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection