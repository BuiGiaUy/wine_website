@extends('layouts.adminPartialLayout')
@section('title', 'Edit Product')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Product
        </h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="box p-5">
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ $product->name }}" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Barcode</label>
                        <input type="text" name="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}" required min="0">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" required step="0.01" min="0">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Discount Percent</label>
                        <input type="number" name="discount_percent" class="form-control" placeholder="Discount Percent" value="{{ $product->discount_percent }}" required step="0.01" min="0" max="100">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Brand</label>
                        <select name="brand_id" class="form-control" required>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Post</label>
                        <select name="post_id" class="form-control" required>
{{--                            @foreach($posts as $post)--}}
{{--                                <option value="{{ $post->id }}" {{ $product->post_id == $post->id ? 'selected' : '' }}>--}}
{{--                                    {{ $post->title }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="mt-5 text-right">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
