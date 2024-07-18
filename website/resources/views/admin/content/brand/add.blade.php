@extends('admin.layouts.app')

@section('title', 'Add Brand')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('includes.brand.index') }}">Brands</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Brand
        </h2>
    </div>

    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <form action="{{ route('includes.brand.store') }}" method="POST">
                @csrf

                <div class="box p-5">
                    <div class="mt-3">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>

                    <div class="mt-5 text-right">
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
