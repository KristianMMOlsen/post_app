@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">
                <h1 class="text-center">{{ $user->name }}</h1>
                <p class="text-center">{{ $user->name }} has created {{ $posts->total() }}
                    {{ Str::plural('post', $posts->count()) }} and recieved {{ $user->recievedLikes()->count() }} likes
                </p>
                <!-- iterates through all posts if there are any -->
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <!-- uses the post component for reusability -->
                        <x-post :post="$post" />
                    @endforeach

                    <!-- bootstrap pagination -->
                    <div class="row mt-4">
                        <div class="col-6">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} out of {{  $posts->total() }} posts</div>
                        <div class="col-6 pagination pagination-sm justify-content-end">{{ $posts->links() }}</div>
                    </div>
                    <!-- if there are no posts there is an error message -->
                @else
                    <p>{{ $user->name }} has not created any posts yet</p>
                @endif
            </div>
        </div>
    </div>
@endsection
