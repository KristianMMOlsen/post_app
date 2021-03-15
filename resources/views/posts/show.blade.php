@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12 bg-white rounded-3 p-3">
            <!-- row for back button and title -->
            <div class="row">
                <div class="col-3 bg-white border-bottom border-light p-3">
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
        </div>
    </div>
@endsection
