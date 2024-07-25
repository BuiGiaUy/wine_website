@extends('content.layouts.app')
@section('title', 'cart')
@section('style')
    <style>
        .uk-active {
            color: #0A0A0A !important;
        }

        .breadcrumb-step {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            color: #ffffff; /* Màu mặc định khi không active */
            background-color: #cccccc; /* Màu nền mặc định khi không active */
            font-weight: bold;
            transition: all 0.3s ease; /* Hiệu ứng chuyển đổi màu */
        }

        .uk-active .breadcrumb-step {
            color: #fff; /* Màu chữ khi active */
            background-color: #b4975a; /* Màu nền khi active */
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }


        .uk-button.button-continue-shopping {
            background-color: #ffffff; /* White background */
            color: #990d23; /* Red text */
            border: 2px solid #990d23; /* Red border */
            padding: 5px 20px; /* Adjust padding as needed */
            text-decoration: none; /* Remove underline */
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
        }

        .uk-button.button-continue-shopping:hover {
            background-color: #990d23; /* Red background on hover */
            color: #ffffff; /* White text on hover */
        }

        .checkout-button {
            transition: background-color 0.3s, color 0.3s;
            background: #b4975a;
            border-radius: 5px;
            font-weight: 700;
            color: #ffffff; /* White text on hover */

        }

        .checkout-button:hover {
            color: #ffffff; /* White text on hover */
            background-color: #907948; /* Màu đỏ khi hover */
        }

        .expand {
            background-color: #ccc; /* Màu nền xám */
            color: #000; /* Màu chữ đen */
            border: none; /* Loại bỏ viền */
            padding: 10px 20px; /* Độ rộng và chiều cao của nút */
            cursor: pointer; /* Chỉ số con trỏ khi di chuột vào nút */
            transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
            border-radius: 5px;
        }

        .expand:hover {
            background-color: #666; /* Màu nền xám đậm khi di chuột vào */
        }
    </style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-flex uk-flex-wrap uk-flex-middle">
                    <nav class="uk-breadcrumb uk-width-1-1 uk-flex-center uk-text-center uk-margin-remove">
                        <ul class="uk-breadcrumb">
                            <li>
                                <a href="{{ route('cart.index') }}" class="uk-text-large uk-active">
                                    <span class="breadcrumb-step uk-visible@m">1</span> Giỏ hàng
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart.checkout') }}" class="uk-text-large">
                                    <span class="breadcrumb-step uk-visible@m">2</span> Đặt hàng
                                </a>
                            </li>
                            <li class="uk-disabled">
                                <a href="#" class="uk-text-large">
                                    <span class="breadcrumb-step uk-visible@m">3</span> Hoàn thành
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="uk-section uk-padding-remove-top">
            <div class="uk-container uk-padding-remove">
                @if(empty($cartItems) || count($cartItems) === 0)
                    <div class="uk-text-center">
                        <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
                        <a href="{{ route('products.index') }}" class="uk-button button-continue-shopping">
                            <span uk-icon="icon: arrow-left"></span> QUAY TRỞ LẠI CỬA HÀNG
                        </a>
                    </div>
                @else
                    <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-5@l">
                        <div class="uk-width-3-5@l">
                            <table class="uk-table uk-table-divider uk-table-justify uk-table-responsive">
                                <thead>
                                <tr>
                                    <th colspan="3">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tạm tính</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="uk-text-center">
                                            <a href="{{ route('cart.remove', $item['id']) }}" uk-icon="icon: close"></a>
                                        </td>
                                        <td class="uk-text-center">
                                            <a href="{{ $item['attributes']['url'] }}">
                                                <img src="{{ $item['attributes']['image'] }}" width="50" alt="{{ $item['name'] }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ $item['attributes']['url'] }}">{{ $item['name'] }}</a>
                                        </td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }} ₫</td>
                                        <td>
                                            <div class="uk-margin uk-flex" style="width: 70px;">
                                                <div class="uk-width-auto">
                                                    <button type="button" class="ux-quantity__button ux-quantity__button--minus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;" onclick="decrementQuantity({{ $item['id'] }})">-</button>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <input type="number" name="quantity" id="quantity-{{ $item['id'] }}" value="{{ $item['quantity'] }}" aria-label="Product quantity" min="0" step="1" class="uk-input" style="text-align: center;">
                                                </div>
                                                <div class="uk-width-auto">
                                                    <button type="button" class="ux-quantity__button ux-quantity__button--plus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;" onclick="incrementQuantity({{ $item['id'] }})">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td id="total">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}  ₫</td>

                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <a href="{{ route('products.index') }}" class="uk-button button-continue-shopping">
                                                <span uk-icon="icon: arrow-left"></span> Tiếp tục xem sản phẩm
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="uk-width-2-5@l">
                            <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
                                <h2>Cộng giỏ hàng</h2>
                                <table class="uk-table uk-table-divider">
                                    <tbody>
                                    <tr>
                                        <th>Tạm tính</th>
                                        <td class="uk-text-right" id="subtotal">{{ number_format($subtotal, 0, ',', '.') }} ₫</td>
                                    </tr>
                                    <tr>
                                        <th>Tổng</th>
                                        <td class="uk-text-right" id="total"><strong >{{ number_format($total, 0, ',', '.') }} ₫</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="uk-margin">
                                    <a href="{{ route('cart.checkout') }}" class="uk-width-1-1 uk-button checkout-button">Tiến hành thanh toán</a>
                                </div>
                                <form class="uk-form-stacked uk-margin" action="" method="post">
                                    @csrf
                                    <div class="uk-margin">
                                        <h3 class="widget-title uk-margin-small-bottom"><i class="fa-solid fa-tag"></i> Phiếu ưu đãi</h3>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="coupon_code" type="text" name="coupon_code" placeholder="Mã ưu đãi">
                                        </div>
                                    </div>
                                    <button type="submit" class="uk-button uk-border-rounded uk-width-1-1" name="apply_coupon" value="Áp dụng">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>



    {{--    <script>--}}
{{--        document.addEventListener('DOMContentLoaded', function () {--}}
{{--            const inputQuantity = document.getElementById('quantity');--}}
{{--            const btnPlus = document.querySelector('.ux-quantity__button--plus');--}}
{{--            const btnMinus = document.querySelector('.ux-quantity__button--minus');--}}

{{--            btnPlus.addEventListener('click', function () {--}}
{{--                let currentValue = parseInt(inputQuantity.value);--}}
{{--                inputQuantity.value = currentValue + 1;--}}
{{--            });--}}

{{--            btnMinus.addEventListener('click', function () {--}}
{{--                let currentValue = parseInt(inputQuantity.value);--}}
{{--                if (currentValue > 0) {--}}
{{--                    inputQuantity.value = currentValue - 1;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endsection
