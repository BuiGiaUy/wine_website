@extends('layouts.adminPartialLayout')
@section('title', 'Add Post')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Post</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-semibold mb-6">Add New Post</h2>
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- Title -->
                        <div class="">
                            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                            <input type="text" name="title" id="title" class="form-input w-full" placeholder="Enter title...">
                            @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Content -->
                        <div class="">
                            <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                            <textarea name="content" id="content" class="form-textarea w-full" rows="8" placeholder="Enter content..."></textarea>
                            @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Description -->
                        <div class="">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea name="description" id="description" class="form-textarea w-full" rows="4" placeholder="Enter description..."></textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="intro-y col-span-12 lg:col-span-6">
                        <!-- SEO Title -->
                        <div>
                            <label for="seo_title" class="block text-gray-700 font-medium mb-2">SEO Title</label>
                            <input type="text" name="seo_title" id="seo_title" class="form-input w-full" placeholder="Enter SEO title...">
                            @error('seo_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- SEO Keywords -->
                        <div>
                            <label for="seo_keywords" class="block text-gray-700 font-medium mb-2">SEO Keywords</label>
                            <textarea type="text" name="seo_keywords" id="seo_keywords" class="form-input w-full" placeholder="Enter SEO keywords...">
                            </textarea>
                            @error('seo_keywords')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- SEO Description -->
                        <div class="">
                            <label for="seo_description" class="block text-gray-700 font-medium mb-2">SEO Description</label>
                            <textarea name="seo_description" id="seo_description" class="form-textarea w-full" rows="4" placeholder="Enter SEO description..."></textarea>
                            @error('seo_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Categories -->
                    <div>
                        <label for="category" class="block text-gray-700 font-medium mb-2">Categories</label>
                        <select name="category" id="category" class="form-select w-full">
                            <option value="0">None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-input w-full" placeholder="Enter slug...">
                        @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Upload Image -->
                    <div class="col-span-2">
                        <label for="image" class="block text-gray-700 font-medium mb-2">Upload Image</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4" id="add-images">

                                <div class=" w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in" id="button-image">
                                    <img class="text-white rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('images/cong2.jpg') }}">
                                </div>

                            </div>
                        </div>
                        @error('image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="mt-5 text-right">
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </div>
            </form>
        </div>
    </div>
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
                        <img class="rounded-md" alt="Midone - HTML Admin Template" src="${newUrl}">
                        <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2 close-button">
                            x
                        </div>
                   </div>
                        `;
            // Get the element with the ID 'add-images'
            let addImagesElement = document.getElementById('add-images');

            // Insert the new HTML at the beginning of the element
            addImagesElement.insertAdjacentHTML('afterbegin', newHtml);
        }
    </script>
@endsection
