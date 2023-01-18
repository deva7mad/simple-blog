<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param StoreCommentRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function store(StoreCommentRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
        $comment = Comment::make($data);
        $comment->post()->associate($post);
        $comment->user()->associate(auth()->user());
        $comment->save();

        return redirect()->back()->with('saved', 'Comment saved.');
    }
}
