
<footer id="footer" class="footer-wrapper uk-section uk-section-secondary uk-padding-remove-vertical" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);">
    <section class="uk-section uk-padding" id="section_info">
        <div class="uk-container">
            <div class="uk-grid-divider uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-expand@l uk-text-center" uk-grid>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Thông tin</span></h4>
                    <ul class="uk-list">
                        <li><a href="{{ route('home') }}" class="uk-link-text">Trang chủ</a></li>
                        <li><a href="{{ route('products.index') }}" class="uk-link-text">Sản phẩm</a></li>
                        <li><a href="{{ route('brands.index') }}" class="uk-link-text">Nhà sản xuất</a></li>
                        <li><a href="{{ route('posts.index') }}" class="uk-link-text">Tin tức</a></li>
                        <li><a href="{{ route('contact') }}" class="uk-link-text">Liên hệ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Danh mục</span></h4>
                    <ul class="uk-list">
                        @php
                            $categories = \App\Models\Category::where('model_type', 'App\Models\Product')->take(6)->get();
                        @endphp
                        @foreach($categories as $category)
                            <li><a href="{{ route('products.category', $category->slug) }}" class="uk-link-text">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Tài khoản</span></h4>
                    <ul class="uk-list">
                        @auth
                            <li><a href="{{ route('user.profile') }}" class="uk-link-text">Thông tin cá nhân</a></li>
                            <li><a href="{{ route('orders.index') }}" class="uk-link-text">Đơn hàng của tôi</a></li>
                            <li><a href="{{ route('wishlist.index') }}" class="uk-link-text">Danh sách yêu thích</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="uk-link-text">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}" class="uk-link-text">Đăng ký</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h4 class="uk-heading-line uk-text-center"><span style="color: #D4AF37;">Kết nối với chúng tôi</span></h4>
                    <div class="uk-flex uk-flex-center uk-margin-small-top">
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="facebook" style="background: #D4AF37; color: #1a1a2e;"></a>
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="instagram" style="background: #D4AF37; color: #1a1a2e;"></a>
                        <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="youtube" style="background: #D4AF37; color: #1a1a2e;"></a>
                    </div>
                    <h4 class="uk-heading-line uk-text-center uk-margin-top"><span style="color: #D4AF37;">Liên hệ</span></h4>
                    <div class="uk-text-center">
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
                <p class="uk-margin-remove">Copyright {{ date('Y') }} © <strong style="color: #D4AF37;">BIGBA</strong></p>
            </div>
        </div>
    </section>
</footer>
