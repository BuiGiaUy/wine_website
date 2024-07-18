@extends('content.layouts.app')

@section('title', '')

@section('style')
    <style>
        #stack-list-view > * {
            margin-left: 1rem;
        }

        #main, #wrapper {
            background-color: #fff;
            position: relative;
        }

        #shop-sidebar .uk-nav > li:hover {
            background-color: #f0f0f0; /* Màu nền khi hover */
        }

        #shop-sidebar .uk-nav {
            margin-top: 10px;
        }

        #shop-sidebar .uk-nav > li {
            padding: 8px 0; /* Padding cho các mục */
        }

        #shop-sidebar .uk-nav > li > a {
            color: #333; /* Màu chữ */
            text-decoration: none; /* Bỏ gạch chân */
        }

        #shop-sidebar .uk-nav > li > a:hover {
            color: #007bff; /* Màu chữ khi hover */
        }

        .uk-input {
            border: 1px solid #b4975a !important;
            border-radius: 5px;
            height: 3.0084em !important;
        }

        .uk-input:focus {
            border: 1px solid #990d23;
            box-shadow: 0 0 4px rgba(255, 0, 0, 0.5); /* Red shadow */
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

        .uk-parent {
            border-bottom: 1px solid #cccccc;
        }

        .uk-nav-sub a:before {
            content: "";
            display: inline-block;
            border-radius: 3px;
            width: 14px;
            height: 14px;
            border: 1px solid #D5D5D5;
            background: #fff;
            vertical-align: middle;
            margin-right: 8px;
            position: relative; /* Adjusted to avoid interference with other positioning */
            /* Adjust for vertical alignment as needed */
        }

        .uk-nav-sub > li > a > span {
            margin-left: auto;

        }

        .uk-nav-sub > li > a:hover {
            color: rgba(96, 0, 0, 0.54) !important;
        }

        .uk-nav-sub a:hover:before {
            content: "✔"; /* Unicode character for check mark */
            color: #FFFFFF; /* Color of the check mark */
            display: inline-block;
            text-align: center;
            line-height: 14px;
            font-size: 12px; /* Adjust the size as needed */
            background: #907948;
        }

        .custom-add-to-cart-button {
            background: #990d23;
            color: #FFFFFF;
            transition: background-color 0.3s ease, color 0.3s ease; /* smooth transition */
        }

        .custom-add-to-cart-button:hover {
            background: #990d23;

            box-shadow: inset 0 0 0 100px rgba(0, 0, 0, .2);
            color: #fff;
            opacity: 1;
            outline: none;
        }

        .uk-iconlist li a:hover {
            text-decoration: none; /* Loại bỏ dấu gạch chân khi hover */
            color: blue;
        }

        .uk-iconlist li a {
            color: #990d23; /* Thay đổi màu chữ khi hover */
        }

        .uk-iconlist li i {
            color: #990d23; /* Thay đổi màu chữ khi hover */
            width: 16px;
        }

        .btn-wine:hover {
            text-decoration: none; /* Loại bỏ dấu gạch chân khi hover */
            color: blue;
        }

        .btn-wine {
            color: #990d23; /* Thay đổi màu chữ khi hover */
            font-weight: 500;
        }

        .uk-pagination > li > a,
        .uk-pagination > li > span {
            line-height: 1.8em;
            font-weight: 500;
            border-radius: 4px;
            border: 1px solid currentColor;
            margin: 0 0.25em;
            text-decoration: none;
            display: inline-block;
        }

        .uk-pagination > li.uk-active > span {
            background-color: #990d23;
            color: #fff;
        }

        .uk-pagination > li > a:hover {
            background-color: #990d23;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="uk-section uk-padding-remove">
            <div class="uk-position-relative uk-light">
                <img src="https://winecellar.vn/wp-content/uploads/2022/11/hinh-anh-nha-san-xuat-ruou-vang.jpeg"
                     alt="Rượu Vang" uk-cover>
                <div class="uk-overlay-primary uk-position-cover"></div>
                <div class="uk-position-left uk-width-1-1 uk-flex uk-flex-between uk-container">
                    <div class="uk-width-1-3 uk-padding-small">
                        <nav class="uk-breadcrumb uk-margin-small-bottom">
                            <ul class="uk-breadcrumb">
                                <li><a href="https://winecellar.vn">Trang chủ</a></li>
                                <li><span>Rượu Vang</span></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="uk-width-1-3 uk-text-center uk-padding-large uk-margin-large">
                        <h1 class="uk-text-large">Rượu Vang</h1>
                        <p class="uk-text-default">
                            Trải nghiệm hương vị tuyệt vời với đa dạng dòng vang, từ vang giá tốt uống hàng ngày đến
                            rượu vang cao cấp được cả thế giới ngưỡng mộ. Mỗi chai vang đều được lựa chọn tỉ mỉ, từ
                            những nhà sản xuất danh tiếng hàng đầu.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <main id="main" class="">
            <div class="uk-grid " uk-grid>
                <div id="shop-sidebar" class="uk-width-1-4@m uk-box-shadow-medium">
                    <div class="uk-padding-small">
                        <ul class="uk-nav uk-nav-default" uk-nav>
                            <div id="woocommerce_product_search-2" class="">
                                <h3 class="uk-text-large uk-text-bold">Tìm kiếm rượu</h3>
                                <form role="search" method="get" class="uk-width-1-1 uk-search uk-search-default"
                                      action="https://winecellar.vn/">
                                    <div class="uk-position-relative">
                                        <input type="search" id="woocommerce-product-search-field-2" class="uk-input"
                                               placeholder="Hãy thử 'vang cá chép' xem sao!" value="" name="s">
                                        <button type="submit"
                                                class="uk-text-bold uk-button checkout-button uk-position-center-right"
                                                uk-icon="icon: search"
                                                style="display: inline-block;height: 100%; min-width: 2.5em; padding-left: .6em; padding-right: .6em; background-color: #b4975a; color: white;"></button>
                                    </div>
                                </form>
                            </div>

                            <li class="uk-parent ">
                                <a class="uk-text-large uk-flex uk-flex-between" href="#">Quốc gia <span class=""
                                                                                                         uk-nav-parent-icon></span></a>
                                <ul class="uk-nav-sub">
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-phap">Vang Pháp
                                            <span class="uk-badge">(1054)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-y-italy">Vang Ý
                                            (Italy) <span class="uk-badge">(318)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-tay-ban-nha">Vang
                                            Tây Ban Nha <span class="uk-badge">(58)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-my">Vang Mỹ <span
                                                class="uk-badge">(43)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-uc">Vang Úc <span
                                                class="uk-badge">(34)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-new-zealand">Vang
                                            New Zealand <span class="uk-badge">(32)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-argentina">Vang
                                            Argentina <span class="uk-badge">(26)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-chile">Vang Chile
                                            <span class="uk-badge">(24)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-duc">Vang Đức
                                            <span class="uk-badge">(14)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-bo-dao-nha">Vang
                                            Bồ Đào Nha <span class="uk-badge">(9)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-nam-phi">Vang Nam
                                            Phi <span class="uk-badge">(5)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-hungary">Vang
                                            Hungary <span class="uk-badge">(3)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_quoc-gia=vang-canada">Vang
                                            Canada <span class="uk-badge">(2)</span></a></li>
                                </ul>
                            </li>

                            <li class="uk-parent">
                                <a href="#" class="uk-text-large uk-flex uk-flex-between">Loại vang <span
                                        uk-nav-parent-icon></span></a>
                                <ul class="uk-nav-sub">
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-vang-do">Rượu
                                            Vang Đỏ <span class="uk-badge">(1110)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-vang-trang">Rượu
                                            Vang Trắng <span class="uk-badge">(380)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-vang-sui">Rượu
                                            Vang Sủi <span class="uk-badge">(73)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-champagne">Rượu
                                            Champagne <span class="uk-badge">(59)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-vang-hong">Rượu
                                            Vang Hồng <span class="uk-badge">(31)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=ruou-vang-ngot">Rượu
                                            Vang Ngọt <span class="uk-badge">(19)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_loai-vang=vang-cuong-hoa">Vang
                                            Cường Hóa <span class="uk-badge">(4)</span></a></li>
                                </ul>
                            </li>

                            <li class="uk-parent">
                                <a href="#" class="uk-text-large uk-flex uk-flex-between">Dung tích <span
                                        uk-nav-parent-icon></span></a>
                                <ul class="uk-nav-sub">
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=750ml">750ml <span
                                                class="uk-badge">(1495)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=3000ml">3L <span
                                                class="uk-badge">(45)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=1500ml">1.5L <span
                                                class="uk-badge">(39)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=6000ml">6L <span
                                                class="uk-badge">(10)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=500ml">500ml <span
                                                class="uk-badge">(3)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=5000ml">5L <span
                                                class="uk-badge">(8)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=375ml">375ml <span
                                                class="uk-badge">(4)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=9000ml">9L <span
                                                class="uk-badge">(5)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=15000ml">15L <span
                                                class="uk-badge">(2)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/ruou-vang/?filter_dung-tich=200ml">200ml <span
                                                class="uk-badge">(2)</span></a></li>
                                </ul>
                            </li>

                            <li class="uk-parent ">
                                <a class="uk-text-large uk-flex uk-flex-between" href="#">Giống nho <span class=""
                                                                                                          uk-nav-parent-icon></span></a>
                                <ul class="uk-nav-sub">
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=blend">Blend
                                            <span class="uk-badge">(2)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=sauvignon-blanc">Sauvignon
                                            Blanc <span class="uk-badge">(1)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=riesling">Riesling
                                            <span class="uk-badge">(1)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=pinot-gris">Pinot
                                            Gris (Pinot Grigio) <span class="uk-badge">(1)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=semillon">Semillon
                                            <span class="uk-badge">(1)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=gewurztraminer">Gewürztraminer
                                            <span class="uk-badge">(1)</span></a></li>
                                    <li><a rel="nofollow"
                                           href="https://winecellar.vn/tu-khoa/muscat-blanc/?filter_giong-nho=moscato">Moscato
                                            <span class="uk-badge">(1)</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="uk-width-3-4@m uk-padding-small uk-padding-remove-top uk-padding-remove-bottom ">
                    <div class="">
                        <div class="uk-flex uk-flex-between " style="border-bottom: 1px solid #cccccc;">
                            <div class="uk-hidden@m btn-mobile-filter">
                                <a href="#" uk-toggle="target: #shop-sidebar"
                                   class="uk-button uk-button-default filter-button uk-text-uppercase">
                                    <span uk-icon="icon: settings"></span>
                                    <strong>Lọc sản phẩm</strong>
                                </a>
                            </div>
                            <div class=" uk-margin-small uk-margin-remove-bottom">
                                <p class="uk-text-meta">
                                    Hiển thị 1–24 của 1622 kết quả
                                </p>
                            </div>
                            <div class="catalog-order uk-flex uk-flex-middle">
                                <div id="stack-list-filter" class="uk-flex uk-flex-middle uk-margin-small-left">
                                    <div id="stack-list-view" class="uk-child-width-auto uk-grid-small uk-flex-between">
                                        <a href="https://winecellar.vn/ruou-vang" class="plain uk-icon-link"
                                           uk-icon="thumbnails"></a>
                                        <a href="https://winecellar.vn/ruou-vang?mode=list" class="plain uk-icon-link"
                                           uk-icon="list"></a>
                                    </div>

                                    <form class="woocommerce-ordering uk-margin-small-left" method="get">
                                        <select name="orderby" class="uk-select" aria-label="Đơn hàng của cửa hàng">
                                            <option value="menu_order" selected="selected">Thứ tự mặc định</option>
                                            <option value="popularity">Thứ tự theo mức độ phổ biến</option>
                                            <option value="date">Mới nhất</option>
                                            <option value="price">Thứ tự theo giá: thấp đến cao</option>
                                            <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
                                            <option value="on_sale">Khuyến mại</option>
                                        </select>
                                        <input type="hidden" name="paged" value="1">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="uk-border-" style="border-bottom: 1px solid #cccccc;">
                            <div class="range-price uk-flex uk-flex-middle">
                                <div class="range-price__label">Phân khúc:</div>
                                <div class="range-price__links uk-flex">
                                    <a href="?max_price=500000" class="uk-button uk-button-small"><span
                                            style="color: #990d23;">Dưới 500K</span></a>
                                    <span class="sp-line">|</span>
                                    <a href="?min_price=500000&amp;max_price=1000000" class="uk-button uk-button-small"><span
                                            style="color: #990d23;">500K - 1 triệu</span></a>
                                    <span class="sp-line">|</span>
                                    <a href="?min_price=1000000&amp;max_price=3000000"
                                       class="uk-button  uk-button-small"><span
                                            style="color: #990d23;">1 - 3 triệu</span></a>
                                    <span class="sp-line">|</span>
                                    <a href="?min_price=3000000" class="uk-button  uk-button-small"><span
                                            style="color: #990d23;">Trên 3 triệu</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="uk-grid uk-child-width-1-3@s uk-margin-small" uk-grid>
                            @foreach ($products as $product)
                                <div
                                    class="uk-card uk-card-default uk-grid-collapse uk-padding-small uk-child-width-1-2@s uk-margin"
                                    uk-grid>
                                    <div class="uk-card-media-left uk-cover-container uk-width-1-2@s">
                                        @if ($product->featuredImage)
                                            <img style="height: 100%" src="{{ $product->featuredImage }}"
                                                 alt="{{ $product->name }}" uk-cover>
                                        @else
                                            <img style="height: 100%"
                                                 src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-300x400.jpg"
                                                 alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)"
                                                 uk-cover>
                                        @endif
                                    </div>
                                    <div class="uk-card-body uk-padding-small uk-flex uk-flex-column uk-flex-between">
                                        <ul class="uk-list uk-list-divider uk-iconlist">
                                            <li><i class="fas fa-wine-glass"></i> <a href=""
                                                                                     rel="tag">{{ $product->category->name }}</a>
                                            </li>
                                            <li><i class="fas fa-wine-bottle"></i> <a href=""
                                                                                      rel="tag">{{ $product->brand->name }}</a>
                                            </li>
                                            <li><i class="fas fa-industry"></i> <a href=""
                                                                                   rel="tag">{{ $product->post->name }}</a>
                                            </li>
                                            <li><i class="fas fa-globe-europe"></i> {{ $product->origin }}</li>
                                            <li><i class="fas fa-percentage"></i> {{ $product->discount_percent }}% ABV*
                                            </li>
                                            <li><i class="fas fa-wine-bottle"></i> 750ml</li>
                                            {{--                                            <li><i class="fas fa-wine-glass"></i> <a href="{{ route('category.show', $product->category->slug) }}" rel="tag">{{ $product->category->name }}</a></li>--}}
                                            {{--                                            <li><i class="fas fa-wine-bottle"></i> <a href="{{ route('brand.show', $product->brand->slug) }}" rel="tag">{{ $product->brand->name }}</a></li>--}}
                                            {{--                                            <li><i class="fas fa-industry"></i> <a href="{{ route('post.show', $product->post->slug) }}" rel="tag">{{ $product->post->title }}</a></li>--}}
                                            {{--                                            <li><i class="fas fa-globe-europe"></i> {{ $product->origin }}</li>--}}
                                            {{--                                            <li><i class="fas fa-percentage"></i> {{ $product->discount_percent }}% ABV*</li>--}}
                                            {{--                                            <li><i class="fas fa-wine-bottle"></i> 750ml</li>--}}
                                        </ul>
                                    </div>
                                    <div class="uk-width-1-1@s">
                                        <h3 class="uk-text-default" style="color: #990d23">{{ $product->name }}</h3>
                                        <p class="uk-text-small">{{ $product->description }}</p>
                                        <div class="uk-flex uk-flex-between uk-margin-top">
                                            <div class="wcl-price w-50 uk-text-center uk-margin">
                                                <span class="price uk-text-bold" style="color: #990d23">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>{{ number_format($product->price) }}&nbsp;
                                                            <span class="woocommerce-Price-currencySymbol">₫</span>
                                                        </bdi>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="wcl-button w-50 uk-text-right">
                                                <a class="uk-margin-small uk-button uk-button-primary uk-border-rounded custom-add-to-cart-button"
                                                   href="">Mua ngay</a>
                                                {{--                                                <a class="uk-margin-small uk-button uk-button-primary uk-border-rounded custom-add-to-cart-button" href="{{ route('product.show', $product->slug) }}">Mua ngay</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Repeat for other products -->
                        </div>

                        <div class="uk-flex uk-flex-center uk-margin">
                            <nav aria-label="Pagination">
                                <ul class="uk-pagination" uk-margin>
                                    <li><a href="#"><span uk-pagination-previous></span></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="uk-disabled"><span>…</span></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">6</a></li>
                                    <li class="uk-active"><span aria-current="page">7</span></li>
                                    <li><a href="#">8</a></li>
                                    <li><a href="#">9</a></li>
                                    <li><a href="#">10</a></li>
                                    <li class="uk-disabled"><span>…</span></li>
                                    <li><a href="#">20</a></li>
                                    <li><a href="#"><span uk-pagination-next></span></a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="uk-container uk-width-1-1 uk-padding">
                            <hr class="uk-divider-small">

                            <h1 class="uk-text-bold uk-text-large"><a href="https://winecellar.vn/ruou-vang/"
                                                                      class=" btn-wine">Rượu Vang </a> - Bộ Sưu Tập Vang
                                Nhập Khẩu Chính Hãng</h1>

                            <p class="uk-text-emphasis"><strong>Rượu vang</strong> là thức uống có cồn, được làm bằng
                                cách lên men nước ép nho. Mỗi dòng vang lại có một đặc điểm hương vị khác nhau, đem lại
                                trải nghiệm thưởng thức tuyệt vời trên bàn tiệc. Hãy cùng <a
                                    href="https://winecellar.vn/" class="btn-wine">WINECELLAR.vn</a> khám phá rượu vang
                                - thức uống đẳng cấp không thể thiếu trên bàn tiệc.</p>

                            <h2 class="uk-text-bold uk-text-large">Bảng Giá Rượu Vang 07/2024</h2>

                            <div class="uk-overflow-auto">
                                <table class="uk-table uk-table-divider uk-table-hover uk-table-justify">
                                    <thead>
                                    <tr>
                                        <th class="uk-width-1-2">Loại Rượu Vang</th>
                                        <th class="uk-width-1-2">Giá Chỉ Từ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Giá rượu vang đỏ</td>
                                        <td>Từ 250.000 đồng/chai</td>
                                    </tr>
                                    <tr>
                                        <td>Giá rượu vang trắng</td>
                                        <td>Từ 220.000 đồng/chai</td>
                                    </tr>
                                    <tr>
                                        <td>Giá rượu vang hồng</td>
                                        <td>Từ 230.000 đồng/chai</td>
                                    </tr>
                                    <tr>
                                        <td>Giá rượu vang sủi</td>
                                        <td>Từ 260.000 đồng/chai</td>
                                    </tr>
                                    <tr>
                                        <td>Giá rượu vang ngọt</td>
                                        <td>Từ 260.000 đồng/chai</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h2 class="uk-text-bold uk-text-large">Khám Phá Rượu Vang</h2>

                            <p class="text-justify uk-text-emphasis	">Quá trình ủ rượu tự nhiên cho phép nước nho lên
                                men không cần thêm các loại đường, axit, enzym, nước hoặc chất dinh dưỡng khác. Men tiêu
                                thụ đường trong nho và chuyển đổi chúng thành rượu và carbon dioxide. Cũng như các mặt
                                hàng thời trang, điện tử cao cấp khác trên thế giới, <strong>rượu vang</strong> cũng là
                                một sản phẩm cao cấp và độc đáo, mang trong mình một nền văn hóa tuyệt vời và bất hủ
                                cùng với thời gian. Thức uống này được tạo ra từ những đôi bàn tay bậc thầy trong ngành
                                sản xuất rượu vang, đặc biệt, một số dòng <a
                                    href="https://winecellar.vn/ruou-vang-cao-cap" class="uk-link btn-wine"><strong>rượu
                                        vang cao cấp</strong></a> còn có sản lượng rất ít, quý hiếm và khó tìm mua được.
                                Có thể lấy ví dụ các dòng vang đỏ được làm từ giống <a
                                    href="https://winecellar.vn/cabernet-sauvignon/" class="uk-link btn-wine"><strong>Cabernet
                                        Sauvignon</strong></a> của Napa Valley hoặc <a
                                    href="https://winecellar.vn/ruou-vang-do/" class="uk-link btn-wine"><strong>rượu
                                        vang đỏ</strong></a> được làm từ giống nho <a
                                    href="https://winecellar.vn/pinot-noir/" class="uk-link btn-wine"><strong>Pinot
                                        Noir</strong></a> của vùng Bourgogne được giới sành vang đánh giá là những chai
                                vang có chất lượng cao cấp nhất thế giới.</p>

                            <figure id="attachment_27705" aria-describedby="caption-attachment-27705"
                                    class="uk-align-center uk-width-1-1">
                                <img class="uk-responsive-width wp-image-27705"
                                     src="https://winecellar.vn/wp-content/uploads/2022/08/hop-qua-tang-ruou-vang-f-gold-limited-edition-1067x800.jpg"
                                     alt="" width="1020" height="765" style="width: 100%;">
                                <figcaption id="caption-attachment-27705" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Rượu Vang Đỏ F Negroamaro Gold
                                </figcaption>
                            </figure>

                            <h2 class="uk-text-bold uk-text-large">Các Giống Nho Sản Xuất Rượu Vang</h2>

                            <p class="uk-text-justify">Có 2 giống nho được sử dụng để sản xuất <strong>rượu
                                    vang</strong> là nho đỏ và nho trắng. Hiện nay, trên thế giới có hơn 1300 giống nho
                                được sử dụng để sản xuất rượu vang, nhưng chỉ có 100 giống nho phổ biến nhất, chiếm 75%
                                diện tích vườn nho trên toàn thế giới.</p>

                            <p class="uk-text-justify">Có thể kể đến các giống nho đỏ như Cabernet Sauvignon, Cabernet
                                Franc, <a href="https://winecellar.vn/merlot/" class="btn-wine"><strong>Merlot</strong></a>,
                                <a href="https://winecellar.vn/syrah-shiraz/"
                                   class="btn-wine"><strong>Syrah/Shiraz</strong></a>, <a
                                    href="https://winecellar.vn/pinot-noir/" class="btn-wine"><strong>Pinot
                                        Noir</strong></a>, Malbec, Carmenère, <a
                                    href="https://winecellar.vn/montepulciano-d-abruzzo/" class="btn-wine"><strong>Montepulciano
                                        D'Abruzzo</strong></a>,...</p>

                            <figure id="attachment_26284" aria-describedby="caption-attachment-26284"
                                    class="uk-align-center uk-width-1-1">
                                <img class="uk-width-1-1"
                                     src="https://winecellar.vn/wp-content/uploads/2022/06/nhung-giong-nho-pho-bien-nhat-de-san-xuat-ruou-vang-do-cabernet-sauvignon-1067x800.jpg"
                                     alt="Những giống nho phổ biến nhất để sản xuất rượu vang đỏ - Cabernet Sauvignon"
                                     width="1020" height="765">
                                <figcaption id="caption-attachment-26284" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Giống Nho Cabernet Sauvignon Được Dùng Để Sản Xuất Các Dòng Rượu Vang Đỏ Đậm Đà
                                </figcaption>
                            </figure>

                            <p style="text-align: justify;">
                                Và các giống nho trắng như Chardonnay, Sauvignon Blanc, Riesling, Gewurztraminer,
                                Viognier, Sémillon, Pinot Grigio, Chenin Blanc…
                            </p>

                            <figure id="attachment_25310" aria-describedby="caption-attachment-25310"
                                    style="width: 1020px" class="wp-caption aligncenter">
                                <img class="wp-image-25310 size-large"
                                     src="https://winecellar.vn/wp-content/uploads/2019/03/champagne-charles-heidsieck-blanc-de-blancs-1-1067x800.png"
                                     alt="giống nho Chardonnay" width="1020" height="765">
                                <figcaption id="caption-attachment-25310" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Giống Nho Trắng Chardonnay
                                </figcaption>
                            </figure>

                            <p style="text-align: justify;">Mỗi giống nho có một đặc điểm hương vị khác biệt. Tuỳ vào
                                thổ nhưỡng, khí hậu và phong cách làm vang của từng nhà sản xuất mà một giống nho có thể
                                cho ra nhiều kiểu hương vị khác nhau.</p>

                            <h2 class="uk-text-bold uk-text-large">Thuật Ngữ “Vintage” Của Rượu Vang</h2>

                            <p style="text-align: justify;">“Vintage” nghĩa là niên vụ, là năm mà nho được hái để sản
                                xuất <strong>rượu vang</strong>. Nho làm rượu vang mất một niên vụ để đạt được độ chín
                                hoàn hảo, và do đó, <strong>rượu vang</strong> chỉ được sản xuất mỗi năm một lần. Vint
                                là viết tắt của “Winemaking” và Age chỉ năm nó được sản xuất. Khi bạn nhìn thấy con số
                                chỉ năm được ghi trên nhãn thì đó chính là năm giống nho dùng sản xuất chai vang đỏ được
                                hái và làm rượu. Mùa thu hoạch ở bán cầu bắc (Châu Âu, Hoa Kỳ) thường diễn ra từ tháng 8
                                đến tháng 9, và mùa thu hoạch ở bán cầu nam (Argentina, Úc) là từ tháng 2 đến tháng 4.
                            </p>

                            <figure id="attachment_27625" aria-describedby="caption-attachment-27625"
                                    style="width: 1020px" class="wp-caption aligncenter">
                                <img class="size-large wp-image-27625"
                                     src="https://winecellar.vn/wp-content/uploads/2022/08/ruou-champagne-vintage-va-non-vintage-1067x800.jpg"
                                     alt="" width="1020" height="765">
                                <figcaption id="caption-attachment-27625" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Rượu Champagne Vintage Và Non-vintage
                                </figcaption>
                            </figure>

                            <p style="text-align: justify;">Đôi khi bạn sẽ bắt gặp một số dòng rượu vang “non-vintage"".
                                Đây thường là những dòng vang có sự pha trộn nhiều niên vụ khác nhau và thuật ngữ
                                “non-vintage"" được thấy nhiều nhất trên các nhãn rượu Champagne.</p>

                            <h2 class="uk-text-bold uk-text-large">Hương Vị Của Rượu Vang</h2>

                            <p style="text-align: justify;">Một số yếu tố được dùng để miêu tả hương vị độc đáo của
                                <strong>rượu vang</strong>, bao gồm: độ chua, vị ngọt, độ cồn, vị chát và hương thơm.
                            </p>

                            <ul style="list-style-type: square; text-align: justify;">
                                <li>Độ chua tức là nói về tính axit trong rượu vang. Một số dòng vang có độ chua cân
                                    bằng, mang lại trải nghiệm thưởng thức tuyệt vời.
                                </li>
                                <li>Độ ngọt: Tùy thuộc vào loại vang bạn uống mà độ ngọt có sự chênh lệch khác nhau.
                                    Thuật ngữ “dry” được dùng để chỉ một chai rượu vang không có vị ngọt.
                                </li>
                                <li>Độ cồn: Độ cồn trung bình của rượu vang là khoảng 10% ABV - 15% ABV. Tuy nhiên, có
                                    một số dòng vang có độ cồn khác biệt như: Moscato d'Asti chỉ 5,5% ABV.
                                </li>
                                <li>Vị chát hay còn được biết đến là “tannin” thường được tìm thấy trong rượu vang đỏ,
                                    đem lại trải nghiệm tuyệt vời bao phủ vòm miệng.
                                </li>
                                <li>Hương thơm: Rượu vang hấp dẫn thực khách bằng hương thơm đa dạng. Tuỳ vào giống nho
                                    và cách thức sản xuất mà mỗi dòng vang lại có đặc trưng hương thơm riêng, bao gồm
                                    hương trái cây, hương hoa, gia vị…
                                </li>
                            </ul>

                            <figure id="attachment_28020" aria-describedby="caption-attachment-28020"
                                    style="width: 1020px" class="wp-caption aligncenter">
                                <img class="size-large wp-image-28020"
                                     src="https://winecellar.vn/wp-content/uploads/2022/09/huong-vi-ruou-vang-do-closerie-saint-roc-2016-1067x800.jpg"
                                     alt="" width="1020" height="765">
                                <figcaption id="caption-attachment-28020" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Hương Vị Rượu Vang Pháp Closerie Saint Roc 2016
                                </figcaption>
                            </figure>

                            <h2 class="uk-text-bold uk-text-large">Cách Thưởng Thức Rượu Vang</h2>

                            <p style="text-align: justify;">Mỗi người có một cách thưởng thức riêng tùy vào sở thích cá
                                nhân. Tuy nhiên, chúng tôi muốn giới thiệu đến bạn cách thưởng thức <strong>rượu
                                    vang</strong> đúng điệu nhất để cảm nhận được trọn vẹn tinh tuý của thức uống này.
                            </p>

                            <ul style="list-style-type: square; text-align: justify;">
                                <li style="text-align: justify;">Bước 1: Quan sát (Rót rượu khoảng ⅓ ly, giữ ly ở một
                                    góc 45 độ và quan sát màu sắc của rượu. Điều này sẽ giúp bạn hiểu thêm về phong cách
                                    và đặc điểm của rượu. Nếu nó là <strong><a
                                            href="https://winecellar.vn/ruou-vang-do/" class="btn-wine">rượu vang đỏ</a></strong>,
                                    đó là màu đỏ đậm hay màu đỏ tươi? Nếu là <a
                                        href="https://winecellar.vn/ruou-vang-trang/" class="btn-wine"><strong>rượu vang
                                            trắng</strong></a>, nó là sắc vàng nhạt hay đậm? Màu sắc cũng có thể phản
                                    ánh tuổi của rượu nên đừng bỏ qua bước quan sát để biết thêm nhiều về dòng vang mình
                                    thưởng thức).
                                </li>
                                <li style="text-align: justify;">Bước 2: Lắc (Cầm <strong><a
                                            href="https://winecellar.vn/ly-pha-le-riedel/" class="btn-wine">ly rượu
                                            vang</a></strong> một cách chắc chắn và lắc nhẹ cho rượu sóng sánh trong ly.
                                    Việc làm này giúp rượu bộc lộ hương thơm một cách tối ưu nhất).
                                </li>
                                <li style="text-align: justify;">Bước 3: Ngửi (Hãy ghé mũi vào miệng ly và cảm nhận hết
                                    hương thơm đặc trưng của <strong><a href="https://winecellar.vn/ruou-vang/"
                                                                        class="btn-wine">rượu vang</a></strong>. Đây là
                                    bước cực kỳ quan trọng để có trải nghiệm thưởng thức vang trọn vẹn nhất. Có nhiều
                                    dòng vang hương thơm phức hợp với nhiều tầng lớp trái cây, hoa cả, gia vị… Với những
                                    tín đồ sành sỏi, việc ngửi hương thơm rượu vang giúp họ hiểu được hầu hết về dòng
                                    vang đó).
                                </li>
                                <li style="text-align: justify;">Bước 4: Nếm (Thưởng thức hương vị. Hãy uống một ngụm
                                    vang, hít thở nhẹ nhàng và từ từ cảm nhận hương thơm trên mũi, hương vị trên vòm
                                    miệng, vị chua, vị chát và hậu vị).
                                </li>
                                <li style="text-align: justify;">Bước 5: Cảm nhận hương vị <strong><a
                                            href="https://winecellar.vn/ruou-vang-cau-ca/" class="btn-wine">rượu
                                            vang</a></strong> (Sau khi uống, hãy từ từ cảm nhận dư vị rượu vang trong cổ
                                    họng, đưa ra những kết luận về hương vị của rượu).
                                </li>
                            </ul>


                            <p style="text-align: justify;">
                                <img class="size-large wp-image-25945 aligncenter"
                                     src="https://winecellar.vn/wp-content/uploads/2022/05/aro-muga-2-1067x800.jpg"
                                     alt="Rượu vang Tây Ban Nha Aro Muga 2" width="1020" height="765">
                            </p>

                            <h2 class="uk-text-bold uk-text-large">Chỉ Rượu Vang Cao Cấp Mới Chất Lượng?</h2>

                            <p style="text-align: justify;">Nhu cầu dành cho <strong>rượu vang</strong> ngày một tăng
                                mạnh và điều này đã tác động lớn đến chiến lược sản xuất của nhiều nhà làm vang lớn nhỏ
                                trên thế giới. Thậm chí các điền trang <strong>Grand Cru Classé</strong> danh giá của
                                vùng Bordeaux hay các tượng đài vang Ý như Frescobaldi, Marchesi Antinori hay Robert
                                Mondavi của rượu vang Mỹ cũng đã cho ra đời đa dạng các dòng vang từ <a
                                    href="https://winecellar.vn/ruou-vang/" class="btn-wine"><strong>rượu vang cao
                                        cấp</strong></a> đến <a href="https://winecellar.vn/ruou-vang/"
                                                                class="btn-wine"><strong>rượu vang ngon giá rẻ</strong></a>
                                để thưởng thức hàng ngày. Vì vậy, không thể khẳng định chỉ rượu vang cao cấp, đắt đỏ mới
                                là <a href="https://winecellar.vn/ruou-vang/" class="btn-wine"><strong>rượu vang
                                        ngon</strong></a>. Người yêu rượu có thể tìm được những chai vang ngon, giá trị
                                ở mức giá hợp lý đến bất ngờ.</p>

                            <figure id="attachment_28328" aria-describedby="caption-attachment-28328"
                                    style="width: 1020px" class="wp-caption aligncenter">
                                <img class="size-large wp-image-28328"
                                     src="https://winecellar.vn/wp-content/uploads/2022/10/ruou-vang-my-treana-red-1067x800.jpg"
                                     alt="" width="1020" height="765">
                                <figcaption id="caption-attachment-28328" class="uk-text-center uk-margin-remove"
                                            style="background: rgba(0, 0, 0, .05); font-size: .9em; font-style: italic; padding: .4em;">
                                    Rượu Vang Mỹ Cao Cấp Treana Red
                                </figcaption>
                            </figure>

                            <h2 class="uk-text-bold uk-text-large">Địa Chỉ Mua Rượu Vang Nhập Khẩu Chính Hãng</h2>

                            <p style="text-align: justify;">Trên thị trường có nhiều địa chỉ bán <strong>rượu
                                    vang</strong> khác nhau nhưng khách hàng cần có sự tìm hiểu để lựa chọn được địa chỉ
                                uy tín phân phối <a href="https://winecellar.vn/ruou-vang/" class="btn-wine"><strong>rượu
                                        vang nhập khẩu</strong></a> uy tín, chất lượng tốt với giá thành hợp lý. Nếu bạn
                                đang tìm kiếm những dòng rượu vang ngon cho bữa tiệc sắp tới, hãy đến với <strong>WINECELLAR.vn</strong>.
                                Với hơn 2000 dòng <a href="https://winecellar.vn/ruou-vang/" class="btn-wine"><strong>rượu
                                        vang nhập khẩu</strong></a>, WINECELLAR.vn luôn sẵn sàng phục vụ tín đồ yêu vang
                                trên cả nước.</p>

                        </div>

                    </div>

                </div>

            </div>
        </main>
    </div>

@endsection
