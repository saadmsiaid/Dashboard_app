@extends('layouts._layout')

@section('content')


<div class="container card">

       
            
                <h1 class=" py-2  mx-auto ">Products</h1>
           
                    <a href="{{ route('ajoute') }}" class="btn btn-primary">AJOUTER UN PRODUIT</a>
                  





    <div class="product-grid-row d-flex card-body ">
        @foreach ($data as $item)
            <div class="col-lg-4 mx-3 wow fadeInUp">
                <div class="card h-100 shadow rounded">
                    <div class="position-relative">
                        <img class="img-fluid rounded-top" src="{{ url('storage/' . $item->photo) }}" alt="{{ $item->desg }}" style="object-fit: cover; width: 100%;">
                        <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $item->pu }} DH</small>
                    </div>

                    <div class="card-body p-4">
                        <h5 class="mb-0">{{ $item->desg }}</h5> 
                        <p class="text-body mb-3">Quantity: {{ $item->qtes }}</p>

                        <div class="d-flex justify-content-between">
                
                            
                            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" data-toggle="modal" data-target="#cardModal{{$item->id}}">
                                <i class="fas fa-eye"></i> View Detail
                            </button>
                            
                            <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{ route('index.update', $item->id) }}">
                                <i class="fas fa-edit"></i> Update
                            </a>

                            <form action="{{ route('index.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cardModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="cardModalLabel{{$item->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cardModalLabel{{$item->id}}">Card Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img class="img-fluid rounded-top" src="{{ url('storage/' . $item->photo) }}" alt="{{ $item->desg }}" style="object-fit: cover; width: 100%;">
                            <h5>{{ $item->desg }}</h5> 
                            <p>Quantity: {{ $item->qtes }}</p>
                        </div>
                        <div class="modal-footer mx-auto ">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Go Back</a>


   
</div>
@endsection
