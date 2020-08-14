@extends('template')

@section('content')
    <div class="container">
        <div class="row ml-1">
            <h1>Title</h1>
        </div>
        <div class="row ml-1">
            <h3 class="text-secondary">text</h3>
        </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block" src="https://sun9-56.userapi.com/x-h3BJ9ohuZ_yGmHyGSV7B7x0_GHFxoOxWHiFw/tg3KTHWVHnU.jpg" alt="Первый слайд">
                <div class="carousel-caption d-none d-md-block">
                    <h3>111</h3>
                    <p>11</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block" src="photo.jpg" alt="Второй слайд">
                <div class="carousel-caption d-none d-md-block">
                    <h3>222</h3>
                    <p>22</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block" src="photo.jpg" alt="Третий слайд">
                <div class="carousel-caption d-none d-md-block">
                    <h3>333</h3>
                    <p>33</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block " src="photo.jpg" alt="Третий слайд">
                <div class="carousel-caption d-none d-md-block">
                    <h3>5</h3>
                    <p>5</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
@endsection
