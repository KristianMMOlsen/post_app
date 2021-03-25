@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12 bg-white rounded-3 p-3">
            <!-- row for back button and title -->
            <div class="row border-bottom border-light">
                <div class="col-3 bg-white p-3">
                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="bi bi-arrow-left-square-fill"></i>
                        Back</a>
                </div>
                <div class="col-6">
                    <h1 class="text-center">Post <i class="bi bi-envelope"></i></h1>
                </div>
            </div>
            <!-- row for displaying the post -->
            <div class="row justify-content-center">
                <div class="bg-white rounded-bottom-3 p-3">
                    <x-post :post="$post" />
                </div>
            </div>
            @auth
                <!-- form for posting a comment -->
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store') }}" class="mb-3 ">
                    @csrf
                    <div class="form-group mb-2">
                        <textarea class="form-control" name="comment"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" value="Add Comment" />
                    </div>
                </form>
            @endauth
            <!-- displays the comments -->
            <h4>Comments</h4>
            @include('posts.comments', ['comments' => $post->comments, 'post_id' => $post->id])
        </div>
    </div>
@endsection
