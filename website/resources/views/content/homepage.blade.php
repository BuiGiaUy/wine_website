@extends('content.layouts.app')
@section('title', 'BIGBA - Rượu Vang Cao Cấp')

@section('style')
<style>
    :root {
        --primary: #722F37;
        --primary-dark: #5a252c;
        --accent: #D4AF37;
        --accent-light: #e8c856;
        --dark: #1a1a2e;
        --light: #faf8f5;
        --gray: #6b7280;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?w=1920') center/cover;
        opacity: 0.15;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 60px 20px;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(212, 175, 55, 0.2);
        border: 1px solid var(--accent);
        color: var(--accent);
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 5rem);
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .hero-title span {
        color: var(--accent);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto 40px;
        line-height: 1.8;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-primary-custom {
        background: var(--accent);
        color: var(--dark);
        padding: 16px 40px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-primary-custom:hover {
        background: var(--accent-light);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        color: var(--dark);
    }

    .btn-outline-custom {
        background: transparent;
        border: 2px solid rgba(255,255,255,0.5);
        color: #fff;
        padding: 14px 38px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-outline-custom:hover {
        background: #fff;
        color: var(--primary);
        border-color: #fff;
    }

    .scroll-indicator {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        color: #fff;
        opacity: 0.7;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40% { transform: translateX(-50%) translateY(-10px); }
        60% { transform: translateX(-50%) translateY(-5px); }
    }

    /* Features Section */
    .features-section {
        background: var(--light);
        padding: 80px 0;
    }

    .feature-card {
        text-align: center;
        padding: 40px 30px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        color: #fff;
    }

    .feature-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 12px;
    }

    .feature-desc {
        color: var(--gray);
        font-size: 0.95rem;
        line-height: 1.7;
    }

    /* Categories Section */
    .categories-section {
        padding: 100px 0;
        background: #fff;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-badge {
        display: inline-block;
        color: var(--accent);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 15px;
    }

    .section-subtitle {
        color: var(--gray);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }

    .category-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        min-height: 300px;
        display: flex;
        align-items: flex-end;
        transition: all 0.4s ease;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);
        z-index: 1;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(114, 47, 55, 0.3);
    }

    .category-content {
        position: relative;
        z-index: 2;
        padding: 30px;
        color: #fff;
        width: 100%;
    }

    .category-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .category-count {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Products Section */
    .products-section {
        padding: 100px 0;
        background: var(--light);
    }

    .product-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    }

    .product-image {
        position: relative;
        padding-top: 120%;
        background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
    }

    .product-image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 70%;
        max-height: 80%;
        object-fit: contain;
    }

    .product-info {
        padding: 25px;
        text-align: center;
    }

    .product-name {
        font-weight: 600;
        color: var(--dark);
        font-size: 1rem;
        margin-bottom: 10px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
    }

    .product-price {
        color: var(--primary);
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 15px;
    }

    .product-btn {
        background: var(--primary);
        color: #fff;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .product-btn:hover {
        background: var(--primary-dark);
        color: #fff;
        transform: translateY(-2px);
    }

    /* Brands Section */
    .brands-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--dark) 0%, #16213e 100%);
        color: #fff;
    }

    .brand-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .brand-card:hover {
        background: rgba(255,255,255,0.1);
        transform: translateY(-5px);
    }

    .brand-logo {
        width: 120px;
        height: 80px;
        object-fit: contain;
        margin-bottom: 20px;
        filter: brightness(0) invert(1);
        opacity: 0.8;
    }

    .brand-name {
        font-weight: 600;
        font-size: 1rem;
    }

    /* CTA Section */
    .cta-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        text-align: center;
        color: #fff;
    }

    .cta-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 700;
        margin-bottom: 20px;
    }

    .cta-subtitle {
        font-size: 1.15rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto 40px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 80vh;
        }

        .hero-buttons {
            flex-direction: column;
            align-items: center;
        }

        .features-section,
        .categories-section,
        .products-section,
        .brands-section,
        .cta-section {
            padding: 60px 0;
        }

        .category-card {
            min-height: 200px;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="uk-container">
            <div class="hero-content">
                <span class="hero-badge">Premium Wine Collection</span>
                <h1 class="hero-title">
                    Khám Phá Thế Giới<br>
                    <span>Rượu Vang</span> Đẳng Cấp
                </h1>
                <p class="hero-subtitle">
                    BIGBA tự hào mang đến bộ sưu tập rượu vang hảo hạng từ những vùng trồng nho nổi tiếng nhất thế giới.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('products.index') }}" class="btn-primary-custom">
                        <span uk-icon="icon: cart; ratio: 0.9"></span>
                        Khám phá ngay
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline-custom">
                        Liên hệ tư vấn
                    </a>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <span uk-icon="icon: chevron-down; ratio: 1.5"></span>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="uk-container">
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@l" uk-grid>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: check; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Chính Hãng 100%</h3>
                        <p class="feature-desc">Nhập khẩu trực tiếp từ các nhà sản xuất uy tín hàng đầu thế giới</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: location; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Giao Hàng Toàn Quốc</h3>
                        <p class="feature-desc">Miễn phí ship nội thành, giao hàng nhanh chóng trong 2-4 giờ</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: star; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">2000+ Sản Phẩm</h3>
                        <p class="feature-desc">Đa dạng lựa chọn từ phổ thông đến cao cấp, phù hợp mọi dịp</p>
                    </div>
                </div>
                <div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <span uk-icon="icon: receiver; ratio: 2"></span>
                        </div>
                        <h3 class="feature-title">Tư Vấn 24/7</h3>
                        <p class="feature-desc">Đội ngũ chuyên gia sẵn sàng hỗ trợ bạn chọn chai vang hoàn hảo</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <!-- <section class="categories-section">
        <div class="uk-container">
            <div class="section-header">
                <span class="section-badge">Danh Mục</span>
                <h2 class="section-title">Khám Phá Bộ Sưu Tập</h2>
                <p class="section-subtitle">Đa dạng các loại rượu vang từ khắp nơi trên thế giới</p>
            </div>
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@l" uk-grid>
                @foreach($categories as $category)
                <div>
                    <a href="{{ route('products.category', ['slug' => $category->slug]) }}" class="category-card" style="background-image: url('https://images.unsplash.com/photo-1474722883778-792e7990302f?w=600'); background-size: cover; background-position: center;">
                        <div class="category-content">
                            <h3 class="category-name">{{ $category->name }}</h3>
                            <span class="category-count">Xem sản phẩm →</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section> -->

    <!-- Products Section -->
    <section class="products-section">
        <div class="uk-container">
            <div class="section-header">
                <span class="section-badge">Sản Phẩm Nổi Bật</span>
                <h2 class="section-title">Bán Chạy Nhất</h2>
                <p class="section-subtitle">Những chai rượu được yêu thích nhất tại BIGBA</p>
            </div>
            <div class="uk-slider uk-slider-container-offset" uk-slider="finite: true">
                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                    <ul class="uk-slider-items uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@m">
                        @foreach($products as $product)
                        <li>
                            <div class="product-card">
                                <div class="product-image">
                                    @if($product->featuredImage)
                                        <img src="{{ $product->featuredImage->path }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA" alt="{{ $product->name }}">
                                    @endif
                                </div>
                                <div class="product-info">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <p class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</p>
                                    <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="product-btn">Xem chi tiết</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slider-item="previous" style="color: var(--primary);"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slider-item="next" style="color: var(--primary);"></a>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
            </div>
        </div>
    </section>

    <!-- Brands Section -->
    <section class="brands-section">
        <div class="uk-container">
            <div class="section-header">
                <span class="section-badge" style="color: var(--accent);">Thương Hiệu</span>
                <h2 class="section-title" style="color: #fff;">Đối Tác Tin Cậy</h2>
                <p class="section-subtitle" style="color: rgba(255,255,255,0.7);">Đại lý chính thức của các thương hiệu rượu vang hàng đầu</p>
            </div>
            <div class="uk-grid uk-grid-medium uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid>
                @foreach($brands as $brand)
                <div>
                    <a href="{{ route('brands.show', ['slug' => $brand->slug]) }}" class="brand-card uk-display-block">
                        <div class="brand-name" style="color: var(--accent);">{{ $brand->name }}</div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="uk-container">
            <h2 class="cta-title">Sẵn Sàng Khám Phá?</h2>
            <p class="cta-subtitle">Liên hệ ngay với chúng tôi để được tư vấn miễn phí và nhận ưu đãi đặc biệt dành cho thành viên mới.</p>
            <div class="hero-buttons">
                <a href="tel:0946698008" class="btn-primary-custom">
                    <span uk-icon="icon: receiver; ratio: 0.9"></span>
                    094 669 8008
                </a>
                <a href="{{ route('products.index') }}" class="btn-outline-custom">
                    Xem tất cả sản phẩm
                </a>
            </div>
        </div>
    </section>
@endsection
