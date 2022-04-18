<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());

        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return back();
    }

    public function addComment(CommentRequest $request)
    {
  
        if(!$request->comment){
            
        }
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        return back();
    }

    public function replyStore(CommentRequest $request)
    {
        $reply = new Comment();
        $reply->comment = $request->get('comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));
        $post->comments()->save($reply);

        return back();
    }
}
