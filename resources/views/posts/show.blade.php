@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 bg-white rounded-3 p-3">
                <x-post :post="$post" />
            </div>
        </div>
    </div>
@endsection
