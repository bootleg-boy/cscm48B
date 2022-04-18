@foreach($comments as $comment)
    <div class="display-comment">
        @if ($comment->user_id)
        <strong>{{ $comment->user->name }}</strong>
        @else
        <strong>Anon</strong>
        @endif
        <p>{{ $comment->comment }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <textarea name="comment" class="form-control" cols="40" rows="1" minlength="2" maxlength="1000" required></textarea>
                @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>

        @include('frontend.partials.replies', ['comments' => $comment->replies])
    </div>
@endforeach
