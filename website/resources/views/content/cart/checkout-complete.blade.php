@extends('content.layouts.app')

@section('title', 'Hoàn thành thanh toán')

@section('style')
    <style>
        .checkout-complete-section {
            background-color: #f8f8f8;
            padding: 40px 0;
        }

        .checkout-complete-card {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .checkout-complete-card h3 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        .checkout-complete-card p {
            font-size: 1.2em;
            margin-bottom: 10px;
            color: #555;
        }

        .checkout-complete-card .order-number {
            font-size: 1.4em;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .checkout-complete-card .order-details {
            margin: 20px 0;
        }

        .checkout-complete-card .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 15px 30px;
            background-color: #b4975a;
            color: #ffffff;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .checkout-complete-card .cta-button:hover {
            background-color: #907948;
        }

        .checkout-complete-icon {
            width: 100px;
            height: 100px;
            margin: 20px auto;
            fill: #4CAF50;
        }
    </style>
@endsection

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-flex uk-flex-wrap uk-flex-middle">
                <nav class="uk-breadcrumb uk-width-1-1 uk-flex-center uk-text-center uk-margin-remove">
                    <ul class="uk-breadcrumb">
                        <li>
                            <a href="{{ route('cart.index') }}" class="uk-text-large">
                                <span class="breadcrumb-step uk-visible@m">1</span> Giỏ hàng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cart.info') }}" class="uk-text-large">
                                <span class="breadcrumb-step uk-visible@m">2</span> Thông tin người dùng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cart.checkout') }}" class="uk-text-large ">
                                <span class="breadcrumb-step uk-visible@m">3</span> Đặt hàng
                            </a>
                        </li>
                        <li class="uk-disabled">
                            <a href="#" class="uk-text-large  uk-active">
                                <span class="breadcrumb-step uk-visible@m">4</span> Hoàn thành
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="checkout-complete-section">
        <div class="uk-container">
            <div class="checkout-complete-card uk-width-1-2@m uk-margin-auto">
                <div class="uk-flex uk-flex-center">
                    <svg class="checkout-complete-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                    </svg>
                </div>
                <h3>Đặt hàng thành công!</h3>
                <p>Cảm ơn bạn đã đặt hàng tại Wine Cellar. Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>
                <p class="order-number">Mã đơn hàng của bạn là: <strong>#{{ $payment->id }}</strong></p>
                <div class="order-details">
                    <p>Chúng tôi sẽ liên hệ với bạn sớm nhất để xác nhận đơn hàng và thời gian giao hàng.</p>
                    <p>Xin vui lòng kiểm tra email của bạn để có thêm thông tin chi tiết về đơn hàng.</p>
                </div>
                <a href="/home" class="cta-button">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
@endsection
