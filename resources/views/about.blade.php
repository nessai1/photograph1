@extends('template')


@section('content')
    <div class="container" style="margin-top: -24px">
        <div class="row">
            <div class="d-flex">
                <div class="text img p-md-5 col-sm-4" style="background-image: url({{$image}}); background-repeat: no-repeat; background-position-x: 30%">
                </div>
                <div class="author-info text p-4 p-md-5 mt-5 mb-5 col-sm-6">
                    <div class="desc">
                        <h1 class="mb-4 lib-b"><span>{{$title}}</span></h1>
                        <p class="mb-4 lib-r"><?php echo(nl2br($desc))?></p>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <dl class="dl-horizontal">
                                <dt class="col-sm-3 lib-r">E-Mail</dt>
                                <dd class="col-sm-9 lib-r">{{$email}}</dd>
                            </dl>
                        </div>
                        <div class="col-sm-8">
                            <dl class="dl-horizontal">
                                <dt class="col-sm-3 lib-r">Social</dt>
                                <dd class="col-sm-9">
                                    <a class="waves-effect waves-light social_link" href="{{$vk}}"><i class="fa fa-instagram"></i></a>
                                    <a class="waves-effect waves-light ml-3 social_link" href="{{$inst}}"><i class="fa fa-vk"></i></a>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-sm-8">
                            <dt class="col-sm-5 lib-r">Phone</dt>
                            <dd class="col-sm-9">{{$phone}}</dd>
                        </div>
                </div>

            </div>

            <!--
            <div class="col-sm-4">
                <img src="photo.jpg" class="img-fluid rounded-circle h-75 ml-lg-5" alt="avatar image">
            </div>
            <div class="col-sm-8 mt-5">
                <h1>ОБО МНЕ</h1>
                <h4>
                    Рада приветствовать Вас на моем сайте! Меня зовут Ольга, я занимаюсь любимым делом - я фотограф!
                    С детства я увлекалась изобразительным искусством, закончила художественную школу.
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
            <dl class="dl-horizontal">
                <dt class="col-sm-3">E-Mail</dt>
                <dd class="col-sm-9">werowkin@gmail.com</dd>
            </dl>
            </div>
            <div class="col-sm-4">
                <dl class="dl-horizontal">
                    <dt class="col-sm-3">Social</dt>
                    <dd class="col-sm-9">
                                <a class="waves-effect waves-light"><i class="fa fa-instagram"></i></a>
                                <a class="waves-effect waves-light ml-3"><i class="fa fa-vk"></i></a>
                    </dd>
                </dl>
            </div>
            <div class="col-sm-4">
                <dt class="col-sm-5">Phone number</dt>
                <dd class="col-sm-9">+79998887766</dd>
            </div>
            -->


        </div>
    </div>
    <div class="row col-sm-12 bg-dark" style="background: #131313 !important;">
        <div class="col-sm-5"></div>
        <h2 class="text-light pt-3 pb-3">Feedback</h2>
    </div>

        @if (!count($feedbacks))
            <div class="row m-3" style="margin-bottom: 0 !important;">
                <h1 style="color: #d7d6d6; font-size: 40px">There is nothing :(</h1>
            </div>
            <div class="row ml-4">
                <p style="color: #d7d6d6; font-size: 20px">Be first!</p>
            </div>
        @endif
    <!-- Feedback section -->
        @foreach($feedbacks as $feedback)
            <div class="row mt-3">
                <div class="col-sm-3">
                    <img src="{{$feedback->photolink}}" class="img-fluid rounded-circle h-50 ml-5 mt-lg-3" alt="avatar image">
                </div>
                <div class="col-sm-8 mt-4">
                    <h2>{{$feedback->title}}
                        @if($feedback->service)
                            <span class="badge badge-primary">{{$feedback->service}}</span>
                        @endif
                    </h2>
                    <p style="font-size: 20px">
                        <?php echo(nl2br($feedback->maintext))?>
                    </p>
                    <p class="font-weight-light text-secondary">{{$feedback->date}}</p>
                </div>
            </div>
            <hr class="featurette-divider mt-n4">
        @endforeach
    </div>
    </div>



@endsection
