@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 bg-white rounded-3 p-3">
                @if (session('status'))
                    <div class="error text-center mb-2">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- form for registering a new user -->
                <form action="{{ route('login') }}" method="post">
                    <!-- cross site request forgery token for the form -->
                    @csrf
                    <!-- input field for email -->
                    <div class="input-group mb-3">
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
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" placeholder="Password" value=""
                            class="form-control @error('password') border-danger @enderror"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

                        @error('password')
                            <div class="error mt-2 col-12">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 justify-content-center">
                        <input type="checkbox" name="remember" class="mr-2" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <!-- submit button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<style>
    .error {
        color: red;
    }

    .container {
        height: 100%;
    }

</style>
