@extends('admin.layouts.app')
@section('title', 'Add Category')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                    href="{{ route('admin.category.index', $model_type) }}">Categories {{ $model_type }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add New Category
        </h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <form action="{{ route('admin.category.store', $model_type) }}" method="POST">
                @csrf
                <div class="box p-5">
                    <div>
                        <label class="form-label">Parent Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="0">None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Icon Path</label>
                        <input type="text" name="icon_path" class="form-control" placeholder="Icon Path">
                    </div>
                    <div class="mt-5 text-right">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
