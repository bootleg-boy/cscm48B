<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.comment.index', compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments');
    }

    public function addComment(CommentRequest $request)
    {
  
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return back();
    }
}
