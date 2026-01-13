@extends('content.layouts.app')

@section('title', 'Địa chỉ giao hàng')

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

        .custom-btn-primary {
            background: #990d23;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .custom-btn-primary:hover {
            background: #7a0a1c;
            color: #fff;
        }

        .form-section-title {
            color: #990d23;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #990d23;
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
                            <li class="uk-active"><a href="{{ route('user.address') }}"><span uk-icon="location"></span> Địa chỉ giao hàng</a></li>
                            <li><a href="{{ route('orders.index') }}"><span uk-icon="bag"></span> Đơn hàng của tôi</a></li>
                            <li><a href="{{ route('wishlist.index') }}"><span uk-icon="heart"></span> Yêu thích</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="uk-width-3-4@m">
                    <div class="account-card uk-card uk-card-body">
                        <h3 class="form-section-title">
                            <span uk-icon="location"></span> Địa chỉ giao hàng
                        </h3>

                        @if(session('success'))
                            <div class="uk-alert-success" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="uk-alert-danger" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <ul class="uk-list">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.address.update') }}" method="POST">
                            @csrf

                            <div class="uk-margin">
                                <label class="uk-form-label" for="name">Họ và tên người nhận *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="name" name="name" type="text"
                                           value="{{ old('name', $userInfo->name ?? Auth::user()->name) }}"
                                           placeholder="Nhập họ tên người nhận hàng" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="phone">Số điện thoại *</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="phone" name="phone" type="tel"
                                           value="{{ old('phone', $userInfo->phone ?? '') }}"
                                           placeholder="Nhập số điện thoại liên hệ" required>
                                </div>
                            </div>

                            <div class="uk-margin">
                                <label class="uk-form-label" for="address">Địa chỉ giao hàng *</label>
                                <div class="uk-form-controls">
                                    <textarea class="uk-textarea" id="address" name="address" rows="3"
                                              placeholder="Nhập địa chỉ chi tiết (số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố)"
                                              required>{{ old('address', $userInfo->address ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="uk-margin uk-margin-medium-top">
                                <button class="custom-btn-primary uk-button" type="submit">
                                    <span uk-icon="check"></span> Lưu địa chỉ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
