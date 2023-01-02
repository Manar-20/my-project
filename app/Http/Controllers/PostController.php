<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\comment;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function storeComment($post_id, Request $request)
    {
       $comment= new comment();
       $comment->post_id = $post_id;
       $comment->comment = $request->comment;
       $comment->user_id = auth()->user()->id;
       $comment->save();

       return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('allposts', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('image'))
        {
            $image = $request->file('image');
            $image_name = $image->hashName();
            $image->move(public_path('images'), $image_name);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $image_name;
        $post->author_id = auth()->user()->id;
        $post->save();
 

        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::with('comments')->where('id', $post_id)->first();
        return view('showpost', ['post' => $post]);
        
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
