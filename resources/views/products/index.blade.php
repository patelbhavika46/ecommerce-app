@extends('adminlte::page')

@section('title', 'Product Management')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Product List</h2>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#createProductModal">
            Add Product
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th width="180px">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 50) }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="80" alt="{{ $product->name }}">
                    @else
                        <small>No image</small>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No products found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="2" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock_quantity" class="form-control" step="1" required>
                </div>
                
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection