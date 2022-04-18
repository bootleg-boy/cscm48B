@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <th>#</th>
                    <th>Notification</th>
                    <th>Published On</th>
                    <th>View Status</th>
                    <th>View Post</th>
                    </thead>
                    <tbody>
                    @foreach($notifications as $post)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->text }}</td>
                            <td>{!! date("F jS, Y", strtotime($post->created_at)) !!}</td>
                            <td>
                            @if($post->notification_viewed)
                                Viewed
                            @else
                                Not Viewed
                            @endif


                            </td>

                            <td><a target="_blank" href="{{route('update_notification',$post->id)}}"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        
                    @endforeach
                    </tbody>

                </table>

                {!! $notifications->links() !!}
            </div>
        </div>
    </div>
@endsection