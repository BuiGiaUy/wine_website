@extends('content.layouts.app')
@section('title', 'Đơn hàng của tôi')

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
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85em;
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

        .order-row:hover {
            background: #f9f5f0;
        }

        .view-btn {
            background: #990d23;
            color: #fff;
            border-radius: 5px;
            padding: 8px 15px;
            font-size: 0.85em;
        }

        .view-btn:hover {
            background: #7a0a1c;
            color: #fff;
        }

        .empty-orders {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-orders-icon {
            font-size: 64px;
            color: #ddd;
            margin-bottom: 20px;
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
                        <h3 style="color: #990d23; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #990d23;">
                            <span uk-icon="bag"></span> Đơn hàng của tôi
                        </h3>

                        @if($orders->count() > 0)
                            <div class="uk-overflow-auto">
                                <table class="uk-table uk-table-divider uk-table-middle">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="order-row">
                                                <td><strong>#{{ $order->id }}</strong></td>
                                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                <td class="uk-text-bold" style="color: #990d23">{{ number_format($order->total, 0, ',', '.') }}₫</td>
                                                <td>
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
                                                </td>
                                                <td>
                                                    <a href="{{ route('orders.show', $order->id) }}" class="uk-button view-btn">
                                                        Chi tiết
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="uk-flex uk-flex-center uk-margin-top">
                                {{ $orders->links('content.components.pagination') }}
                            </div>
                        @else
                            <div class="empty-orders">
                                <div class="empty-orders-icon">
                                    <span uk-icon="icon: bag; ratio: 4"></span>
                                </div>
                                <h4>Bạn chưa có đơn hàng nào</h4>
                                <p class="uk-text-muted">Hãy khám phá các sản phẩm của chúng tôi!</p>
                                <a href="{{ route('products.index') }}" class="uk-button" style="background: #990d23; color: #fff; border-radius: 5px;">
                                    Mua sắm ngay
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
