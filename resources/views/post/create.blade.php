@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="POST" action="/posts/dashboard" class="col-md-8 col-md-offset-2">
            @csrf
            <div class="form-group">
                <label for="inputTitle">Article Title</label>
                <input type="text" class="form-control" id="inputTitle" placeholder="Enter title" name="title">
            </div>
            <div class="form-group">
                <label for="inputContent">Content</label>
                <textarea class="form-control" id="inputContent" placeholder="Content" name="content"
                          cols="150" rows="15"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection