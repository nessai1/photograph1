<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>



    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/nava.css')}}" rel="stylesheet">
    <link href="{{asset('css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link href="{{asset('css/about.css')}}" rel="stylesheet">

    <title>{{$sitename}}</title>
</head>
<body>
<nav class="mb-4 navbar navbar-expand-lg navbar-dark bg-dark" style="background: #131313 !important; font-family: 'Nunito', sans-serif !important;">
    <a class="navbar-brand" href="/">{{$photograph}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/portfolio">Portfolio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/services">Services</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
            @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Apanel</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown06">
                        <a class="dropdown-item" href="/apanel">Admin panel</a>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{$inst}}"><i class="fa fa-instagram"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{$vk}}"><i class="fa fa-vk"></i></a>
            </li>

        </ul>

    </div>
</nav>
@yield('content')

<!-- Footer -->
</body>
</html>
