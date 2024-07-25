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
                                <a href="{{ route('cart.checkout') }}" class="uk-text-large uk-active">
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
                    <form name="checkout" method="post" class="checkout woocommerce-checkout uk-container"
                          action="{{ route('cart.processCheckout') }}" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="uk-grid uk-grid-small" uk-grid>
                            <div class="uk-width-3-5@m">
                                <div id="customer_details">
                                    <div class="woocommerce-billing-fields">
                                        <h3 class="uk-heading-line"><span>Thông tin thanh toán</span></h3>
                                        <div class="uk-margin">
                                            <input type="text" class="uk-input red-border" name="billing_first_name"
                                                   id="billing_first_name" placeholder="Họ và tên" value=""
                                                   autocomplete="given-name">
                                        </div>
                                        <div class="uk-margin">
                                            <input type="text" class="uk-input red-border" name="billing_address_1"
                                                   id="billing_address_1" placeholder="Địa chỉ" value=""
                                                   autocomplete="address-line1">
                                        </div>
                                        <div class="uk-margin">
                                            <input type="tel" class="uk-input red-border" name="billing_phone"
                                                   id="billing_phone" placeholder="Số điện thoại" value="" autocomplete="tel">
                                        </div>
                                        <div class="uk-margin">
                                            <input type="email" class="uk-input red-border" name="billing_email"
                                                   id="billing_email" placeholder="Địa chỉ email" value="" autocomplete="email">
                                        </div>
                                        <div class="uk-margin">
                                            <input type="text" class="uk-input red-border" name="kakaotalk_id"
                                                   id="kakaotalk_id" placeholder="Kakaotalk ID (tuỳ chọn)" value="">
                                        </div>
                                    </div>
                                    <div class="woocommerce-additional-fields">
                                        <h3 class="uk-heading-line"><span>Thông tin bổ sung</span></h3>
                                        <div class="uk-margin">
                                <textarea name="order_comments" class="uk-textarea" id="order_comments"
                                          placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                          rows="2" cols="5"></textarea>
                                        </div>
                                    </div>
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
                                            <td colspan="1"><strong>Tổng</strong></td>
                                            <td><strong>{{ number_format($total, 0, ',', '.') }} ₫</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="uk-list">
                                            <li class="uk-margin">
                                                <input id="payment_method_bacs" type="radio" class="uk-radio"
                                                       name="payment_method" value="bacs" checked>
                                                <label for="payment_method_bacs" class="uk-form-label uk-text-bold">Chuyển khoản
                                                    ngân hàng</label>
                                                <div class="uk-alert uk-alert-primary">
                                                    Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử
                                                    dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ được
                                                    giao sau khi tiền đã chuyển.
                                                </div>
                                            </li>
                                            <li class="uk-margin">
                                                <input id="payment_method_cod" type="radio" class="uk-radio"
                                                       name="payment_method" value="cod">
                                                <label for="payment_method_cod" class="uk-form-label uk-text-bold">Trả tiền mặt
                                                    khi nhận hàng</label>
                                                <div class="uk-alert uk-alert-primary" id="cod_payment_info"
                                                     style="display:none;">
                                                    Trả tiền mặt khi giao hàng.
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="uk-margin">
                                        <label><input type="checkbox" class="uk-checkbox" name="terms" id="terms"> Tôi đã đọc và
                                            đồng ý với <a href="https://winecellar.vn/lien-he/chinh-sach-va-dieu-khoan-dich-vu/"
                                                          class="uk-link" target="_blank">điều khoản và điều kiện</a> của
                                            website <span class="required">*</span></label>
                                        <input type="hidden" name="terms-field" value="1">
                                    </div>
                                    <button type="submit" class="uk-width-1-1 uk-button checkout-button"
                                            name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng"
                                            data-value="Đặt hàng">Đặt hàng
                                    </button>
                                    <input type="hidden" id="woocommerce-process-checkout-nonce"
                                           name="woocommerce-process-checkout-nonce" value="eb62b9640b">
                                    <input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">
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
            var codDiv = document.getElementById('cod_payment_info');

            // Function to handle radio button change
            function handlePaymentMethodChange() {
                if (codRadio.checked) {
                    bacsDiv.style.display = 'none';
                } else {
                    bacsDiv.style.display = 'block';
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
