@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 bg-white rounded-3 p-3">
                <!-- form for registering a new user -->
                <form action="{{ route('register') }}" method="post">
                    <!-- cross site request forgery token for the form -->
                    @csrf
                    <h2 class="text-center">Register new user</h2>
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
                        <input type="text" name="username" id="username" placeholder="Username"
                            value="{{ old('username') }}" class="form-control @error('username') border-danger @enderror"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

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
                            class="form-control @error('password') border-danger @enderror"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

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
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .error {
        color: red;
    }

</style>
