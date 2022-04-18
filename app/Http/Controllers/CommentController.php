<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Notification;
use App\Models\User;

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
            \Session::flash('error_message', 'Please input a data');
            return back();
        }

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);

        $user_id = $post->user_id;

        if($user_id){
            User::where('id',$user_id)->increment('notification_count', 1);
            $Notification = new Notification;
            $Notification->user_id = $post->user_id;
            $Notification->post_id = $request->post_id;
            $Notification->text = $request->user()->name.' Commented on your post.';
            $Notification->notification_viewed = 0;
            $Notification->save();
        }
        

        \Session::flash('success_message', 'You are comment posted');
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
