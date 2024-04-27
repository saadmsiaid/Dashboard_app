@extends('layouts._layout')

@section('content')




<div class="container">
    <h2>Login</h2>
    <form method="POST" action="{{ route('auth.PLogin') }}">
      @csrf
  
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
      </div>
  
      @if (session()->has('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
      @endif
  
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
  
      <button type="submit" class="btn my-2  btn-success">Login</button>
  
      <div class="mt-4">
        <a href="{{ route('auth.insc') }}" class="btn btn-primary">Sign Up</a>
      </div>
    </form>
  </div>

@endsection