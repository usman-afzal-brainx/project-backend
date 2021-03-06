<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="css/company.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('styles')
    <title>Document</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="/company">Company</a>
                    <a class="nav-link" href="/employee">Employee</a>
                    <a class="nav-link" href="/user">User</a>
                </div>
            </div>
        </div>
    </nav> -->
    <div class="container">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary" style="float: right">Log Out</button>
        </form>
    </div>

    <div id="app">
    @yield('content')
    @include('layouts.partials.scripts')

    </div>
    <script>
    @auth window.api_token = {!! json_encode(auth()->user()->api_token)!!} @endauth ;
</script>
</body>

</html>
