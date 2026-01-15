
<style>
    .footer-wrapper {
        color: rgba(255,255,255,0.85);
    }
    
    .footer-wrapper .footer-link {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .footer-wrapper .footer-link:hover {
        color: #D4AF37;
        transform: translateX(5px);
        text-decoration: none;
    }
    
    .footer-wrapper .uk-list > li {
        margin-top: 8px;
    }
    
    .footer-wrapper h4 {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }
    
    .footer-wrapper .contact-info {
        color: rgba(255,255,255,0.85);
    }
    
    .footer-wrapper .contact-info span {
        color: #D4AF37;
        margin-right: 8px;
    }
    
    .footer-wrapper .social-btn {
        background: rgba(212, 175, 55, 0.15);
        color: #D4AF37;
        border: 1px solid rgba(212, 175, 55, 0.3);
        transition: all 0.3s ease;
    }
    
    .footer-wrapper .social-btn:hover {
        background: #D4AF37;
        color: #1a1a2e;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }
</style>

<footer id="footer" class="footer-wrapper uk-section uk-section-secondary uk-padding-remove-vertical" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <section class="uk-section uk-padding" id="section_info">
        <div class="uk-container">
            <div class="uk-grid-divider uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-expand@l uk-text-center" uk-grid>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Thông tin</span></h4>
                    <ul class="uk-list">
                        <li><a href="{{ route('home') }}" class="footer-link">Trang chủ</a></li>
                        <li><a href="{{ route('products.index') }}" class="footer-link">Sản phẩm</a></li>
                        <li><a href="{{ route('brands.index') }}" class="footer-link">Nhà sản xuất</a></li>
                        <li><a href="{{ route('posts.index') }}" class="footer-link">Tin tức</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Liên hệ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Danh mục</span></h4>
                    <ul class="uk-list">
                        @foreach($navCategories->take(6) as $category)
                            <li><a href="{{ route('products.category', $category->slug) }}" class="footer-link">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Tài khoản</span></h4>
                    <ul class="uk-list">
                        @auth
                            <li><a href="{{ route('user.profile') }}" class="footer-link">Thông tin cá nhân</a></li>
                            <li><a href="{{ route('orders.index') }}" class="footer-link">Đơn hàng của tôi</a></li>
                            <li><a href="{{ route('wishlist.index') }}" class="footer-link">Danh sách yêu thích</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="footer-link">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}" class="footer-link">Đăng ký</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Kết nối với chúng tôi</span></h4>
                    <div class="uk-flex uk-flex-center uk-margin-small-top">
                        <a href="#" class="uk-icon-button social-btn uk-margin-small-right" uk-icon="facebook"></a>
                        <a href="#" class="uk-icon-button social-btn uk-margin-small-right" uk-icon="instagram"></a>
                        <a href="#" class="uk-icon-button social-btn" uk-icon="youtube"></a>
                    </div>
                    <h4 class="uk-heading-line uk-text-center uk-margin-top"><span style="color: #D4AF37;">Liên hệ</span></h4>
                    <div class="uk-text-center contact-info">
                        <p class="uk-margin-small"><span uk-icon="receiver"></span> 094 669 8008</p>
                        <p class="uk-margin-small"><span uk-icon="mail"></span> info@bigba.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="border-top: 1px solid rgba(255,255,255,0.1);"></div>
    <section class="uk-section uk-section-small" id="section_copyright">
        <div class="uk-container">
            <div class="uk-text-center">
                <p class="uk-margin-remove" style="color: rgba(255,255,255,0.7);">Copyright {{ date('Y') }} © <strong style="color: #D4AF37;">BIGBA</strong> - Rượu vang chính hãng</p>
            </div>
        </div>
    </section>
</footer>
