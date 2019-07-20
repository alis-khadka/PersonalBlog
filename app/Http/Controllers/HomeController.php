<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user())
        {return redirect('/posts');}
        else
        {
            $posts=Post::orderBy('created_at', 'desc')->paginate(10);
            return view('welcome',compact('posts'));
        }
    }

    public function show($id)
    {
        $post= Post::findOrFail($id);

       return view('home.view', compact('post'));
    }
}
