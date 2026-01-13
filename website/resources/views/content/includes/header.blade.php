<style>
    :root {
        --primary: #722F37;
        --primary-dark: #5a252c;
        --primary-light: #8B3A44;
        --accent: #D4AF37;
        --accent-hover: #B8962E;
        --dark: #1a1a2e;
        --light: #faf8f5;
        --text-light: rgba(255,255,255,0.9);
    }

    /* Header Styles */
    .main-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        transition: all 0.4s ease;
        box-shadow: 0 2px 20px rgba(0,0,0,0.15);
    }

    .main-header.uk-sticky-fixed {
        background: rgba(114, 47, 55, 0.98);
        backdrop-filter: blur(12px);
        box-shadow: 0 4px 30px rgba(0,0,0,0.2);
    }

    .header-top-bar {
        background: rgba(0,0,0,0.25);
        padding: 10px 0;
        font-size: 13px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .header-top-bar a {
        color: var(--text-light);
        transition: color 0.3s ease;
    }

    .header-top-bar a:hover {
        color: var(--accent);
        text-decoration: none;
    }

    .header-main {
        padding: 18px 0;
    }

    .header-logo {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        font-weight: 700;
        color: #fff !important;
        text-decoration: none;
        letter-spacing: 2px;
    }

    .header-logo span {
        color: var(--accent);
    }

    .header-nav .uk-navbar-nav > li > a {
        color: var(--text-light);
        font-weight: 500;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 12px 18px;
        transition: all 0.3s ease;
        position: relative;
    }

    .header-nav .uk-navbar-nav > li > a::after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--accent);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .header-nav .uk-navbar-nav > li > a:hover,
    .header-nav .uk-navbar-nav > li.uk-active > a {
        color: #fff;
    }

    .header-nav .uk-navbar-nav > li > a:hover::after,
    .header-nav .uk-navbar-nav > li.uk-active > a::after {
        width: 30px;
    }

    .header-icons a {
        color: var(--text-light);
        margin-left: 15px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.15);
    }

    .header-icons a:hover {
        color: var(--dark);
        background: var(--accent);
        border-color: var(--accent);
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }

    .header-btn-login {
        background: transparent;
        border: 2px solid rgba(255,255,255,0.4);
        color: #fff !important;
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        margin-left: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .header-btn-login:hover {
        background: var(--accent);
        border-color: var(--accent);
        color: var(--dark) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
    }

    .header-btn-register {
        background: var(--accent);
        border: 2px solid var(--accent);
        color: var(--dark) !important;
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        margin-left: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .header-btn-register:hover {
        background: var(--accent-hover);
        border-color: var(--accent-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
    }

    .user-dropdown-btn {
        background: rgba(255,255,255,0.12);
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        padding: 10px 18px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
        margin-left: 15px;
    }

    .user-dropdown-btn:hover {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.3);
    }

    .user-dropdown-btn .user-name {
        font-size: 13px;
        font-weight: 500;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Mobile Header */
    .mobile-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        padding: 15px 0;
    }

    .mobile-toggle {
        color: #fff !important;
        width: 48px;
        height: 48px;
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255,255,255,0.15);
    }

    .mobile-logo {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        color: #fff !important;
    }

    .mobile-logo span {
        color: var(--accent);
    }

    .mobile-icons a {
        color: #fff;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.1);
        border-radius: 12px;
        margin-left: 10px;
        border: 1px solid rgba(255,255,255,0.15);
    }

    /* Dropdown styling */
    .uk-dropdown {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 15px 50px rgba(0,0,0,0.2);
        padding: 15px;
        border: 1px solid rgba(0,0,0,0.05);
    }

    .uk-dropdown-nav > li > a {
        color: var(--dark);
        padding: 12px 16px;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .uk-dropdown-nav > li > a:hover {
        background: var(--light);
        color: var(--primary);
    }

    /* Search Modal */
    .search-modal {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    }

    .search-modal .uk-search-input {
        background: rgba(255,255,255,0.1);
        border: 2px solid rgba(255,255,255,0.25);
        color: #fff;
        font-size: 22px;
        padding: 22px 35px;
        border-radius: 50px;
        width: 100%;
        max-width: 650px;
    }

    .search-modal .uk-search-input::placeholder {
        color: rgba(255,255,255,0.5);
    }

    .search-modal .uk-search-input:focus {
        border-color: var(--accent);
        outline: none;
        box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
    }

    .search-btn {
        background: var(--accent);
        color: var(--dark);
        border: none;
        padding: 16px 45px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 15px;
        margin-top: 25px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .search-btn:hover {
        background: var(--accent-hover);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.35);
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Desktop Header -->
<header class="main-header uk-visible@l" uk-sticky="animation: uk-animation-slide-top; sel-target: .main-header; cls-active: uk-sticky-fixed; cls-inactive: uk-navbar-transparent; top: 100">
    <!-- Top Bar -->
    <div class="header-top-bar">
        <div class="uk-container">
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <div>
                    <a href="tel:0946698008" class="uk-margin-right">
                        <span uk-icon="icon: receiver; ratio: 0.8"></span> 0946.698.008
                    </a>
                    <a href="mailto:info@bigba.vn">
                        <span uk-icon="icon: mail; ratio: 0.8"></span> info@bigba.vn
                    </a>
                </div>
                <div>
                    <a href="{{ route('posts.index') }}" class="uk-margin-right">Tin tức</a>
                    <a href="{{ route('contact') }}">Liên hệ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="header-main">
        <div class="uk-container">
            <nav class="uk-navbar header-nav" uk-navbar>
                <div class="uk-navbar-left">
                    <a class="header-logo" href="{{ route('home') }}">
                        BIG<span>BA</span>
                    </a>
                    <ul class="uk-navbar-nav uk-margin-left">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                        <li><a href="{{ route('brands.index') }}">Nhà sản xuất</a></li>
                        <li><a href="{{ route('posts.index') }}">Tin tức</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                </div>

                <div class="uk-navbar-right">
                    <div class="header-icons uk-flex uk-flex-middle">
                        <!-- Search -->
                        <a href="#search-modal" uk-toggle title="Tìm kiếm">
                            <span uk-icon="icon: search; ratio: 1"></span>
                        </a>

                        <!-- Wishlist -->
                        <a href="{{ route('wishlist.index') }}" title="Yêu thích">
                            <span uk-icon="icon: heart; ratio: 1"></span>
                        </a>

                        <!-- Cart -->
                        <a href="#offcanvas-cart" uk-toggle title="Giỏ hàng" class="uk-position-relative">
                            <span uk-icon="icon: cart; ratio: 1"></span>
                        </a>
                    </div>

                    @auth
                        <!-- User Dropdown -->
                        <div class="uk-inline uk-margin-left">
                            <button class="user-dropdown-btn" type="button">
                                <span uk-icon="icon: user; ratio: 0.9"></span>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <span uk-icon="icon: chevron-down; ratio: 0.7"></span>
                            </button>
                            <div uk-dropdown="pos: bottom-right; mode: click">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="{{ route('user.profile') }}"><span uk-icon="icon: user; ratio: 0.9" class="uk-margin-small-right"></span> Tài khoản</a></li>
                                    <li><a href="{{ route('orders.index') }}"><span uk-icon="icon: bag; ratio: 0.9" class="uk-margin-small-right"></span> Đơn hàng</a></li>
                                    <li><a href="{{ route('wishlist.index') }}"><span uk-icon="icon: heart; ratio: 0.9" class="uk-margin-small-right"></span> Yêu thích</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #990d23;">
                                            <span uk-icon="icon: sign-out; ratio: 0.9" class="uk-margin-small-right"></span> Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth

                    @guest
                        <a class="header-btn-login" href="{{ route('login') }}">Đăng nhập</a>
                        <a class="header-btn-register" href="{{ route('register') }}">Đăng ký</a>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Mobile Header -->
<header class="mobile-header uk-hidden@l" uk-sticky="animation: uk-animation-slide-top">
    <div class="uk-container">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <a class="mobile-toggle" href="#offcanvas-nav" uk-toggle>
                <span uk-icon="icon: menu; ratio: 1.2"></span>
            </a>

            <a class="mobile-logo" href="{{ route('home') }}">
                BIG<span>BA</span>
            </a>

            <div class="mobile-icons uk-flex">
                <a href="#search-modal" uk-toggle>
                    <span uk-icon="icon: search"></span>
                </a>
                <a href="#offcanvas-cart" uk-toggle>
                    <span uk-icon="icon: cart"></span>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Off-canvas menu for mobile -->
<div id="offcanvas-nav" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar" style="background: linear-gradient(135deg, #990d23 0%, #6b0a19 100%); width: 280px;">
        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <div class="uk-margin-top uk-text-center">
            <a class="mobile-logo" href="{{ route('home') }}" style="font-size: 24px;">
                BIG<span>BA</span>
            </a>
        </div>

        @auth
            <div class="uk-margin uk-padding-small" style="background: rgba(255,255,255,0.1); border-radius: 10px; margin-top: 20px;">
                <div class="uk-flex uk-flex-middle">
                    <span uk-icon="icon: user; ratio: 1.2" style="color: #b4975a;"></span>
                    <div class="uk-margin-small-left" style="color: #fff;">
                        <div style="font-weight: 600;">{{ Auth::user()->name }}</div>
                        <a href="{{ route('user.profile') }}" style="font-size: 12px; color: #b4975a;">Quản lý tài khoản</a>
                    </div>
                </div>
            </div>
        @endauth

        <ul class="uk-nav uk-nav-default uk-margin-top" uk-nav>
            <li class="uk-active"><a href="{{ route('home') }}" style="color: #fff;">Trang chủ</a></li>
            <li class="uk-parent">
                <a href="#" style="color: #fff;">Sản phẩm</a>
                <ul class="uk-nav-sub">
                    <li><a href="{{ route('products.index') }}" style="color: rgba(255,255,255,0.8);">Tất cả sản phẩm</a></li>
                    @foreach ($menuTree as $menu)
                        <li><a href="{{ $menu->url ?? '#' }}" style="color: rgba(255,255,255,0.8);">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ route('brands.index') }}" style="color: #fff;">Nhà sản xuất</a></li>
            <li><a href="{{ route('posts.index') }}" style="color: #fff;">Tin tức</a></li>
            <li><a href="{{ route('contact') }}" style="color: #fff;">Liên hệ</a></li>
            @auth
                <li class="uk-nav-divider" style="border-color: rgba(255,255,255,0.2);"></li>
                <li><a href="{{ route('orders.index') }}" style="color: #fff;"><span uk-icon="bag" class="uk-margin-small-right"></span> Đơn hàng</a></li>
                <li><a href="{{ route('wishlist.index') }}" style="color: #fff;"><span uk-icon="heart" class="uk-margin-small-right"></span> Yêu thích</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" style="color: #b4975a;">
                        <span uk-icon="sign-out" class="uk-margin-small-right"></span> Đăng xuất
                    </a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>

        @guest
            <div class="uk-margin-top uk-padding-small">
                <a href="{{ route('login') }}" class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom" style="background: transparent; border: 2px solid #fff; color: #fff; border-radius: 25px;">
                    Đăng nhập
                </a>
                <a href="{{ route('register') }}" class="uk-button uk-width-1-1" style="background: #b4975a; color: #fff; border-radius: 25px;">
                    Đăng ký
                </a>
            </div>
        @endguest
    </div>
</div>

<!-- Search Modal -->
<div id="search-modal" class="uk-modal-full search-modal" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close style="color: #fff;"></button>
        <div class="uk-text-center">
            <h2 style="color: #fff; font-family: 'Playfair Display', serif; margin-bottom: 30px;">Bạn đang tìm gì?</h2>
            <form action="{{ route('products.index') }}" method="GET">
                <input class="uk-search-input" type="search" name="q" placeholder="Nhập tên sản phẩm..." autofocus>
                <button type="submit" class="search-btn uk-display-block uk-margin-auto">
                    <span uk-icon="search" class="uk-margin-small-right"></span> Tìm kiếm
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Cart Offcanvas -->
<div id="offcanvas-cart" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar" style="background: #fff; width: 350px; padding: 0;">
        <div style="background: linear-gradient(135deg, #990d23 0%, #6b0a19 100%); padding: 20px; color: #fff;">
            <button class="uk-offcanvas-close" type="button" uk-close style="color: #fff;"></button>
            <h3 class="uk-margin-remove" style="font-family: 'Playfair Display', serif;">
                <span uk-icon="icon: cart; ratio: 1.2" class="uk-margin-small-right"></span>
                Giỏ hàng
            </h3>
        </div>
        <div id="widget_shopping_cart_content" class="uk-padding">
            <!-- Cart items will be loaded here -->
        </div>
    </div>
</div>
