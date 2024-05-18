@extends('layouts._layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">
            <div class="card shadow-lg">
                <div class="card-header mybackground text-white">
                    <h2 class="mb-0 mycolor">Edit User</h2>
                </div>
                <div class="card-body  py-2">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group  py-2">
                            <label for="name" class="font-weight-bold  py-2">Name:</label>
                            <input type="text" name="name" class="form-control  py-2" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group  py-2">
                            <label for="password" class="font-weight-bold  py-2">New Password:</label>
                            <input type="password" name="password" class="form-control  py-2" minlength="6" placeholder="Leave blank to keep current password">
                        </div>
                        <div class=" py-4">
                        <button type="submit" class=" py-2 btn btn-success btn-block">Update</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
