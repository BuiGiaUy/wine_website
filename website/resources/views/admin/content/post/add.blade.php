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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="col-span-2">
                        <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                        <input type="text" name="title" id="title" class="form-input w-full" placeholder="Enter title...">
                    </div>
                    <!-- Categories -->
                    <div>
                        <label for="category" class="block text-gray-700 font-medium mb-2">Categories</label>
                        <select name="category" id="category" class="form-select w-full">
                            <option value="0">None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-input w-full" placeholder="Enter slug...">
                    </div>
                    <!-- Upload Image -->
                    <div class="col-span-2">
                        <label for="image" class="block text-gray-700 font-medium mb-2">Upload Image</label>
                        <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4">
                                <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                    <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('backend/dist/images/preview-9.jpg') }}">
                                    <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop
                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="image">
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="col-span-2">
                        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea name="description" id="description" class="form-textarea w-full" rows="4" placeholder="Enter description..."></textarea>
                    </div>
                    <!-- Content -->
                    <div class="col-span-2">
                        <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                        <textarea name="content" id="content" class="form-textarea w-full" rows="8" placeholder="Enter content..."></textarea>
                    </div>
                    <!-- SEO Title -->
                    <div>
                        <label for="seo_title" class="block text-gray-700 font-medium mb-2">SEO Title</label>
                        <input type="text" name="seo_title" id="seo_title" class="form-input w-full" placeholder="Enter SEO title...">
                    </div>
                    <!-- SEO Keywords -->
                    <div>
                        <label for="seo_keywords" class="block text-gray-700 font-medium mb-2">SEO Keywords</label>
                        <input type="text" name="seo_keywords" id="seo_keywords" class="form-input w-full" placeholder="Enter SEO keywords...">
                    </div>
                    <!-- SEO Description -->
                    <div class="col-span-2">
                        <label for="seo_description" class="block text-gray-700 font-medium mb-2">SEO Description</label>
                        <textarea name="seo_description" id="seo_description" class="form-textarea w-full" rows="4" placeholder="Enter SEO description..."></textarea>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="mt-5 text-right">
                    <button type="submit" class="btn btn-primary">Save post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
