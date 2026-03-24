<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::simplePaginate(5);

        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $postId = $request->query('postId');
        return view('comments.create',compact('postId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = new Comment();
        $postId = $request->input('posts_id');
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->posts_id = $postId;
        $comment->save();

        return redirect()->route('posts.show',$postId)->with("success","Comment Created Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findorfail($id);
        return view('comments.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('comments.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO:this will be complete for form section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO:this will be complete for form section
    }
}
