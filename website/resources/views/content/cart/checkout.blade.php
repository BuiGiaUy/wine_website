@extends('content.layouts.app')
@section('title', 'checkout')
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


        /* Red border and shadow when the textarea is focused */
        .uk-textarea:focus {
            border: 1px solid red;
            box-shadow: 0 0 8px rgba(255, 0, 0, 0.5); /* Red shadow */
        }

        .card {
            border: 2px solid #990d23;
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
    </style>
@endsection

@section('content')
    <div>
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
                                <a href="{{ route('cart.checkout') }}" class="uk-text-large  uk-active">
                                    <span class="breadcrumb-step uk-visible@m">3</span> Đặt hàng
                                </a>
                            </li>
                            <li class="uk-disabled">
                                <a href="#" class="uk-text-large">
                                    <span class="breadcrumb-step uk-visible@m">4</span> Hoàn thành
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="uk-container">
            <div class="uk-margin">
                <div>
                    <div class="uk-text-default" style="color: #0A0A0A">
                        Bạn có mã ưu đãi?
                        <a href="#" style="color: #990d23" class="uk-button-link">Ấn vào đây để nhập mã</a>
                    </div>
                </div>
            </div>

            <div class="uk-section">
                <div class="uk-container">

                        <div class="uk-grid uk-grid-small" uk-grid>
                            <div class="uk-width-3-5@m">
                                <div id="customer_details">
                                    <div class="woocommerce-billing-fields">
                                        <h3 class="uk-heading-line"><span>Thông tin thanh toán</span></h3>
                                        <div class="uk-margin">
                                            <div>Name: <span>{{ isset($user->info->name) ? $user->info->name : '' }}</span></div>
                                        </div>
                                        <div class="uk-margin">
                                            <div>Address: <span>{{ isset($user->info->address) ? $user->info->address : '' }}</span></div>
                                        </div>
                                        <div class="uk-margin">
                                            <div>Phone: <span>{{ isset($user->info->phone) ? $user->info->phone : '' }}</span></div>
                                        </div>

                                        <div class="uk-margin">
                                            <div>Email: <span>{{ $user->email }}</span></div>
                                        </div>

                                    </div>
                                    <div class="woocommerce-additional-fields">
                                        <h3 class="uk-heading-line"><span>Thông tin bổ sung</span></h3>
                                        <div class="uk-margin">
                                         <textarea name="order_comments" class="uk-textarea" id="order_comments"
                                                   placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                                   rows="2" cols="5">
                                         </textarea>
                                        </div>
                                    </div>
                                    <a href="{{ route('cart.info') }}" class="uk-width-1-1 uk-button checkout-button">
                                        Sửa Thông tin
                                    </a>
                                </div>
                            </div>
                            <div class="uk-width-2-5@m">
                                <div class="card uk-card-default uk-card-body">
                                    <h3 class="uk-card-title">Đơn hàng của bạn</h3>
                                    <table class="uk-table uk-table-divider">
                                        <thead>
                                        <tr>
                                            <th><strong>Sản phẩm</strong></th>
                                            <th><strong>Tạm tính</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td>{{ $item['name'] }} × {{ $item['quantity'] }}</td>
                                                <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} ₫</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="1"><strong>Tạm tính</strong></td>
                                            <td><strong>{{ number_format($subtotal, 0, ',', '.') }} ₫</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1">Phí vận chuyển</td>
                                            <td >{{ number_format(30000, 0, ',', '.') }} ₫</td>
                                        </tr>
                                        <tr>
                                            <td colspan="1"><strong>Tổng</strong></td>
                                            <td><strong>{{ number_format($total, 0, ',', '.') }} ₫</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="uk-margin">
                                        <label>
                                            <input required type="checkbox" class="uk-checkbox" name="terms" id="terms"> Tôi đã đọc và
                                            đồng ý với <a href="#"
                                                          class="uk-link" target="_blank">điều khoản và điều kiện</a> của
                                            website <span class="required">*</span>
                                        </label>
                                        <input type="hidden" name="terms-field" value="1">
                                    </div>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="uk-list">
                                            <li class="uk-margin">
                                                <input id="payment_method_bacs" type="radio" class="uk-radio"
                                                       name="payment_method" value="bacs" checked>
                                                <label for="payment_method_bacs" class="uk-form-label uk-text-bold">Chuyển khoản
                                                    ngân hàng</label>
                                                <div class="uk-alert">
{{--                                                    <div>--}}
{{--                                                        <form name="checkout" method="post" class=""--}}
{{--                                                              action="{{ route('cart.checkoutMomo') }}" enctype="multipart/form-data" novalidate="novalidate">--}}
{{--                                                            @csrf--}}
{{--                                                            <button id="momo" type="submit" class="uk-width-1-2 uk-button checkout-button" name="payment_method" value="momo" >--}}
{{--                                                                Momo--}}
{{--                                                            </button>--}}
{{--                                                        </form>--}}
{{--                                                    </div>--}}
                                                    <div>
                                                        <form name="checkout" method="post"
                                                              action="{{ route('cart.checkoutVNPay') }}" enctype="multipart/form-data" novalidate="novalidate">
                                                            @csrf
                                                                <input name="total_amount" value="{{ $total }}" class="uk-hidden"/>
                                                                <input name="redirect" class="uk-hidden"/>
                                                            <button id="vnpay" type="submit"  class="uk-margin uk-width-1-2 uk-button checkout-button" name="payment_method" value="vnpay">
                                                                VNPay
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="uk-margin">
                                                <input id="payment_method_cod" type="radio" class="uk-radio"
                                                       name="payment_method" value="cod">
                                                <label for="payment_method_cod" class="uk-form-label uk-text-bold">Trả tiền mặt
                                                    khi nhận hàng</label>
                                                <div class="uk-alert " id="cod_payment_info"
                                                     style="display:none;">
                                                    <form name="checkout" method="post"
                                                          action="{{ route('cart.checkoutCash') }}" enctype="multipart/form-data" novalidate="novalidate">
                                                        @csrf
                                                        <input name="total_amount" value="{{ $total }}" class="uk-hidden"/>
                                                        <button id="card" type="submit"  class="uk-margin uk-width-1-2 uk-button checkout-button" name="payment_method" value="cash">
                                                            Đặt hàng
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the radio buttons
            var bacsRadio = document.getElementById('payment_method_bacs');
            var codRadio = document.getElementById('payment_method_cod');

            // Get the corresponding divs
            var bacsDiv = document.querySelector('#payment_method_bacs + label + .uk-alert');
            var codDiv = document.querySelector('#payment_method_cod + label + .uk-alert');

            // Function to handle radio button change
            function handlePaymentMethodChange() {
                if (codRadio.checked) {
                    bacsDiv.style.display = 'none';
                    codDiv.style.display = "block"
                } else {
                    bacsDiv.style.display = 'block';
                    codDiv.style.display = "none"

                }
            }

            // Initial call to set initial state
            handlePaymentMethodChange();

            // Add event listener to radio buttons
            bacsRadio.addEventListener('change', handlePaymentMethodChange);
            codRadio.addEventListener('change', handlePaymentMethodChange);
        });
    </script>

@endsection
