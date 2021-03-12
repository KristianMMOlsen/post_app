@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">
                <div class="row">
                    <div class="col-6  my-auto">
                        <h1>Welcome to the <br>Post-app</h1>
                        <h3 class="text-secondary">Create an account and share posts with your friends,
                            read your friends posts,
                            or simply like a post that you find interresting
                        </h3>
                        @guest
                            <div class="row justify-content-center my-4">
                                <a href="{{ route('register') }}" class="btn btn-primary col-6 w-25 mx-4">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-primary col-6 w-25 mx-4">login</a>
                            </div>
                        @endguest
                    </div>
                    <div class="col-6">
                        <img src="../../images/letter_logo.png" class="img-fluid" alt="letter">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <h3 class="text-secondary">Share your thoughts and ideas</h3>
                        <img src="../../images/idea.png" class="img-fluid" alt="idea">
                    </div>
                    <div class="col-6">
                        <h3 class="text-secondary">Connect with people</h3>
                        <img src="../../images/connect.png" class="img-fluid" alt="idea">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
