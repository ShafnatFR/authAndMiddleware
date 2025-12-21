@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Buyer Dashboard</h1>
    <div>
        <button class="btn btn-outline-success">
            Cart (@if(session('cart')) {{ array_sum(array_column(session('cart'), 'quantity')) }} @else 0 @endif)
        </button>
    </div>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="card-text">{{ $product->description }}</p>
            </div>
            <div class="card-footer bg-white border-top-0">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
