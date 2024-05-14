@extends('layouts._layout')

@section('content')
    <div class="container">
        <h1 class="mt-5">Command Details</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Command Information</h5>
                <p class="card-text">Client: {{ $command->client->name }}</p>
                <p class="card-text">Total Amount: ${{ number_format($command->total_amount, 2) }}</p>
                <p class="card-text">Status: {{ $command->status }}</p>
            </div>
        </div>

        <h2 class="mt-5">Products</h2>

        <div class="row mt-4">
            @foreach ($command->products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="{{ $product->desg }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->desg }}</h5>
                            <p class="card-text">Quantity: {{ $product->pivot->quantity }}</p>
                            <p class="card-text">Price: ${{ number_format($product->pivot->price_per_unit, 2) }}</p>
                            <p class="card-text">Total: ${{ number_format($product->pivot->total_price, 2) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection