@foreach ($comments as $comment)

    <div class="display-comment" @if ($comment->parent_id != null)  @endif>
        <div class="row">
            <!-- shows the username of the user who created the comment -->
            <div class="col-6">
                <a class="text-dark text-decoration-none" href="{{ route('users.posts', $comment->user) }}"><strong
                        id="uname-style">{{ $comment->user->name }}</strong></a>
            </div>
            <!-- shows how many replies a comment has -->
            <div class="col-6">
                <p>{{ $comment->replies->count() }}
                    {{ Str::plural('reply', $comment->replies->count()) }}</p>
            </div>
        </div>
        <!-- shows the comment -->
        <p>{{ $comment->comment }}</p>
        @auth
            <!-- form to post a reply to a comment -->
            <form method="post" action="{{ route('comments.store') }}" class="mb-3">
                @csrf
                <div class="form-group mb-2">
                    <input type="text" name="comment" class="form-control" />
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-dark" value="Reply" />
                </div>
            </form>
        @endauth
        <!-- shows replies of a comment -->
        @include('posts.comments', ['comments' => $comment->replies])
    </div>
@endforeach
