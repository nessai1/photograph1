@extends('template')


@section('content')
<div class="container">


    @foreach($services as $service)
        <h2 class="featurette-heading mb-5">{{$service->title}}
            @if($service->price != 'null')
                <span class="text-muted ml-3" style="font-size: 40px">{{$service->price}}₽</span>
            @endif
        </h2>
        <div class="row mb-5">
            @if($service->photo)
            <div class="col-4">
                <img src="{{$service->photolink}}" class="img-fluid w-100" alt="">
            </div>
            <div class="col-7">
                <p class="lead"><?php echo(nl2br($service->maintext))?></p>
            </div>
            @else
                <div class="col-12">
                    <p class="lead"><?php echo(nl2br($service->maintext))?></p>
                </div>
            @endif
        </div>
        <p class="lead text-muted">{{$service->secondtext}}</p>
        <hr class="featurette-divider">
    @endforeach

    <!-- example section
    <h2 class="featurette-heading mb-5">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
    <div class="row mb-5">
        <div class="col-4">
            <img src="back.jpg" class="img-fluid w-100" alt="">
        </div>
        <div class="col-8">
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
    </div>
        <p class="lead text-muted">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
    <hr class="featurette-divider">
    -->



</div>
@endsection
