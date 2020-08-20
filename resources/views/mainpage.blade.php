<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/main/style.css')}}" type="text/css">
    <style>
        @font-face {
            font-family: "HVM";
            src: url("fonts/HerrVonMuellerhoff-Regular.otf") format("opentype");
        }



        .main_text {
            font-family: "HVM";
        }


        @media (max-width: 900px) {
            body {
                background: url("{{$image_blur}}") !important;
            }

            .main-navbar {
                background: rgba(13, 13, 13, 0.5) !important;
            }


        }

        @media(max-width: 500px)
        {

            .main_text{
                font-size: 15px;
            }
        }


        @media(max-width: 800px)
        {

            .main_text{
                font-size: 60px;
            }
        }

        @media(min-width: 1001px)
        {
            .main_text{
                font-size: 80px;
            }
        }

    </style>
    <title>{{$sitename}}</title>
    <script defer src="js/fa.js"></script>
</head>
<body style="">
<div class="row">
    <div class="col-4-m left-navbar p-5 main-navbar" style="background: #131313; height: 1200px !important;">
        <h1 class="text-center text-light main_text">{{$title}}</h1>
        <ul>
            <li class="text-light mt-3"><a class="effect-underline" href="/portfolio">Portfolio</a></li>
            <li class="text-light mt-2"><a class="effect-underline" href="/about">About me</a></li>
            <li class="text-light mt-2"><a class="effect-underline" href="/services">Services</a></li>
            <li class="text-light mt-2">
                <a href="{{$inst}}" class="link_main"><i class="fab fa-instagram"></i></a>
                <a href="{{$vk}}" class="link_main"><i class="ml-3 fab fa-vk"></i></a></li>
        </ul>
    </div>
    <div  style="height: 200px;overflow:hidden;height:100%;" class="col-8-m">
        <img src="{{$image}}" class="right-img" style="min-height: 100%; width: auto">
    </div>
<!-- <div class="col-8 bg-dark" style="background: #131313 !important;">
    <img src="{{$image}}" class="img-fluid right-img">
    <img style="height: 200px;margin:0 auto;" src="{{$image}}">
</div> -->
</div>
</body>
</html>
