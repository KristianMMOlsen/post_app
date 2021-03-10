@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">
                <!-- form that stores posts created in the textarea -->
                <form action="{{ route('posts') }}" method="post" class="mb-3">
                    @csrf
                    <div class="row mb-4">
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
                        <div class="mb-3 bg-light rounded-3 p-2">
                            <!-- shows the name of the creator of the post -->
                            <a href="" class="fw-bold fs-5 text-decoration-none text-dark">{{ $post->user->name }}</a>
                            <!-- shows the date for when the post was created -->
                            <span class="text-secondary fs-6">{{ $post->created_at->diffForHumans() }}</span>
                            <!-- shows the content of each post -->
                            <p class="mb-2">{{ $post->body }}</p>
                        </div>
                    @endforeach


                    <!-- if there are no posts there is an error message -->
                @else
                    <p>There are no posts to be found</p>
                @endif
                <!-- bootstrap pagination -->
                <div>{{ $posts->links() }}</div>
            </div>
        </div>
    </div>
@endsection

<style>
    .ta-height {
        height: 200px;
    }

    ul.pagination {
        justify-content: center;
    }

</style>
