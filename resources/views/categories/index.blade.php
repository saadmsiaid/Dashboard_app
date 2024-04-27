@extends('layouts._layout')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/'.$category->photo) }}" class="card-img-top" alt="{{ $category->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">{{ $category->desc }}</p>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">View Products</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection