@extends('content.layouts.app')
@section('title', 'Orders')

@section('content')
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            <h2 class="uk-heading-line uk-text-center"><span>Danh sách đơn hàng</span></h2>
            <table class="uk-table uk-table-divider">
                <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        <td>{{ number_format($order->total, 0, ',', '.') }} ₫</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="uk-button uk-button-default">Xem chi tiết</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links('pagination::uikit') }}
        </div>
    </div>
@endsection
