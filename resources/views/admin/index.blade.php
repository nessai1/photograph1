@extends('admin.atemplate')

@section('content')
    <div class="row col-6">
        <form action="apanel/savemain" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Title">Main Title</label>
                <input type="text" class="form-control" placeholder="Input Title" name="title" value="{{old('title',$title)}}">
            </div>
            <div class="form-group">
                <label for="ImageControl">Main image</label>
                @if($image)
                    <div class="row">
                        <img src="{{$image}}" class="w-50 ml-5 mb-3">
                    </div>
                @endif
                <input type="file" class="form-control-file" id="ImageControl" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
