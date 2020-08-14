@extends('admin.atemplate')

@section('content')
    <div class="col-8">
        <form action="/apanel/saveabout" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="email"
                       placeholder="Enter email" value="{{old('email', $email)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">About title</label>
                <input type="text" class="form-control" placeholder="Enter title"
                       name="title" value="{{old('title', $title)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">About description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                      name="desc"
                      placeholder="Enter desk">{{old('desc', $desc)}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone number</label>
                <input type="text" class="form-control" placeholder="Enter phone"
                       name="phone"
                       value="{{old('phone', $phone)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">VK link</label>
                <input type="text" class="form-control" placeholder="Enter vk-link"
                       name="vk"
                       value="{{old('vk', $vk)}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Instagram link</label>
                <input type="text" class="form-control" placeholder="Enter inst-link"
                       name="inst"
                       value="{{old('inst', $inst)}}">
            </div>
            <div class="col-8 form-group">
                <label for="exampleFormControlFile1" class="mt-3">Avatar</label>

                @if($image)
                <div class="col-3">
                    <img src="{{$image}}" class="w-100">
                </div>
                @endif

                <div class="col-8 mt-3">
                <input type="file" class="form-control-file"
                       name="image"
                       id="image">
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
