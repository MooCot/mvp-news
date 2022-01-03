<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentsCollection;
use App\Http\Validators\CreateCommetRequest;
use App\Http\Validators\UpdateCommetRequest;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CommentsCollection(Comment::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommetRequest $request)
    {
        $comment = new Comment();
        $comment->author_name = $request->author_name;
        $comment->content = $request->content;
        $comment->post_id = $request->post_id;
        $comment->save();
        return 'succses';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return new CommentResource(Comment::findOrFail($comment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommetRequest $request, Comment $comment)
    {
        Comment::findOrFail($comment->id);
        $comment->author_name = $request->author_name;
        $comment->content = $request->content;
        $comment->save();
        return 'succses';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        Comment::findOrFail($comment->id);
        $comment->delete();
        return 'succses';
    }
}
