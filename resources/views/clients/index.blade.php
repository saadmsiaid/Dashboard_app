@extends('layouts._layout')

@section('content')
<div class="container">
    <div class="row">
        @foreach($dbCl as $cl)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $cl->avatar }}" class="card-img-top" alt="Avatar">
                <div class="card-body">
                    <h5 class="card-title">{{ $cl->name }}</h5>
                    <p class="card-text">{{ $cl->email }}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $cl->id }}">
                        View Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $cl->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">cl Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> {{ $cl->name }}</p>
                        <p><strong>Email:</strong> {{ $cl->email }}</p>
                        <p><strong>Address:</strong> {{ $cl->address }}</p>
                        <p><strong>Phone:</strong> {{ $cl->phone }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
