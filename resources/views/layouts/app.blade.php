<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>


    <!--Webpack this sometime-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <!-- Styles -->
    @if(0)
        <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/light.css') }}" rel="stylesheet">
        <style>
            body {
                background-color: #34495e
            }
        </style>
    @endif
</head>
<body>
        <nav class="navbar navbar-dark" style="background-color: #FF9800">
            <a class="navbar-brand" href="{{route('dashboard')}}">Anvil</a>
            <ul class="nav">
                 <li class="nav-item nav-link">
                     @auth

                     @else
                         <a class="text-white" href="{{ route('login') }}">Login</a>
                         <a class="text-white" href="{{ route('register') }}">Register</a>
                         @endauth
                 </li>

            </ul>

            @if(Auth::check())
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{route('userSettings',Auth::user()->id)}}">Settings</a>
                        <a class="dropdown-item bg-danger" href="#">Logout</a>
                    </div>
                </div>
            @endif
        </nav>
        @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
