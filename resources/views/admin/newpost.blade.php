@extends('admin.atemplate')


@section('content')
    <h1>Photos upload</h1>
    <form action="/apanel/addpost" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-3 form-group">
                <input class="form-control" type="text" placeholder="Type photo" name="service">
                <label for="exampleFormControlFile1" class="mt-3">Photos
                    <span class="text-muted ml-3">select multiply, ONCE!</span></label>
                <input type="file" class="form-control-file" onchange="handleFiles(this.files)" multiple="multiple"
                       name="images[]">
            </div>
            <div class="col-5">
                <input class="form-control" type="text" placeholder="Title" name="title">
                <textarea class="form-control mt-3" id="textArea" rows="3" placeholder="Desk" name="desc"></textarea>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
    </form>



    <div class="results">
    </div>
    <div class="row mt-5 col-10">
        <h1>Photos control</h1><br>

        <!-- Tablet -->
        <table class="table table-inverse">
            <thead>
            <tr>
                <th>id</th>
                <th>Delete link</th>
                <th>Title</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td><a href="/apanel/deletepost/{{$post->id}}">Delete</a></td>
                <td>{{$post->title}}</td>
                <td>
                        <?php
                        if($post->service == 'null')
                            echo('none');
                        else
                            echo($post->service);
                        ?>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Tablet end -->


    </div>


    <script>
        function handleFiles(files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                var reader = new FileReader();
                reader.onload =  function(e) {
                    $('.results').append('<img src="'+e.target.result+'" height="60" class="m-3 shadow-sm rounded">');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
