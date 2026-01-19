@extends('content.layouts.app')
@section('title', 'BIGBA - Rượu Vang Cao Cấp')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg" style="background-image: url('https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?w=1920');"></div>
        <div class="uk-container uk-position-relative uk-position-z-index">
            <div class="uk-text-center">
                <span class="hero-badge">Premium Wine Collection</span>
                <h1 class="hero-title">
                    Khám Phá Thế Giới<br>
                    <span>Rượu Vang</span> Đẳng Cấp
                </h1>
                <p class="hero-subtitle">
                    BIGBA tự hào mang đến bộ sưu tập rượu vang hảo hạng từ những vùng trồng nho nổi tiếng nhất thế giới.
                </p>
                <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
                    <div>
                        <a href="{{ route('products.index') }}" class="btn-primary-custom">
                            <span uk-icon="icon: cart; ratio: 0.9"></span>
                            Khám phá ngay
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('contact') }}" class="btn-outline-custom">
                            Liên hệ tư vấn
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-position-bottom-center uk-margin-large-bottom uk-padding-small uk-animation-shake">
            <span uk-icon="icon: chevron-down; ratio: 1.5"></span>
        </div>
    </section>

    <!-- Features Section -->
    <section class="uk-section bg-light">
        <div class="uk-container">
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@l" uk-grid>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: check; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Chính Hãng 100%</h3>
                        <p class="uk-text-muted uk-margin-remove">Nhập khẩu trực tiếp từ các nhà sản xuất uy tín hàng đầu thế giới</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: location; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Giao Hàng Toàn Quốc</h3>
                        <p class="uk-text-muted uk-margin-remove">Miễn phí ship nội thành, giao hàng nhanh chóng trong 2-4 giờ</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: star; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">2000+ Sản Phẩm</h3>
                        <p class="uk-text-muted uk-margin-remove">Đa dạng lựa chọn từ phổ thông đến cao cấp, phù hợp mọi dịp</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: receiver; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Tư Vấn 24/7</h3>
                        <p class="uk-text-muted uk-margin-remove">Đội ngũ chuyên gia sẵn sàng hỗ trợ bạn chọn chai vang hoàn hảo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="uk-section">
        <div class="uk-container">
            <div class="section-header">
                <span class="section-badge">Sản Phẩm Nổi Bật</span>
                <h2 class="section-title">Bán Chạy Nhất</h2>
                <p class="uk-text-large uk-text-muted uk-margin-auto" style="max-width: 600px;">Những chai rượu được yêu thích nhất tại BIGBA</p>
            </div>
            
            <div class="uk-slider uk-slider-container-offset" uk-slider="finite: true">
                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                    <ul class="uk-slider-items uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@m">
                        @foreach($products as $product)
                        <li>
                            <div class="product-card">
                                <div class="product-image-container">
                                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
                                        @if($product->featuredImage)
                                            <img src="{{ $product->featuredImage->path }}" alt="{{ $product->name }}">
                                        @else
                                            <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA" alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-info">
                                    @if($product->category)
                                        <span class="product-category">{{ $product->category->name }}</span>
                                    @endif
                                    <h3 class="product-name">
                                        <a href="{{ route('products.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <span class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="product-btn">Xem chi tiết</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-slidenav-large" href uk-slidenav-previous uk-slider-item="previous" style="color: var(--primary);"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-slidenav-large" href uk-slidenav-next uk-slider-item="next" style="color: var(--primary);"></a>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="uk-section uk-section-secondary" style="background: linear-gradient(135deg, var(--dark) 0%, #16213e 100%);">
        <div class="uk-container">
            <div class="section-header">
                <span class="section-badge fa-inverse">Thương Hiệu</span>
                <h2 class="section-title text-white" style="color: #fff;">Đối Tác Tin Cậy</h2>
                <p class="uk-text-large uk-margin-auto" style="max-width: 600px; color: rgba(255,255,255,0.7);">Đại lý chính thức của các thương hiệu rượu vang hàng đầu</p>
            </div>
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@m uk-flex-center" uk-grid>
                @foreach($brands as $brand)
                <div>
                    <a href="{{ route('brands.show', ['slug' => $brand->slug]) }}" class="uk-card uk-card-body uk-text-center uk-display-block" 
                       style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 15px; transition: all 0.3s ease;">
                        <h4 class="uk-margin-remove text-accent">{{ $brand->name }}</h4>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="uk-section" style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);">
        <div class="uk-container uk-text-center">
            <h2 class="section-title" style="color: #fff; margin-bottom: 20px;">Sẵn Sàng Khám Phá?</h2>
            <p class="uk-text-large uk-margin-medium-bottom" style="color: rgba(255,255,255,0.9); max-width: 700px; margin-left: auto; margin-right: auto;">
                Liên hệ ngay với chúng tôi để được tư vấn miễn phí và nhận ưu đãi đặc biệt dành cho thành viên mới.
            </p>
            <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
                <div>
                    <a href="tel:0946698008" class="btn-primary-custom" style="background: #fff; color: var(--primary);">
                        <span uk-icon="icon: receiver; ratio: 0.9"></span>
                        094 669 8008
                    </a>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="btn-outline-custom">
                        Xem tất cả sản phẩm
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
