@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">

                <!-- message for a user to sign in to create a post -->
                @guest
                    <div class="row text-center">
                        <h2>Please <a href="{{ route('login') }}">sign in</a> to create a new post, or register a new account
                            here:</h2>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <a class="btn btn-primary w-25 mb-2" href="{{ route('register') }}">Register</a>
                    </div>
                @endguest

                <!-- form that stores posts created in the textarea if a user is signed in -->
                @auth
                    <form action="{{ route('posts') }}" method="post" class="mb-3">
                        <h1 class="text-center">Posts <i class="bi bi-envelope"></i></h1>
                        @csrf
                        <!-- textarea for creating new posts -->
                        <div class="row mb-4 px-3">
                            <textarea name="body"
                                class="bg-light border-secondary border-2 w-100 ta-height p-4 rounded-3 @error('body') border-danger @enderror"
                                placeholder="Create a new post"></textarea>
                            @error('body')
                                <div class="error mt-2 col-12">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- button to submit posts -->
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary w-25">Post <i class="bi bi-plus-square"></i></button>
                        </div>
                    </form>
                @endauth
                <!-- iterates through all posts if there are any -->
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <!-- uses the post component for reusability -->
                        <x-post :post="$post" />
                    @endforeach

                    <!-- bootstrap pagination -->
                    <div class="row mt-4">
                        <div class="col-6">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} out of
                            {{ $posts->total() }} posts</div>
                        <div class="col-6 pagination pagination-sm justify-content-end">{{ $posts->links() }}</div>
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
