<!-- resources/views/cart/summary.blade.php -->

@extends('layouts.front')

@section('content')
    <div class="uk-container uk-margin-top">
        <h1 class="uk-heading-line"><span>Your Cart Summary</span></h1>
        <table class="uk-table uk-table-divider">
            <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} ₫</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }} ₫</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="uk-margin">
            <h3>Total: {{ number_format($totalAmount, 2) }} ₫</h3>
        </div>

        <a href="{{ route('checkout') }}" class="uk-button uk-button-primary">Proceed to Checkout</a>
    </div>
@endsection
