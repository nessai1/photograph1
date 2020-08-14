@extends('template')


@section('content')
<div class="container">


    @if ($info->size > 1)
        <div class="m-5" style="margin-left: 100px !important;">
        <div class="row ml-n3 lib-b">
            <h1 style="font-size: 50px ">{{$info->title}}</h1>
        </div>
            @if($info->service != 'null')
            <div class="row ml-n2 lib-r">
                <h5 style="font-size: 16px; color: #d4d4d4">{{$info->service}}</h5>
            </div>
            @endif
        <div class="row lib-r mt-5">
            <p style="font-size: 20px; color: #222528"><?php echo (nl2br($info->desc)) ?></p>
        </div>
        </div>
        @for ($i = 1; $i < $info->size+1; $i++)
            <h1 style="font-size: 90px; color: #000; margin-top: 50px !important; color: #f1f1f1" class="ml-n4">{{$i}}</h1>
            <div class="col-11" style="height: 66px; margin-top: -96px; margin-left: 40px; background-color: #f1f1f1"></div>
            <div class="row m-5 shadow" style="margin-top:20px !important;">
                <img src="{{$path.($i-1).".jpg"}}" class="img-fluid w-100 rounded" alt="">
            </div>
        @endfor
    @else

        <h1 class="text-center lib-b mt-5">{{$info->title}}</h1>
        @if($info->service != 'null')
        <h5 class="text-center lib-r mt-3" style="color:#d7d7d7">{{$info->service}}</h5>
        @endif
        <div class="row m-5 shadow" style="margin-top:40px !important;">
            <img src="{{$path.'0'.".jpg"}}" class="img-fluid w-100 rounded" alt="">
        </div>
        <p class="text-center lib-r mt-3" style="color:#000; font-size: 20px"><?php echo(nl2br($info->desc)) ?></p>

    @endif



</div>
@endsection
