@extends('layouts._layout')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">404 Not Found</h1>
            <img src="{{ asset('navimg/giphy.gif') }}" alt="Not Found" class="img-fluid mt-4">
            <p class="lead mt-4">The page you are looking for could not be found.</p>
        </div>
    </div>
@endsection
