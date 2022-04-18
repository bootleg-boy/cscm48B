@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                @if($errors->any())
  <div class="alert alert-danger">
  <ul>
  @foreach($errors->all() as $error_message)
  <li>{{ $error_message }}</li>
  @endforeach
  </ul> 
  </div>
  @endif
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">

                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <form enctype="multipart/form-data" method="post" action="{{ route('user_post.update', $post->id) }} ">
                                @csrf
                                <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$post->title}}"/>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="6" required>{{$post->content}}</textarea>
                                </div>
                                <div class="form-group">
                                <img style="width:100px;height:100px" class="img-responsive post-image" src="{{ asset('images/posts/'.$post->image)}}" alt='No Image'/>
                                <input type="file" class="form-control" name="post_image"/>
                                <br>
                                <div class="alert alert-info">
                                    Recommended image size: 400px x 150px<br>
                                    Recommended image formats: jpeg,png,jpg<br>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection