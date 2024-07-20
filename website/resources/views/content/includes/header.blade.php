<header id="header" class="  uk-navbar-container uk-navbar-transparent uk-sticky" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
    <div class="uk-container">
        <nav class="uk-navbar " uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="{{ route('home') }}">
                </a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m">
                    <li class="uk-active"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li>
                        <a href="#">RƯỢU VANG <span uk-icon="icon: triangle-down"></span></a>
                        <div class="uk-navbar-dropdown" uk-drop="boundary: !.uk-navbar; stretch: x; flip: false">
                            <div class="uk-drop-grid uk-child-width-1-4@m" uk-grid>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">Theo loại rượu</li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-do']) }}">Rượu vang đỏ</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-trang']) }}">Rượu vang trắng</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-sui']) }}">Rượu vang sủi</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-champagne']) }}">Rượu Champagne</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-hong']) }}">Rượu vang hồng</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-ngot']) }}">Rượu vang ngọt</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-cuong-hoa']) }}">Rượu vang cường hóa</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-khong-con']) }}">Rượu vang không cồn</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-organic']) }}">Rượu vang Organic</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'tat-ca-ruou-vang']) }}" style="padding-left: 5px" class="link-p">Tất cả rượu vang</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">Theo quốc gia</li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-phap']) }}">Rượu vang Pháp</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-y']) }}">Rượu vang Ý</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'vang-tay-ban-nha']) }}">Rượu vang Tây Ban Nha</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-chile']) }}">Rượu vang Chile</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-my']) }}">Rượu vang Mỹ</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-uc']) }}">Rượu vang Úc</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-newzealand']) }}">Rượu vang New Zealand</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-argentina']) }}">Rượu vang Argentina</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-bo-dao-nha']) }}">Rượu vang Bồ Đào Nha</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-duc']) }}">Rượu vang Đức</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-nam-phi']) }}">Rượu vang Nam Phi</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">Theo giống nho</li>
                                        <li><a href="{{ route('products.category', ['slug' => 'cabernet-sauvignon']) }}">Cabernet Sauvignon</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'merlot']) }}">Merlot</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'syrah-shiraz']) }}">Syrah (Shiraz)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'pinot-noir']) }}">Pinot Noir</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'malbec']) }}">Malbec</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'montepulciano-d-abruzzo']) }}">Montepulciano D'Abruzzo</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'negroamaro']) }}">Negroamaro</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'primitivo']) }}">Primitivo</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'chardonnay']) }}">Chardonnay</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'sauvignon-blanc']) }}">Sauvignon Blanc</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'riesling']) }}">Riesling</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'tim-giong-nho']) }}" style="padding-left: 5px" class="link-p">Tìm giống nho</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">Theo vùng nổi tiếng</li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-bordeaux']) }}">Rượu vang Bordeaux (Pháp)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-burgundy']) }}">Rượu vang Bourgogne (Pháp)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-tuscany']) }}">Rượu vang Tuscany (Ý)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-puglia']) }}">Rượu vang Puglia (Ý)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-piedmont']) }}">Rượu vang Piedmont (Ý)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-vang-california']) }}">Rượu vang California (Mỹ)</a></li>
                                        <li><a href="{{ route('products.category', ['slug' => 'ruou-champagne']) }}">Rượu Champagne (Pháp)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{ route('products.category', ['slug' => 'ruou-manh']) }}">Rượu Mạnh</a></li>
                    <li>
                        <a href="#">Pha Lê Riedel <span uk-icon="icon: triangle-down"></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-vang-do']) }}">Ly Vang Đỏ</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-vang-trang']) }}">Ly Vang Trắng</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-champagne']) }}">Ly Champagne</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-ruou-manh']) }}">Ly Rượu Mạnh</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-chan-mau']) }}">Ly Chân Màu</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'ly-cocktail']) }}">Ly Cocktail</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'coc-nuoc']) }}">Cốc nước</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'binh-decanter']) }}">Bình Decanter</a></li>--}}
{{--                                <li><a href="{{ route('product.show', ['slug' => 'phu-kien-ruou']) }}">Phụ kiện rượu</a></li>--}}
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('brands.index') }}">Nhà sản xuất</a></li>
                    <li><a href="" class="uk-icon"><span uk-icon="icon: gift"></span> QUÀ TẶNG</a></li>
                    <li><a href="" class="uk-icon"><span uk-icon="icon: tag"></span> Khuyến mại</a></li>
                    <li><a href="{{ route('post') }}">Kiến thức</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
                <div class="uk-navbar-item">
                    <a href="#modal-full" class="text-white"  uk-search-icon uk-toggle></a>
                </div>
                <div class="uk-navbar-item">
                    <a href="{{ route('cart.index') }}" title="Giỏ hàng"><span uk-icon="icon: cart"></span></a>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Search Modal -->
<div id="modal-full" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <form class="uk-search uk-search-large">
            <input class="uk-search-input uk-text-center" type="search" placeholder="Search..." autofocus>
        </form>
    </div>
</div>