@props(['post' => $post])
<!-- makes a clickable container around the posts to see a single post -->
<div onclick="location.href='{{ route('posts.show', $post) }}';" style="cursor:pointer;"
     class="post-container p-2 mb-3">
    <div class="row">
        <!-- shows the name of the creator of the post -->
        <a href="{{ route('users.posts', $post->user) }}"
            class="fw-bold fs-5 text-dark col-4">{{ $post->user->name }}</a>

        <!-- shows the date for when the post was created -->
        <span class="text-secondary fs-6 col-4">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <!-- shows the content of each post -->
    <div class="row"> 
        <p class="mb-2">{{ $post->body }}</p>
    </div>

    <!-- like and unlike buttons for every post -->
    <div class="row">
        @auth
            <!-- shows a like button if a user has not liked a post -->
            @if (!$post->likedBy(auth()->user()))
                <div class="col-4">
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i></button>
                    </form>
                </div>
                <!-- shows a unlike button if a user has liked a post -->
            @else
                <div class="col-4">
                    <form action="{{ route('posts.likes', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-hand-thumbs-down"></i></button>
                    </form>
                </div>
            @endif
        @endauth

        <!-- shows how many likes a post has with a plural function -->
        <div class="col-4">
            <span>{{ $post->likes->count() }}
                {{ Str::plural('like', $post->likes->count()) }}</span>
        </div>
        @can('delete', $post)
            @auth
                <div class="col-4">
                    <form class="d-flex justify-content-end" action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete <i class="bi bi-trash"></i></button>
                    </form>
                </div>
            @endauth
        @endcan
    </div>
</div>