@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 col-xs-12 bg-white rounded-3 p-3">
            <!-- row for back button and title -->
            <div class="row mb-3">
                <div class="col-3 border-bottom border-light p-3">
                    <a href="{{ url()->previous() }}" class="btn btn-light"><i class="bi bi-arrow-left-square-fill"></i>
                        Back</a>
                </div>
                <div class="col-6">
                    <h2 class="text-center">Register new user</h2>
                </div>
            </div>

            <!-- form for registering a new user -->
            <form action="{{ route('register') }}" method="post" class="p-4 text-center w-75 mx-auto">
                <!-- cross site request forgery token for the form -->
                @csrf
                <!-- input field for name -->
                <div class="input-group mb-3">
                    <input type="text" name="name" id="name" placeholder="Your name" value="{{ old('name') }}"
                        class="form-control @error('name') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">

                    @error('name')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- input field for username -->
                <div class="input-group mb-3">
                    <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}"
                        class="form-control @error('username') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">

                    @error('username')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- input field for email -->
                <div class="input-group mb-3">
                    <input type="text" name="email" id="email" placeholder="Your email" value="{{ old('email') }}"
                        class="form-control @error('email') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">

                    @error('email')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- input field for password -->
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" placeholder="Choose password" value=""
                        class="form-control @error('password') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">

                    @error('password')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- input field for repeating and validating password -->
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" id="password" placeholder="Repeat your password"
                        value="" class="form-control @error('password_conrifmation') border-danger @enderror"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

                    @error('password_confirmation')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- submit button -->
                <button type="submit" class="btn btn-primary w-50">Register</button>
            </form>
        </div>
    </div>
@endsection
