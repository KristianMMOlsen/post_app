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
                    <h2 class="text-center">Login</h2>
                </div>
            </div>
            @if (session('status'))
                <div class="error text-center mb-2">
                    {{ session('status') }}
                </div>
            @endif
            <!-- form for login -->
            <form action="{{ route('login') }}" method="post" class="p-4 text-center w-75 mx-auto">
                <!-- cross site request forgery token for the form -->
                @csrf
                <!-- input field for email -->
                <div class="input-group mb-3 ">
                    <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                        class="form-control @error('email') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">

                    @error('email')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- input field for password -->
                <div class="input-group mb-3 ">
                    <input type="password" name="password" id="password" placeholder="Password" value=""
                        class="form-control @error('password') border-danger @enderror" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                    <!-- error if user don't write their password -->
                    @error('password')
                        <div class="error mt-2 col-12">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- checkbox for remember me -->
                <div class="mb-2">
                    <input type="checkbox" name="remember" class="mr-2" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <!-- submit button -->
                <button type="submit" class="btn btn-primary w-50">Login</button>
            </form>
        </div>
    </div>
@endsection
