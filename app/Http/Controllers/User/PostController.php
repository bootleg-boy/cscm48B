<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $user = Auth::user();

        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('user.post.index', compact('posts'));
    }

    public function create()
    {
        return view('user.post.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            //'post_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=2/1',
            'post_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'content' => 'required',
        ], [
            'post_image.required' => 'Image field is required',
            'post_image.image' => 'Allowed image types are jpeg,png,jpg',
            'post_image.mimes'     => 'Allowed image types are jpeg,png,jpg',
            //'post_image.dimensions'  => 'Please try with 400 x 150 dimension',
            'post_image.max'  => 'Isize can\'t be more than 2 MB',
        ]);
        


        if($request->hasFile('post_image')){
            $image_temp = $request->file('post_image');

            $extention  = $image_temp->getClientOriginalExtension();
            $image_name = time().rand(111,9999).'.'.$extention;
            $image_path = 'images/posts/'.$image_name;

            Image::make($image_temp)->save($image_path);


        }
        
        $user = Auth::user();
        Post::create([
            'content' => request('content'),
            'user_id' => $user->id,
            'slug'    => Carbon::now()->format('Y-m-d-His'),
            'title'   => request('title'),
            'image'   => $image_name,
        ]);
        
        \Session::flash('success_message', 'Post has been succesfully published');
        return redirect()->route('user_posts');
    }

    public function edit(Post $post, $id = null)
    {
        $user = Auth::user();

        $post = Post::where('id',$id)->first();
        if($post->user_id !== $user->id){
            \Session::flash('error_message', 'Permission Denied');
            return redirect()->route('index');
        }
        return view('user.post.edit', compact('post'));
    }
    

    public function update(Request $request, Post $post,$id = null)
    {

        $this->validate($request, [

            //'post_image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:ratio=2/1',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'content' => 'required',
        ], [
            
            'post_image.image' => 'Allowed image types are jpeg,png,jpg',
            'post_image.mimes'     => 'Allowed image types are jpeg,png,jpg',
            //'post_image.dimensions'  => 'Please try with 400 x 150 dimension',
            'post_image.max'  => 'Isize can\'t be more than 2 MB',
        ]);
        


        if($request->hasFile('post_image')){
            $image_temp = $request->file('post_image');

            $extention  = $image_temp->getClientOriginalExtension();
            $image_name = time().rand(111,9999).'.'.$extention;
            $image_path = 'images/posts/'.$image_name;

            Image::make($image_temp)->save($image_path);

            Post::where('id',$id)->update(['content'=>$request->input('content'),
        'title'=> $request->input('title'), 'image'=> $image_name]);

        } else {
            Post::where('id',$id)->update(['content'=>$request->input('content'),
        'title'=> $request->input('title')]);
        }

        \Session::flash('success_message', 'Post has been updated');
        return redirect()->route('user_posts');
    }

    public function destroy(Post $post, $id = null)
    {

        Post::where('id',$id)->delete();
        \Session::flash('success_message', 'Post has been deleted');
        return redirect()->route('user_posts');
    }

    
}
