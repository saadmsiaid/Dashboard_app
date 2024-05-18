@extends('layouts._layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <div class="card shadow"> 
                    <div class="card-body py-5"> 
                        <div class="row">
                            <div class="col-md-5">
                                <img class="w-100 img-fluid" src="{{ asset('navimg/signup.png') }}" alt="Image">
                            </div>
                            <div class="col-md-7">
                                <form method="POST" action="{{ route('auth.inscrire') }}">
                                    @csrf
                                    @if (session()->has('status'))
                                        <div class="alert alert-danger">{{ session("status") }}</div>
                                    @endif

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" class="form-control" type="text" name="name" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" class="form-control" type="email" name="email"  />
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" class="form-control" type="password" name="password" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="passwordC" class="form-label">Confirm Password</label>
                                        <input id="passwordC" class="form-control" type="password" name="passwordC" />
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-lg  btn-outline-primary">S'inscrire</button>
                                    </div>
                                </form>
                                <div class="text-center mt-3">
                                    <span class="text-muted">Already have an account?</span>
                                    <a href="{{ route('auth.login') }}" class="btn btn-lg btn-outline-success ml-2">Log In</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
