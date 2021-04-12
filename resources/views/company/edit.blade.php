@extends('layout')

@section('content')

<div class="container pt-3 mb-5">
    @if($company)
    <div class="company">
        <h2>Company Form</h2>
        <form method="POST" action="{{route('company.update',['company'=>$company->id])}}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}">
            </div>
            <div class="mb-3">
                <label for="no_employees" class="form-label">Number of Employees</label>
                <input type="text" class="form-control" name="no_employees" id="no_employees"
                    value="{{$company->no_employees}}">
            </div>
            <div class="mb-3">
                <label for="city">City</label>
                <select name="city" id="city">
                </select>
            </div>
            <div class="mb-3">
                <label for="country">Country</label>
                <select name="country" id="country" onchange="handleClick()">
                    @forelse ($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @empty
                    <p>No countries in the database.</p>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" class="form-control-file" name="logo" id="logo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endif
    @if(!$company)
    <p>There is no company in the database</p>
    @endif
</div>
@endsection

@section('script')
<script>
    handleClick();
    function handleClick(){
       
       let selectedValue = $('#country option:selected').val();
       $.ajax({
        url: "{{route('countries.cities')}}",
        data:{
            id: selectedValue
        },
        success:function(response){
            const myNode = document.getElementById("city");
            myNode.innerHTML = '';
            response.cities.forEach(function(value, index){
                let x = document.createElement("OPTION");
                x.setAttribute('value',value.id);
                var t = document.createTextNode(value.name);
                x.appendChild(t);
                document.getElementById("city").appendChild(x);
            });
        }
        });
    }
   
</script>
@endsection