<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD CEA</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <a class="navbar-brand">CRUD</a>
        @auth
            <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn btn-outline-info my-2 my-sm-0 text-capitalize">{{auth()->user()->name}} - Logout</button>
            </form>
            @else
            <a class="btn btn-outline-info my-2 my-sm-0" href="{{ route('login') }}"> Login</a>
        @endauth
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
