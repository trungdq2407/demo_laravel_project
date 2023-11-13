@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="form-container w-50">
            @if(isset($product))
                <h2 class="text-center">Edit Product</h2>
                <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @method('PUT')
            @else
                <h2 class="text-center">Create Product</h2>
                <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
            @endif
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}">
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                </div>
                @if (isset($product) && $product->thumbnail)
                    <img src="{{asset('assets/'.$product->thumbnail )}}" alt="Thumbnail" width="100">
                @endif

                <button type="submit" class="btn btn-primary m-3">{{ isset($product) ? 'Update' : 'Create' }}</button>
            </form>
        </div>
    </div>
@endsection
