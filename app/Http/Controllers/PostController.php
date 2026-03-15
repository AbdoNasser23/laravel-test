<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::simplePaginate(4);

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
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title'     =>  'required',
                'author'    =>  'required',
                'body'      =>  'required'
            ],
            [
                'title.required'     => 'Faild is required',
                'author.required'    => 'Faild is required',
                'body.required'      => 'Faild is required'
            ]
        );

        echo "<br>";
        print_r($request->all());
        echo "</br>";
        //TODO: This will be complete for form section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findorfail($id);

        return view("posts.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("posts.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO: This will be complete for form section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO: This will be complete for form section
    }
}
