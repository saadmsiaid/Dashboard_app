@extends('layouts._layout')

@section('content')


    <h1>Edit Command</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('command.update', $command->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_id">Client:</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $command->client_id ? 'selected' : '' }}>
                        {{ $client->name }} (ID: {{ $client->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $command->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $command->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $command->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $command->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <h2>Products</h2>
        <table class="table" id="products-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price per Unit</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($command->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td> 
                        <td>
                            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
                            <input type="number" name="products[{{ $loop->index }}][quantity]" class="form-control" value="{{ $product->pivot->quantity }}">
                        </td>
                        <td>
                            <input type="number" name="products[{{ $loop->index }}][price_per_unit]" class="form-control" step="0.01" value="{{ $product->pivot->price_per_unit }}">
                        </td>
                        <td>
                            {{ $product->pivot->total_price }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Update Command</button>
    </form>
@endsection