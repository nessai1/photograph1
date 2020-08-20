<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/material-photo-gallery.min.js') }}" defer></script>



    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link href="{{asset('css/material-photo-gallery.css')}}" rel="stylesheet">
    <link href="{{asset('css/grid.css')}}" rel="stylesheet">

    <title>Document</title>
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
                        <a class="dropdown-item" href="apanel">Admin panel</a>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{$vk}}"><i class="fa fa-instagram"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="{{$inst}}"><i class="fa fa-vk"></i></a>
            </li>

        </ul>

    </div>
</nav>


@if ($info->size > 1)

<h1 class="text-center text-dark lib-b" style="color: #000 !important;">{{$info->title}}</h1>

<p class="text-center text-dark lib-r" style="color: #000 !important;"><?php echo(nl2br($info->desc))?></p>
@if($info->service != 'null')
    <h5 class="text-center lib-r mt-3" style="color:#d7d7d7">{{$info->service}}</h5>
@endif
<div class="m-p-g">
    <div class="m-p-g__thumbs" data-google-image-layout data-max-height="350">
        @for ($i = 1; $i < $info->size+1; $i++)
        <img src="{{$path.($i-1).".jpg"}}" data-full="{{$path.($i-1)."f.jpg"}}" class="m-p-g__thumbs-img" />
        @endfor
    </div>

    <div class="m-p-g__fullscreen"></div>
</div>

<script>
    var elem = document.querySelector('.m-p-g');

    document.addEventListener('DOMContentLoaded', function() {
        var gallery = new MaterialPhotoGallery(elem);
    });
</script>
@else
    <div class="container">
    <h1 class="text-center lib-b mt-5" style="color: #000 !important;">{{$info->title}}</h1>
    @if($info->service != 'null')
        <h5 class="text-center lib-r mt-3" style="color:#d7d7d7">{{$info->service}}</h5>
    @endif
    <div class="row m-5 shadow" style="margin-top:40px !important;">
        <img src="{{$path.'0'."f.jpg"}}" class="img-fluid w-100 rounded" alt="">
    </div>
    <p class="text-center lib-r mt-3" style="color:#000; font-size: 20px"><?php echo(nl2br($info->desc)) ?></p>
    </div>
@endif
<!-- Footer -->
</body>
</html>
