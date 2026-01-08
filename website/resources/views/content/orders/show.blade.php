@extends('content.layouts.app')
@section('title', 'Order ' . $order->id)

@section('content')
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            <h2 class="uk-heading-line uk-text-center"><span>Chi tiết đơn hàng</span></h2>
            <div class="uk-card uk-card-default uk-card-body">
                <h3>Mã đơn hàng: {{ $order->id }}</h3>
                <p>Ngày đặt hàng: {{ $order->created_at->format('d-m-Y') }}</p>
                <p>Tổng tiền: {{ number_format($order->total, 0, ',', '.') }} ₫</p>
                <p>Trạng thái: {{ $order->status }}</p>
                <h4>Danh sách sản phẩm</h4>
                <table class="uk-table uk-table-divider uk-table-striped">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }} ₫</td>
                            <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="uk-flex uk-flex-center uk-margin">
                    <a href="{{ route('orders.index') }}" class="uk-button uk-button-default">Quay lại danh sách đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
@endsection
