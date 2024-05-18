@extends('layouts._layout')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card h-100"> <!-- Added h-100 class -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="w-100 img-fluid" src="{{ asset('navimg/log.png') }}" alt="loginImage">
                        </div>
                        <div class="col-md-6">
                            <h2 class="card-title text-center mb-4">Login</h2>
                            <form method="POST" action="{{ route('auth.PLogin') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                @if (session()->has('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block mt-4">Login</button>
                            </form>
                            <div class="text-center mt-3">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="{{ route('auth.insc') }}" class="btn btn-lg btn-outline-primary ml-2">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
