<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(5);

        return view('frontend.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.single',compact('post'));
    }

    public function showPost(Request $request, $id = NULL){

        $post = Post::with('user','comments','comments.user','comments.replies')->where('id',$id)->first();
        //dd($post);
        return view('frontend.single',compact('post'));

    }

    public function likeDislike(Request $request){

        $res = ['status'=>false, 'message' => 'Invalid Input'];
        if($request->ajax()){
            $data = $request->all();
            $user = Auth::user();
            $user_id = $user->id??null;
            if(!$user_id){
                
                $res['message'] = 'You must login to like this post';
            } else {
                $Post = new Post();
                $res['status'] = true;
                $res['message'] = $Post->LikeDislike( $data['data_id'], $data['action'], $user_id);
               // $res['message'] = 'Liked';
            }

        }

        return response()->json($res);
    }

    function updateComment(Request $request){
        $res = ['status'=>false, 'message' => 'Invalid Input'];
        if($request->ajax()){
            $data = $request->all();
            $user = Auth::user();
            $user_id = $user->id??null;
            if(!$user_id){
                
                $res['message'] = 'You must login to like this post';
            } else {
                Comment::where('id', $data['data_id'])
                    ->where('user_id', $user_id)
                    ->update(['comment' => $data['comment']]);
                $res['status'] = true;
                $res['message'] = $data['comment'];

            }

        }

        return response()->json($res);
    }

    function list_notifications(){

        $user = Auth::user();

        if(empty($user)){
            return redirect()->route('index');
        }

        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20);

        return view('user.post.notifications', compact('notifications'));
    }

    function update_notification($id){
        $notification = Notification::find($id);
        $user_id = $notification->user_id;

        if($notification->notification_viewed == 0){
            User::where('id',$user_id)->decrement('notification_count', 1);
        }
        
        $notification->notification_viewed = 1;
        $notification->save();

        return redirect(str_replace('?','/',route('index', $notification->post_id)));
    }
}
