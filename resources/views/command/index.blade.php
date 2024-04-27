@extends('layouts._layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List of Commands</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commands as $command)
                            <tr>
                                <td>{{ $command->id }}</td>
                                <td>{{ $command->client->name }}</td>
                                <td>{{ $command->total_amount }}</td>
                                <td>{{ $command->status }}</td>
                                <td>
                                    <a href="{{ route('commands.edit', $command->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('commands.show', $command->id) }}" class="btn btn-info btn-sm">details</a>
                                  
                                    {{-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailsModal{{ $command->id }}">Details</button> --}}
                                    <form action="{{ route('commands.destroy', $command->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Details Modal -->
                            <div class="modal fade" id="detailsModal{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailsModalLabel">Command Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Client Name:</strong> {{ $command->client->name }}</p>
                                            <p><strong>Client Avatar:</strong> <img src="{{ $command->client->avatar }}" alt="Client Avatar" style="max-width: 100px;"></p>
                                            <p><strong>Total Amount:</strong> {{ $command->total_amount }}</p>
                                            <p><strong>Status:</strong> {{ $command->status }}</p>
                                            <!-- Add additional details here if needed -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
