<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RestroPos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">




</head>
<body>


<!-- As a heading -->
<nav class="navbar navbar-light bg-light" style="margin-bottom:auto">
    <div class="container-fluid">
        <div style="margin-left:45%;">
            <span class="navbar-brand mb-0 h1">Restro Pos</span>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer') }}">Customer Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/items') }}">Items</a>
                </li>

                <li class="nav-item"  style="margin-left: 1150px;">
                        <a  class="btn btn-danger" href="{{route('logout')}}">
                        Logout
                        </a>
                 </li>


            </ul>
        </div>
    </div>
</nav>
@yield('container')



</body>
</html>
