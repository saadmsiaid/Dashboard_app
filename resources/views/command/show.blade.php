@extends('layouts._layout')

@section('content')
<h1>Command Details</h1>

<p>Client: {{ $ligneCommandes[0]->command->client->name }}</p>

<h2>Line Items</h2>
<ul>
    @foreach ($ligneCommandes as $ligneCommande)
        <li>
            {{ $ligneCommande->product->desg }} - Quantity: {{ $ligneCommande->quantity }}
        </li>
    @endforeach
</ul>

@endsection
