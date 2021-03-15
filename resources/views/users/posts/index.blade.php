@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12 bg-white rounded-3 p-3">
            <!-- row for back button and title -->
            <div class="row border-bottom border-light mb-3">
                <div class="col-3 bg-white p-3">
                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="bi bi-arrow-left-square-fill"></i>
                        Back</a>
                </div>
                <div class="col-6 bg-white p-3">
                    <h1 class="text-center ">{{ $user->name }}</h1>
                </div>

                <div class="row">
                    <h4 class="text-center">{{ $user->name }} has created {{ $posts->total() }}
                        {{ Str::plural('post', $posts->count()) }} and recieved {{ $user->recievedLikes()->count() }}
                        likes
                    </h4>
                </div>
            </div>

            <!-- iterates through all posts if there are any -->
            @if ($posts->count())
                @foreach ($posts as $post)
                    <!-- uses the post component for reusability -->
                    <x-post :post="$post" />
                @endforeach

                <!-- bootstrap pagination -->
                <div class="row mt-4">
                    <div class="col-md-6 col-sm-12">Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} out of
                        {{ $posts->total() }} posts</div>
                    <div class="col-md-6 col-sm-12 pagination pagination-sm">{{ $posts->links() }}</div>
                </div>
                <!-- if there are no posts there is an error message -->
            @else
                <p>{{ $user->name }} has not created any posts yet</p>
            @endif
        </div>
    </div>
@endsection
