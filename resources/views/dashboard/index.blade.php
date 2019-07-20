@extends('layouts.app')
@section('title') Dashboard @endsection
@section('content')

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-info" style="border-radius: 25px">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Dashboard
                        <small style="padding-left: 15em; font-size: 23px; font-family: cursive">Profile Summary</small>
                    </h1>

                </div>
            </div>
        </nav>
        <br>
        <br>
        {{--  Posts,etc counting visualization  --}}
        <div class="row">
            <div class="col-md-12">
                <div style="width: 50%; margin-left: 550px;">

                    <button type="button" class="btn btn-primary col-sm-6">
                        <div class="panel-left pull-left green" style="padding-right: 1em">
                            <i class="fa fa-clipboard fa-5x"></i>

                        </div>
                        <div style="padding-top: 1em">
                            <span class="badge badge-light">
                                <h3>{{ $count }}</h3>
                                <strong style="font-size: 15px"> Posts </strong>
                            </span>
                        </div>
                    </button>

                </div>

            </div>

        </div>


        <!-- /. ROW  -->
        <div class="row">
            <div class="card col-md-6" style="padding-right: 3em">
                <h5 class="card-header">
                    <strong>Your Posts</strong>
                    <small style="padding-left: 15em; font-size: 23px; font-family: cursive">
                        <a href="/posts/create">Add new article <i class="fa fa-plus-circle fa-1x"></i></a>
                    </small>
                </h5>
                <div class="card-body">
                    <h5 class="card-title">
                        @foreach( $userposts as $post)
                            <div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                                        </div>

                                        <div class="col-md-4">{{ $post->created_at->toDateString() }}</div>

                                    </div>
                                    <p class="text-justify">{{ Str::limit($post->content, $limit = 200, $end = '...') }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit Article</a>
                                    </div>

                                    <div class="col-md-4">
                                        <form method="POST" action="/posts/{{$post->id}}"
                                              onsubmit="return confirm('Are you sure?')">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <div class="field">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger"> Delete Article
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                                <hr>
                            </div>
                        @endforeach
                        <br>

                        {{$userposts->appends(['user_page'=>$userposts->currentPage(),'other_page'=>$otherposts->currentPage()])->links()}}
                    </h5>

                </div>
            </div>
            <div class="card col-md-6" style="padding-right: 3em">
                <h5 class="card-header"><strong>Others' Posts</strong></h5>
                <div class="card-body">
                    <h5 class="card-title">
                        @foreach( $otherposts as $post)
                            <div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
                                    </div>

                                    <div class="col-md-4">{{ $post->created_at->toDateString() }}</div>

                                </div>
                                <p class="text-justify">
                                    {{ Str::limit($post->content, $limit = 200, $end = '...') }}
                                </p>
                               <div class="row">
                                   <div class="col-md-10">

                                   </div>
                                   -{{$post->owner['name']}}
                               </div>
                            </div>
                            <hr>
                        @endforeach

                            {{$otherposts->appends(['other_page'=>$otherposts->currentPage(),'user_page'=>$userposts->currentPage()])->links()}}
                    </h5>

                </div>
            </div>

        </div>


    </div>





    <!-- /. ROW  -->


    <!--/.row-->


    <!-- /. ROW  -->


@endsection
