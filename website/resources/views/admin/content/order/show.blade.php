<!-- resources/views/includes/content/order/show.blade.php -->

@extends('admin.layouts.app')

@section('title', 'Order Details')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('includes.orders.index') }}"> Orders </a></li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Transaction Details
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Print</button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Export
                                Word </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Export PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-11 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 ">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Transaction Details</div>
                    <a href="#" class="flex items-center ml-auto text-primary">
                        <i data-lucide="edit" class="w-4 h-4 mr-2"></i> Change Status
                    </a>
                </div>
                <p class="flex items-center"><i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Invoice:
                    <a href="#" class="underline decoration-dotted ml-1">INV/{{ date('Ymd') }}/ORD/{{ $order->id }}</a>
                </p>
                <p class="flex items-center"><i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Purchase
                    Date:
                    {{ $order->created_at->format('d F Y') }}
                </p>
                <p class="flex items-center"><i data-lucide="clock" class="w-4 h-4 text-slate-500 mr-2"></i> Transaction
                    Status:
                    <span class="bg-success/20 text-success rounded px-2 ml-1">Completed</span>
                </p>
            </div>

            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Buyer Details</div>
                    <a href="#" class="flex items-center ml-auto text-primary">
                        <i data-lucide="edit" class="w-4 h-4 mr-2"></i> View Details
                    </a>
                </div>
                <p class="flex items-center"><i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Name:
                    <a href="#" class="underline decoration-dotted ml-1">{{ $order->user->name }}</a>
                </p>
                <p class="flex items-center"><i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Phone
                    Number:
                    {{ $order->user->phone_number }}
                </p>
                <p class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i> Address:
                    {{ $order->user->address }}
                </p>
            </div>

            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Payment Details</div>
                </div>
                <p class="flex items-center"><i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i> Payment
                    Method:
                    {{ $order->payment_method->name }}
                </p>
                <p class="flex items-center"><i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total
                    Price ({{ $order->items_count }} items):
                    {{ '$' . number_format($order->total_amount, 2) }}
                </p>
                <p class="flex items-center"><i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Total
                    Shipping Cost ({{ $order->shipping_weight }} gr):
                    {{ '$' . number_format($order->shipping_cost, 2) }}
                </p>
                <p class="flex items-center"><i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Shipping Insurance:
                    {{ '$' . number_format($order->insurance_cost, 2) }}
                </p>
                <div
                    class="flex items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5 font-medium">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-500 mr-2"></i> Grand Total:
                    {{ '$' . number_format($order->grand_total, 2) }}
                </div>
            </div>

            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Shipping Information</div>
                    <a href="#" class="flex items-center ml-auto text-primary">
                        <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i> Tracking Info
                    </a>
                </div>
                <p class="flex items-center"><i data-lucide="clipboard" class="w-4 h-4 text-slate-500 mr-2"></i>
                    Courier:
                    {{ $order->courier }}
                </p>
                <p class="flex items-center"><i data-lucide="calendar" class="w-4 h-4 text-slate-500 mr-2"></i> Tracking
                    Number:
                    {{ $order->tracking_number }}
                    <i data-lucide="copy" class="w-4 h-4 text-slate-500 ml-2"></i>
                </p>
                <p class="flex items-center"><i data-lucide="map-pin" class="w-4 h-4 text-slate-500 mr-2"></i> Address:
                    {{ $order->shipping_address }}
                </p>
            </div>
        </div>

        <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Order Details</div>
                    <a href="#" class="flex items-center ml-auto text-primary">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Notes
                    </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="whitespace-nowrap !py-5">Product</th>
                            <th class="whitespace-nowrap text-right">Unit Price</th>
                            <th class="whitespace-nowrap text-right">Qty</th>
                            <th class="whitespace-nowrap text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="!py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img src="{{ asset('dist/images/'.$item->product->image) }}"
                                                 alt="{{ $item->product->name }}"
                                                 class="rounded-lg border-2 border-white shadow-md tooltip"
                                                 title="Uploaded at {{ $item->created_at->format('Y-m-d H:i:s') }}">
                                        </div>
                                        <a href="#"
                                           class="font-medium whitespace-nowrap ml-4">{{ $item->product->name }}</a>
                                    </div>
                                </td>
                                <td class="text-right">${{ number_format($item->price, 2) }}</td>
                                <td class="text-right">{{ $item->quantity }}</td>
                                <td class="text-right">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
@endsection
