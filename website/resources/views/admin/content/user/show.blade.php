<!-- resources/views/admin/content/order/show.blade.php -->

@extends('layouts.adminPartialLayout')

@section('title', 'User Detail')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Details</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            User Details
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <!-- Additional actions or buttons for user details page can be added here -->
        </div>
    </div>

    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 ">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">User Info</div>
                    <a href="#" class="flex items-center ml-auto text-primary"> <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Edit </a>
                </div>
                <div class="flex items-center"> <i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Unique ID: <a href="#" class="underline decoration-dotted ml-1">{{ $user->id }}</a> </div>
                <div class="flex items-center mt-3"> <i data-lucide="user" class="w-4 h-4 text-slate-500 mr-2"></i> Name: <a href="#" class="underline decoration-dotted ml-1">{{ $user->name }}</a> </div>
                <div class="flex items-center mt-3"> <i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Email: <a href="#" class="underline decoration-dotted ml-1">{{ $user->email }}</a> </div>
                <div class="flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 text-slate-500 mr-2"></i> Phone Number: {{ $user->phone_number }}</div>
                <div class="flex items-center mt-3"> <i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i> Address: {{ $user->address }}</div>
                <div class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                    <button type="button" class="btn btn-outline-secondary w-full py-1 px-2">Message User</button>
                </div>
            </div>

        </div>
        <div class="col-span-12 lg:col-span-7 2xl:col-span-8 w-full">
            {{-- Hiển thị danh sách đơn hàng của người dùng --}}
            @foreach ($user->orders as $order)
                <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-5">
                        <div class="px-6 py-4 bg-primary text-white">
                            <div class="flex justify-between items-center">
                                <h2 class="text-lg font-semibold">Đơn hàng #{{ $order->id }}</h2>
                                <span class="text-sm">Ngày đặt hàng: {{ $order->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            {{-- Vòng lặp qua các sản phẩm trong đơn hàng --}}
                            @foreach ($order->items as $item)
                                <div class="flex items-center border-b border-gray-200 py-3">
                                    <div class="flex-shrink-0">
                                        <img src="@isset($item->images[1]->path){{ $item->images[1]->path }}@endisset" class="w-16 h-16 rounded-md">
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->category }}</p>
                                        <div class="flex items-center mt-2">
                                            <i data-lucide="link" class="w-4 h-4 mr-1"></i> <span class="text-gray-600">Price: ${{ $item->price }}</span>
                                        </div>
                                        <div class="flex items-center mt-1">
                                            <i data-lucide="layers" class="w-4 h-4 mr-1"></i> <span class="text-gray-600">Remaining Stock: {{ $item->stock }}</span>
                                        </div>
                                        <div class="flex items-center mt-1">
                                            <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> <span class="text-gray-600">Status: {{ $item->status }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="px-6 py-4 bg-gray-100 text-right">
                            <a href="#" class="text-primary hover:underline">Xem chi tiết đơn hàng</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <!-- END: Transaction Details -->
@endsection
