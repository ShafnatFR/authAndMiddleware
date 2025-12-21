@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Product</div>
            <div class="card-body">
                <form action="{{ url('/admin/products/' . $product->id) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    
                    {{-- Dynamically change action based on who is logged in --}}
                    @if(Auth::guard('seller')->check())
                        <script>document.getElementById('editForm').action = "{{ url('/seller/products/' . $product->id) }}";</script>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
