@extends('layouts._layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Add New Category</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('cat.save') }}" enctype="multipart/form-data">
                        @csrf 

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" value="{{ old('name') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="desc" class="form-control" id="desc" placeholder="Enter category description">{{ old('desc') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
