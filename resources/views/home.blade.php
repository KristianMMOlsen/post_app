@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12 bg-white rounded-3 p-3">
            <div class="row text-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12  my-auto">
                    <h1>Welcome to the <br>Post-app</h1>
                    <h3 class="text-secondary">Create an account and share posts with your friends,
                        read your friends posts,
                        or simply like a post that you find interresting
                    </h3>
                    @guest
                        <div class="row justify-content-center my-4">
                            <a href="{{ route('register') }}" class="btn btn-primary col-4 mx-2">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-primary col-4 mx-2">login</a>
                        </div>
                    @endguest
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-block">
                    <img src="../../images/letter_logo.png" class="img-fluid" alt="letter">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <img src="../../images/connect.png" class="img-fluid" alt="idea">
                </div>
                <div class="col-6 my-auto">
                    <h3 class="text-secondary text-center">Connect with people</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6 my-auto">
                    <h3 class="text-secondary text-center ">Share your thoughts and ideas</h3>
                </div>
                <div class="col-6">
                    <img src="../../images/idea.png" class="img-fluid" alt="idea">
                </div>
            </div>
        </div>
    </div>
@endsection
