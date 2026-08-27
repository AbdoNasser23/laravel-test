<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->simplePaginate(4);

        return view("posts.index",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title') ;
        $post->user_id = User::find(Auth::id())->id;
        $post->body = $request->input('body') ;
        $post->published = $request->has('published') ;
        $post->save();
        return redirect()->route('posts.index')->with("success" , "Post Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view("posts.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view("posts.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->save();
        return redirect()->route('posts.index')->with("success", "Post Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with("success","Post Deleted Successfully!");
    }
}
