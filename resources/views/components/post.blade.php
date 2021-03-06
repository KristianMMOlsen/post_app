@props(['post' => $post])
<!-- makes a clickable container around the posts to see a single post -->
<div onclick="location.href='{{ route('posts.show', $post) }}';" style="cursor:pointer;"
    class="post-container p-2 mb-3">
    <div class="row">
        <!-- shows the name of the creator of the post -->
        <a href="{{ route('users.posts', $post->user) }}"
            class="fw-bold fs-5 text-dark d-inline col-12 col-sm-6 text-decoration-none"><span
                id="uname-style">{{ $post->user->name }}</span>
            <p class="fw-light fs-6 d-inline"><span>@</span>{{ $post->user->username }}</p>
        </a>

        <!-- shows the date for when the post was created -->
        <span class="text-secondary fs-6 col-12 col-sm-6">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <!-- shows the content of each post -->
    <div class="row">
        <h4 class="mb-2">{{ $post->title }}</h4>
    </div>
    <div class="row">
        <p class="mb-2">{{ $post->body }}</p>
    </div>

    <!-- like and unlike buttons for every post -->
    <div class="row">
        @guest
            <div class="col-6 col-sm-3 mb-2">
                <button class="btn btn-dark"><i class="bi bi-hand-thumbs-up"></i></button>
                <span>{{ $post->likes->count() }}
                    {{ Str::plural('like', $post->likes->count()) }}</span>
            </div>
        @endguest
        @auth
            <!-- shows a like button if a user has not liked a post -->
            @if (!$post->likedBy(auth()->user()))
                <div class="col-6 col-sm-3 mb-2">
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i></button>
                        <span>{{ $post->likes->count() }}
                            {{ Str::plural('like', $post->likes->count()) }}</span>
                    </form>
                    <!-- shows how many likes a post has with a plural function -->
                </div>
                <!-- shows a unlike button if a user has liked a post -->
            @else
                <div class="col-6 col-sm-3 mb-2">
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-hand-thumbs-down"></i></button>
                        <span>{{ $post->likes->count() }}
                            {{ Str::plural('like', $post->likes->count()) }}</span>
                    </form>
                </div>
            @endif
        @endauth

        <!-- shows the comment button -->
        @guest
            <div class="col-6 col-sm-4">
                <button type="submit" class="btn btn-dark"><i class="bi bi-chat"></i></button>
                <!-- shows how many comments the post has -->
                <span>{{ $post->comments->count() }}
                    {{ Str::plural('comment', $post->comments->count()) }}</span>
            </div>
        @endguest
        @auth
            <div class="col-6 col-sm-4">
                <button type="submit" class="btn btn-primary"><i class="bi bi-chat"></i></button>
                <!-- shows how many comments the post has -->
                <span>{{ $post->comments->count() }}
                    {{ Str::plural('comment', $post->comments->count()) }}</span>
            </div>
        @endauth

        <!-- delete post button -->
        @can('delete', $post)
            @auth
                <div class="col-6 col-sm-5">
                    <form class="d-flex " action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            @endauth
        @endcan
    </div>
</div>
