@extends('layouts.app')

@section('content')




        <div class="container">
            <div>
                <p class="title" style="font-family:Nunito, sans-serif; font-size: 20px "><b>Edit Article</b></p>
                <hr>

                <form method="POST" action="/posts/{{ $post->id }}" class="col-md-8 col-md-offset-2">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="Title">Article Title</label>
                        <input type="text" class="form-control" value="{{ $post->title }}" placeholder="Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="inputContent">Content</label>
                        <textarea class="form-control text-area text-box multi-line"
                                  id="inputContent" placeholder="Content" name="content" cols="150" rows="15" >{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
{{--            </div>--}}



                <br/>


{{--            <div class="align-bottom">--}}
                <form method="POST" action="/posts/{{$post->id}}" class="col-md-8 col-md-offset-2" onsubmit="return confirm('Are you sure?')">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <div class="field">

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Delete Article </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
