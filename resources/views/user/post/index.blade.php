@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Published On</th>
                    <th>Likes</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $post->title !!}</td>
                            <td>{!! (strlen($post->content) > 300) ? substr($post->content,0,300).'...' : $post->content !!}</td>
                            <td>{!! date("F jS, Y", strtotime($post->created_at)) !!}</td>
                            <td>
                            <div class="reaction">
                                <a class="btn text-green"><i class="fa fa-thumbs-up"></i> {{$post->likes}}</a>
                                <a class="btn text-red"><i class="fa fa-thumbs-down"></i> {{$post->dislikes}}</a>
                            </div>
                            </td>
                            <td>
                                <a href="{{ route('front.show', $post->id) }}" class="btn btn-sm btn-outline-primary py-0" style="font-size: 0.8em;">Read Post</a>
                                <a href="{{ route('user_post.edit', $post->id) }}" class="btn btn-sm btn-outline-success py-0" style="font-size: 0.8em;">Edit Post</a>
                                <form action="{{route('user_post.destroy', $post->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger py-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection