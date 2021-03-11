@extends('layouts.app')

@section('content')
    <div class="container col-12">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">

                <!-- form that stores posts created in the textarea -->
                <form action="{{ route('posts') }}" method="post" class="mb-3">
                    <h1 class="row justify-content-center">Posts</h1>
                    @csrf
                    <div class="row mb-4 px-3">
                        <textarea name="body"
                            class="bg-light border-dark border-2 w-100 ta-height p-4 rounded-3 @error('body') border-danger @enderror"
                            placeholder="Create a new post"></textarea>
                        @error('body')
                            <div class="error mt-2 col-12">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- button to submit posts -->
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary w-25">Post</button>
                    </div>
                </form>

                <!-- iterates through all posts if there are any -->
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <div class="container mb-3 bg-light rounded-3 p-2">

                            <!-- shows the name of the creator of the post -->
                            <a href="" class="fw-bold fs-5 text-decoration-none text-dark">{{ $post->user->name }}</a>

                            <!-- shows the date for when the post was created -->
                            <span class="text-secondary fs-6">{{ $post->created_at->diffForHumans() }}</span>

                            <!-- shows the content of each post -->
                            <p class="mb-2">{{ $post->body }}</p>

                            <!-- like and unlike buttons for every post -->
                            <div class="row text-center">
                                <!-- shows like button if a user has not liked a post -->
                                @if (!$post->likedBy(auth()->user()))
                                <div class="col-2">
                                    <form action="{{ route('posts.likes', $post) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Like</button>
                                    </form>
                                </div>
                                <!-- shows a unlike button if a user has liked a post -->
                                @else
                                <div class="col-2">
                                    <form action="{{ route('posts.likes', $post) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Unlike</button>
                                    </form>
                                </div>
                                @endif

                                <!-- shows how many likes a post has with a plural function -->
                                <div class="col-1">
                                <span>{{ $post->likes->count() }} 
                                      {{ Str::plural('like', $post->likes->count()) }}</span>
                                    </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- bootstrap pagination -->
                    <div>{{ $posts->links() }}</div>

                    <!-- if there are no posts there is an error message -->
                @else
                    <p>There are no posts to be found</p>
                @endif

            </div>
        </div>
    </div>
@endsection

<style>
    /* class that sets height for the textarea */
    .ta-height {
        height: 200px;
    }
    /* centers the pagination buttons */
    ul.pagination {
        justify-content: center;
    }

</style>
