@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-between align-items-center mb-3">
        <div class="col-md-6">
            <h2 class="float-left">Product List</h2>
        </div>
        <div class="col-md-6 text-right">
            <div class="d-flex justify-content-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary text-center">Add Product</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset('assets/' . $product->thumbnail) }}" alt="Thumbnail" class="img-fluid" style="max-width: 100px; height: auto;"></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                <form method="GET" action="{{ route('product.edit', $product->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form method="POST" action="{{ route('product.delete', $product->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
