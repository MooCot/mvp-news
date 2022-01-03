<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsCollection;
use App\Http\Validators\CreatePostRequest;
use App\Http\Validators\UpdatePostRequest;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new PostsCollection(Post::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->amount_upvotes = 0;
        $post->author_name = $request->author_name;
        $post->save();
        $post->link = route('posts.show', ['post' => $post]);
        $post->save();
        return 'succses';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource(Post::findOrFail($post->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Post::findOrFail($post->id);
        $post->name = $request->name;
        $post->amount_upvotes = 0;
        $post->author_name = $request->author_name;
        $post->save();
        return 'succses';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::findOrFail($post->id);
        $post->delete();
        return 'succses';
    }

    /**
     * Update the upvote in storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function upvotePost(Post $post)
    {
        Post::findOrFail($post->id);
        $post->amount_upvotes = $post->amount_upvotes++;
        $post->save();
        return 'succses';
    }
}
