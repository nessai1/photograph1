@extends('admin.atemplate')

@section('content')
    <h1>New feedback</h1>
    <form action="/apanel/addfeedback" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-3">
                <label for="title">Enter Person's name</label>
                <input type="text" class="form-control" name="title" placeholder="Enter name">
            </div>
            <div class="form-group col-3">
                <label for="date">Enter Feedback date</label>
                <input type="text" class="form-control" name="date" placeholder="Enter date">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6 mt-2">
                <label for="maintext">Feedback</label>
                <textarea class="form-control" name="maintext" rows="3" placeholder="Enter feedback"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="form-group col-6">
                <label for="service">Service type</label>
                <input type="text" class="form-control" name="service" placeholder="Enter type">
                <p class="text-muted">If non-service feedback - keep it clear</p>
            </div>
        </div>
        <div class="row col-4">
            <label for="image">Upload Person avatar</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="row col-3 mt-3">
            <button type="submit" class="btn btn-primary">Add feedback</button>
        </div>
    </form>
    <div class="row mt-5 col-10">
        <h1>Feedback control</h1><br>

        <!-- Tablet -->
        <table class="table table-inverse">
            <thead>
            <tr>
                <th>id</th>
                <th>Delete link</th>
                <th>Name</th>
                <th>Text</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedbacks as $feedback)
                <tr>
                    <th scope="row">{{$feedback->id}}</th>
                    <td><a href="/apanel/deletefb/{{$feedback->id}}">Delete</a></td>
                    <td>{{$feedback->title}}</td>
                    <td>{{$feedback->maintext}}</td>
                    <td>{{$feedback->service}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Tablet end -->
    </div>
@endsection
