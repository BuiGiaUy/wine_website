@extends('content.layouts.app')
@section('title', 'Chi tiết đơn hàng #' . $order->id)

@section('style')
    <style>
        .user-account-sidebar {
            background: #f9f5f0;
            border-radius: 10px;
            padding: 20px;
        }

        .user-account-sidebar .uk-nav li a {
            color: #333;
            padding: 12px 15px;
            display: block;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .user-account-sidebar .uk-nav li a:hover,
        .user-account-sidebar .uk-nav li.uk-active a {
            background: #990d23;
            color: #fff;
        }

        .user-account-sidebar .uk-nav li a span {
            margin-right: 10px;
        }

        .account-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background: #cce5ff;
            color: #004085;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }

        .order-info-card {
            background: #f9f5f0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-info-label {
            color: #666;
            font-size: 0.9em;
        }

        .order-info-value {
            font-weight: 600;
            color: #333;
        }

        .product-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .order-total {
            background: #990d23;
            color: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            text-align: right;
        }

        .back-btn {
            background: transparent;
            border: 2px solid #990d23;
            color: #990d23;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .back-btn:hover {
            background: #990d23;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            <h2 class="uk-heading-line uk-text-center uk-margin-medium-bottom">
                <span>Tài khoản của tôi</span>
            </h2>

            <div class="uk-grid-medium" uk-grid>
                {{-- Sidebar --}}
                <div class="uk-width-1-4@m">
                    <div class="user-account-sidebar">
                        <div class="uk-text-center uk-margin-bottom">
                            <span uk-icon="icon: user; ratio: 2" style="color: #990d23"></span>
                            <p class="uk-margin-small-top uk-text-bold">{{ Auth::user()->name }}</p>
                        </div>
                        <ul class="uk-nav uk-nav-default">
                            <li><a href="{{ route('user.profile') }}"><span uk-icon="user"></span> Thông tin cá nhân</a></li>
                            <li><a href="{{ route('user.address') }}"><span uk-icon="location"></span> Địa chỉ giao hàng</a></li>
                            <li class="uk-active"><a href="{{ route('orders.index') }}"><span uk-icon="bag"></span> Đơn hàng của tôi</a></li>
                            <li><a href="{{ route('wishlist.index') }}"><span uk-icon="heart"></span> Yêu thích</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="uk-width-3-4@m">
                    <div class="account-card uk-card uk-card-body">
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
                            <h3 style="color: #990d23; font-weight: 600; margin: 0;">
                                <span uk-icon="bag"></span> Đơn hàng #{{ $order->id }}
                            </h3>
                            @php
                                $statusClass = match(strtolower($order->status ?? 'pending')) {
                                    'pending' => 'status-pending',
                                    'processing' => 'status-processing',
                                    'completed', 'delivered' => 'status-completed',
                                    'cancelled' => 'status-cancelled',
                                    default => 'status-pending'
                                };
                                $statusText = match(strtolower($order->status ?? 'pending')) {
                                    'pending' => 'Chờ xử lý',
                                    'processing' => 'Đang xử lý',
                                    'completed', 'delivered' => 'Hoàn thành',
                                    'cancelled' => 'Đã hủy',
                                    default => $order->status ?? 'Chờ xử lý'
                                };
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                        </div>

                        {{-- Order Info --}}
                        <div class="order-info-card">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3@s">
                                    <p class="order-info-label uk-margin-remove">Ngày đặt hàng</p>
                                    <p class="order-info-value uk-margin-remove">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <p class="order-info-label uk-margin-remove">Mã đơn hàng</p>
                                    <p class="order-info-value uk-margin-remove">#{{ $order->id }}</p>
                                </div>
                                <div class="uk-width-1-3@s">
                                    <p class="order-info-label uk-margin-remove">Phương thức thanh toán</p>
                                    <p class="order-info-value uk-margin-remove">{{ $order->payment->method ?? 'Tiền mặt' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Products --}}
                        <h4 class="uk-margin-top">Sản phẩm đã đặt</h4>
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-divider uk-table-middle">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="uk-text-center">Số lượng</th>
                                        <th class="uk-text-right">Đơn giá</th>
                                        <th class="uk-text-right">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="uk-flex uk-flex-middle">
                                                    <div>
                                                        <p class="uk-margin-remove uk-text-bold">{{ $item->product->name ?? $item->name ?? 'Sản phẩm' }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="uk-text-center">{{ $item->quantity }}</td>
                                            <td class="uk-text-right">{{ number_format($item->price, 0, ',', '.') }}₫</td>
                                            <td class="uk-text-right uk-text-bold">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Total --}}
                        <div class="order-total uk-margin-top">
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <span>Tổng cộng:</span>
                                <span class="uk-text-large uk-text-bold">{{ number_format($order->total, 0, ',', '.') }}₫</span>
                            </div>
                        </div>

                        {{-- Back Button --}}
                        <div class="uk-margin-large-top">
                            <a href="{{ route('orders.index') }}" class="uk-button back-btn">
                                <span uk-icon="arrow-left"></span> Quay lại danh sách đơn hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
