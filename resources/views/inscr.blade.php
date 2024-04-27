@extends('layouts._layout')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ route('auth.inscrire') }}" class="col-md-6 mx-auto">
            @csrf
            @if (session()->has('status'))
                <div class="alert alert-danger">{{ session("status") }}</div>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" />
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" />
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
                <button type="submit" class="btn btn-success">S'inscrire</button>
            </div>
        </form>
    </div>
@endsection
