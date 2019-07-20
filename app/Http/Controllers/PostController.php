<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();



        $userposts = auth()->user()->post()->orderBy('created_at', 'desc')->paginate(5,['*'],'user_page');


        $_userposts = auth()->user()->post;

        $_otherposts = $posts->diff($_userposts);
        $ids=[];
        foreach ($_otherposts as $post)
        {
            array_push($ids,$post->id);
        }

        $otherposts=Post::whereIn('id',$ids)->orderBy('created_at', 'desc')->paginate(6,['*'],'other_page');
        //dd($otherposts);



//        dd($posts->owner_id);
        $count = 0;
        foreach ($posts as $post)
        {
//            \Log::info($post->owner_id);
//            ($post->owner_id);
            if( $post->owner_id == auth()->id())
            {
                $count +=1;
            }
        }
//        $posts = count(Post::all()->where(Post::all()->owner_id, '=', auth()->id()));
//        count(DB::table('user_visits')->groupBy('user_id')->get());
        return view('dashboard.index', compact('count', 'userposts', 'otherposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('lol');
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(auth()->id());
        $attributes = $this->validatePost();
        $attributes['owner_id'] = auth()->id();
        Post::create($attributes);



        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $this->authorize('update', $post);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
//        dd("hello");
        $post = Post::findOrFail($id);
//        dd(request(['title', 'content']));
        $this->authorize('update', $post);

        $post->update(request(['title', 'content']));
        //abort_if(\Gate::denies('view', $project), 403);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        //abort_if(\Gate::denies('view', $post), 403);
        $post->delete();
        return redirect('/posts');
    }

    public function validatePost()
    {
        return \request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:3']
        ]);
    }

}
