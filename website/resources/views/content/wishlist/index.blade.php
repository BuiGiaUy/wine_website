@extends('content.layouts.app')
@section('title', 'Danh sách yêu thích')

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

        .wishlist-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .wishlist-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.9);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #990d23;
            color: #fff;
        }

        .product-price {
            color: #990d23;
            font-weight: bold;
            font-size: 1.1em;
        }

        .empty-wishlist {
            text-align: center;
            padding: 60px 20px;
        }

        .custom-btn-primary {
            background: #990d23;
            color: #fff;
            border-radius: 5px;
        }

        .custom-btn-primary:hover {
            background: #7a0a1c;
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
                            <li><a href="{{ route('orders.index') }}"><span uk-icon="bag"></span> Đơn hàng của tôi</a></li>
                            <li class="uk-active"><a href="{{ route('wishlist.index') }}"><span uk-icon="heart"></span> Yêu thích</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="uk-width-3-4@m">
                    <div class="account-card uk-card uk-card-body">
                        <h3 style="color: #990d23; font-weight: 600; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #990d23;">
                            <span uk-icon="heart"></span> Danh sách yêu thích ({{ $wishlists->total() }})
                        </h3>

                        @if(session('success'))
                            <div class="uk-alert-success" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif

                        @if($wishlists->count() > 0)
                            <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-medium" uk-grid>
                                @foreach($wishlists as $wishlist)
                                    <div id="wishlist-item-{{ $wishlist->id }}">
                                        <div class="uk-card uk-card-default wishlist-card uk-position-relative">
                                            <button class="remove-btn" onclick="removeFromWishlist({{ $wishlist->product_id }}, {{ $wishlist->id }})" title="Xóa khỏi yêu thích">
                                                <span uk-icon="close"></span>
                                            </button>
                                            <div class="uk-card-media-top">
                                                <a href="{{ route('products.show', $wishlist->product->slug) }}">
                                                    @if($wishlist->product->featuredImage)
                                                        <img src="{{ $wishlist->product->featuredImage->path }}" alt="{{ $wishlist->product->name }}" style="width: 100%; height: 180px; object-fit: cover;">
                                                    @else
                                                        <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA" alt="Default" style="width: 100%; height: 180px; object-fit: cover;">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="uk-card-body uk-padding-small">
                                                <h5 class="uk-margin-small-bottom" style="height: 40px; overflow: hidden;">
                                                    <a href="{{ route('products.show', $wishlist->product->slug) }}" style="color: #333;">
                                                        {{ Str::limit($wishlist->product->name, 40) }}
                                                    </a>
                                                </h5>
                                                <p class="product-price uk-margin-remove">
                                                    {{ number_format($wishlist->product->price) }}₫
                                                </p>
                                                <a href="{{ route('products.show', $wishlist->product->slug) }}"
                                                   class="uk-button uk-button-small uk-width-1-1 uk-margin-small-top custom-btn-primary">
                                                    Xem sản phẩm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="uk-flex uk-flex-center uk-margin-large-top">
                                {{ $wishlists->links('content.components.pagination') }}
                            </div>
                        @else
                            <div class="empty-wishlist">
                                <span uk-icon="icon: heart; ratio: 4" style="color: #ddd;"></span>
                                <h4 class="uk-margin-top">Danh sách yêu thích trống</h4>
                                <p class="uk-text-muted">Hãy thêm sản phẩm yêu thích của bạn!</p>
                                <a href="{{ route('products.index') }}" class="uk-button custom-btn-primary">
                                    Khám phá sản phẩm
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function removeFromWishlist(productId, itemId) {
        fetch('{{ route("wishlist.remove") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const item = document.getElementById('wishlist-item-' + itemId);
                if (item) {
                    item.style.transition = 'opacity 0.3s ease';
                    item.style.opacity = '0';
                    setTimeout(() => item.remove(), 300);
                }
                UIkit.notification({
                    message: data.message,
                    status: 'success',
                    pos: 'top-center',
                    timeout: 2000
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
    </script>
@endsection
