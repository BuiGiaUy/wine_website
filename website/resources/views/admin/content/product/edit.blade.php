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
    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="intro-y col-span-12 lg:col-span-6">
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
                        <textarea name="description" class="form-control" placeholder="Description" >{{ $product->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="box p-5">
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
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{ $product->quantity }}"  min="0">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" required step="0.01" min="0">
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
                        <label class="form-label">Discount Percent</label>
                        <input type="number" name="discount_percent" class="form-control" placeholder="Discount Percent" value="{{ $product->discount_percent }}"  step="0.01" min="0" max="100">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Post</label>
                        <input type="number" name="post_id" class="form-control" placeholder="Discount Percent" value="{{ $product->post->id }}"  step="0.01" min="0" max="100">
                    </div>
                </div>
                <div class="box p-5">
                    <label class="form-label">Upload Image</label>
                    <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                        <div class="flex flex-wrap px-4" id="add-images">
                            @foreach ($product->images as $image)
                                <div class=" w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in image-container" id="button-image">
                                    <img class="text-white rounded-md" alt="{{ $image->alt }}" src="{{ asset($image->path) }}">
                                    <input type="text" value="{{ asset($image->path) }}" name="images[]" class="hidden" id="image" multiple>
                                    <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 close-button">
                                        x
                                    </div>
                                </div>
                            @endforeach
                            <div class=" w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in" id="button-image">
                                <img  class="text-white rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('images/cong2.jpg') }}">
                            </div>
                        </div>
                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                            <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop
                            <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="intro-y col-span-12 ">
                <div class="mt-5 text-right">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </div>
        </div>
    </form>
    <script>

        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
            document.getElementById('add-images').addEventListener('click', function(event) {
                if (event.target.classList.contains('close-button')) {
                    event.target.closest('.image-container').remove();
                }
            });
        });
        // set file link
        function fmSetLink($url) {
            let newUrl = $url.replace("http://localhost/", "http://winewebsite.th/");
            // cấu hình link
            // document.getElementById('image_label').value = newUrl;
            let newHtml = `<div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in image-container">
                                <img class="rounded-md" alt="" src="${newUrl}">
                                <input type="text" value="${newUrl}" name="images[]" class="hidden" id="image" multiple>
                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 close-button">
                                    x
                                </div>
                           </div>`;
            // Get the element with the ID 'add-images'
            let addImagesElement = document.getElementById('add-images');

            // Insert the new HTML at the beginning of the element
            addImagesElement.insertAdjacentHTML('afterbegin', newHtml);

        }
    </script>

@endsection
