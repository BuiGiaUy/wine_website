@extends('admin.layouts.app')
@section('title', 'profile')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}"> Profile </a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="intro-y box mt-5">
        <div class="p-5">
            <h2 class="text-lg font-medium">Profile Settings</h2>
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                <!-- Example fields for profile settings -->
                <div class="mt-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}">
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password">
                </div>
                <div class="mt-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
