@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <h5 class="card-header">
                <strong>All Posts</strong>

            </h5>
            <div class="card-body">
                <p class="card-title">
                    @foreach( $posts as $post)
                        <div>
                            <div>
                                <div class="row">
                                    <div class="col-md-8">
                <p>
                <h4><a href="/view/{{ $post->id }}">{{ $post->title }}</a></h4>
                <small>-{{$post->owner['name']}}</small>
                </p>
            </div>

            <div class="col-md-4">{{ $post->created_at->toDateString() }}</div>

        </div>
        <p class="text-justify">{{ Str::limit($post->content, $limit = 200, $end = '...') }}</p>
    </div>


    <hr>
    </div>
    @endforeach
    <br>

    {{$posts->links()}}
    </p>

    </div>
    </div>
    </div>

@endsection