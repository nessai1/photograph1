@extends('admin.atemplate')

@section('content')
    <h1>New service</h1>
    <div class="row col-md-12">

        <form action="/apanel/addservice" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="title">Work name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="title">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" placeholder="Enter description" name="maintext"
                    rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="cond">Conditions</label>
                    <textarea class="form-control" placeholder="Enter conditions" name="secondtext"
                              rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="cond">Price</label>
                    <input type="text" class="form-control" placeholder="Enter conditions" name="price">
                    <p class="text-muted">If it's special work - keep field clear</p>
                </div>
                <div class="form-group">
                    <label for="image">Main Image</label>
                    <input type="file" class="form-control-file" id="ImageControl" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <div class="row mt-5 col-10">
        <h1>Services control</h1><br>

        <!-- Tablet -->
        <table class="table table-inverse">
            <thead>
            <tr>
                <th>id</th>
                <th>Delete link</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <th scope="row">{{$service->id}}</th>
                    <td><a href="/apanel/deleteserv/{{$service->id}}">Delete</a></td>
                    <td>{{$service->title}}</td>
                    <td><?php if($service->price == 'null') echo "none"; else echo $service->price;?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Tablet end -->
    </div>
@endsection
