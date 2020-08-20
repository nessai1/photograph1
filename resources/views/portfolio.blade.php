@extends('template')

@section('content')

    <div class="album ">
        <div class="container">
            @if (count($sets) == 0)
                <div class="row">
                    <h1 style="color: #d7d6d6; font-size: 40px">There is nothing :(</h1>
                </div>
                <div class="row ml-3">
                    <p style="color: #d7d6d6; font-size: 20px">Coming here late!</p>
                </div>
            @endif
            <div class="row">

                @foreach($sets as $set)

                    <div class="col-md-4">
                    <a href="portfolio/{{$set->id}}">
                        <div class="card mb-4 box-shadow">
                            <div class="card">
                                <img class="card-img" src="{{$photopath.$set->id.'/0f.jpg'}}" alt="Card image">
                                <div class="card-img-overlay  card_back" >
                                    <p class="card-text font-weight-bolder text-light lib-b">{{$set->title}}</p>
                                    <p class="card-text text-light lib-r">{{$set->desc}}</p>
                                    @if($set->service != 'null')
                                    <span class="badge badge-pill badge-primary">{{$set->service}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

                <!--
                <div class="col-md-4">
                    <a href="#">
                        <div class="card mb-4 box-shadow">
                            <div class="card">
                                <img class="card-img" src="photo.jpg" alt="Card image">
                                <div class="card-img-overlay  card_back" >
                                    <p class="card-text font-weight-bolder text-light">I'm text that has a background image!</p>
                                    <p class="card-text text-light">I'm text that has a background image!</p>

                                    <span class="badge badge-pill badge-primary">Secondary</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="card mb-4 box-shadow">
                            <div class="card">
                                <img class="card-img" src="photo.jpg" alt="Card image">
                                <div class="card-img-overlay  card_back" >
                                    <p class="card-text font-weight-bolder text-light">I'm text that has a background image!</p>
                                    <p class="card-text text-light">I'm text that has a background image!</p>

                                    <span class="badge badge-pill badge-primary">Secondary</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="card mb-4 box-shadow">
                            <div class="card">
                                <img class="card-img" src="photo.jpg" alt="Card image">
                                <div class="card-img-overlay  card_back" >
                                    <p class="card-text font-weight-bolder text-light">I'm text that has a background image!</p>
                                    <p class="card-text text-light">I'm text that has a background image!</p>

                                    <span class="badge badge-pill badge-primary">Secondary</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="card mb-4 box-shadow">
                            <div class="card">
                                <img class="card-img" src="photo.jpg" alt="Card image">
                                <div class="card-img-overlay  card_back" >
                                    <p class="card-text font-weight-bolder text-light">I'm text that has a background image!</p>
                                    <p class="card-text text-light">I'm text that has a background image!</p>

                                    <span class="badge badge-pill badge-primary">Secondary</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#">
                    <div class="card mb-4 box-shadow">
                        <div class="card">
                            <img class="card-img" src="photo.jpg" alt="Card image">
                            <div class="card-img-overlay  card_back" >
                                <p class="card-text font-weight-bolder text-light">I'm text that has a background image!</p>
                                <p class="card-text text-light">I'm text that has a background image!</p>

                                <span class="badge badge-pill badge-primary">Secondary</span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            -->
            </div>
        </div>
    </div>
@endsection
