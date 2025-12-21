@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Seller Dashboard</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
</div>

<div class="card">
    <div class="card-header">My Products</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit.seller', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
