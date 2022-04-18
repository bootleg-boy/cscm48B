

  @extends('layouts.app')

<style>
.jumbotron {
    width:100%
}
.lef-image {

    width: 150px;
    height: 100px;
    float: right;    
    margin: 0 0 0 15px;
}

.content-contaner-right{
  background-color:#ddd;
  min-height:250px;
  position: relative
}

table{
  position: absolute; 
  top: 50%; 
  left: 50%; 
  transform: translate(-50%, -50%); 
  height:100%;
  width:100%;
}

td{
  text-align:center;
}
</style>

@section('content')

@if(count($posts))
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="container">
            <div class="row ">
                @foreach($posts as $post)
                    <div class="jumbotron">
                    <h3 style="text-align: center;">{{$post->title}}</h3>
                    <img class="lef-image" src="{{ asset('images/posts/'.$post->image)}}" alt='No Image'/>
                        <p align="justify" class="lead">{!! (strlen($post->content) > 400) ? substr($post->content,0,400).'...' : $post->content !!}</p>
                        <a href="{{ route('front.show',$post->id) }}"
                                   class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">Show Post</a>
                                   <br>
                                   <span class="pull-right">Posted By {{ucfirst($post->user->name)}} on {{ date("F jS, Y", strtotime($post->created_at))}}
                                   
                                   &nbsp;&nbsp;&nbsp;
                                   <i data-action='like' data-id = "{!!$post->id!!}" class="like-dislike fa fa-thumbs-up"></i> <span id="like_count_{!!$post->id!!}">{!!$post->likes!!}</span>
                                    <i data-action='dislike' data-id = "{!!$post->id!!}" class="like-dislike fa fa-thumbs-down"></i><span id="dislike_count_{!!$post->id!!}">{!!$post->dislikes!!}</span>
                                   </span>
                    </div>
                @endforeach
            </div>

            {!! $posts->links() !!}
            
        </div>
    </div>
</div>
@else
<div class="content-contaner-right">                            
  <table>
    <tr>
      <td >No Data Found</td>
    </tr>
  </table>  
</div>
@endif
@endsection