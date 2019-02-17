<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $posts = Post::latest()->simplePaginate(10);
        if (count($posts)<=0) {
            return view('noPosts');
        }else
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required',
            'body'     => 'required',
        ]);
        $post = new Post;
        $post -> user_id = auth()->id();
        $post -> title = request('title');
        $post -> body = request('body');
        $post -> save();
        session()->flash('status','Post created');
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required',
            'body'     => 'required',
        ]);
        $post =  Post::findOrFail($id);
        $post -> user_id = auth()->id();
        $post -> title = request('title');
        $post -> body = request('body');
        $post -> update();
        session()->flash('status','Post updated');
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Post $post)
    {
        $post = Post::findOrFail($id);
        $post -> delete();
        session()->flash('status','Post deleted');
        return redirect('home');
    }

    public function noPosts()
    {     
        return view('noPosts');
    }
}
