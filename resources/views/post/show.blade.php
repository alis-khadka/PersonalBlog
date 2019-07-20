@extends('layouts.app')

@section('content')


    <div class="card container" style="width: 50rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <hr>

            <p class="card-text">{{ $post->content }}</p>
            @if(auth()->id()==$post->owner_id)
                <a href="/posts/{{ $post->id }}/edit">
                    <button type="button" class="btn btn-primary">
                        Edit Post
                    </button>
                </a>
            @endif
        </div>
    </div>



@endsection