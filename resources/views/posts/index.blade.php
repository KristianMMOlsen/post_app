@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <!-- uses the post component for reusability -->
                        <x-post :post="$post" />
                    @endforeach

                    <!-- bootstrap pagination -->
                    <div class="row">
                        <div class="col-4">Showing {{ $posts->count() }} out of {{ $post->count() }} posts</div>
                        <div class="col-8">{{ $posts->links() }}</div>
                    </div>

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
