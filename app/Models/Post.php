<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    function LikeDislike($post_id, $action, $user_id){
        $like_count = Likes::where([
            ['post_id', '=', $post_id],
            ['user_id', '=', $user_id],
            ['type','=', 'like']
        ])->get()->count();

        $dislike_count = Likes::where([
            ['post_id', '=', $post_id],
            ['user_id', '=', $user_id],
            ['type','=', 'dislike']
        ])->get()->count();

        $post = Post::where([
            ['id', '=', $post_id]
        ])->get(['likes','dislikes']);
 
        $new_dislike_count = $post[0]->dislikes;
        $new_like_count = $post[0]->likes;

        if($like_count){

            if($action == 'dislike'){
                $res=Likes::where([
                    ['post_id', '=', $post_id],
                    ['user_id', '=', $user_id],
                    ['type','=', 'like']]
                    )->delete();

                    Post::where('id',$post_id)->decrement('likes', 1);
                    $new_like_count--;

            } else {
                return [
                    'likes' => $new_like_count,
                    'dislikes' => $new_dislike_count,
                ];
            }

        }elseif($dislike_count){
            if($action == 'like'){
                $res=Likes::where([
                    ['post_id', '=', $post_id],
                    ['user_id', '=', $user_id],
                    ['type','=', 'dislike']]
                    )->delete();
                Post::where('id',$post_id)->decrement('dislikes', 1);

                $new_dislike_count--;
            } else {
                return [
                    'likes' => $new_like_count,
                    'dislikes' => $new_dislike_count,
                ];
            }
        }

        $like = new Likes;
        $like->post_id = $post_id;
        $like->user_id = $user_id; 
        $like->type = $action;
        $like->save();

        if($action == 'like'){
            $new_like_count++;
        } else {
            $new_dislike_count++;
        }

        $inrementor_name = $action.'s';

        Post::where('id',$post_id)->increment($inrementor_name, 1);

        $postObj = Post::find($post_id);

        if($postObj->user_id){
            $userObj = User::find($user_id);
            
            User::where('id',$postObj->user_id)->increment('notification_count', 1);
            $Notification = new Notification;
            $Notification->user_id = $postObj->user_id;
            $Notification->post_id = $post_id;
            $Notification->text = $userObj->name.' '.$action.'d your post.';
            $Notification->notification_viewed = 0;
            $Notification->save();
        }
        
        return [
            'likes' => $new_like_count,
            'dislikes' => $new_dislike_count,
        ];
    }
}
