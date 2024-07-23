@extends('content.layouts.app')
@section('title', '')
@section('style')
    <style>
        .custom-nav {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px; /* Adjust the size as needed */
            height: 45px; /* Adjust the size as needed */
            background-color: transparent;
            border: 1px solid #FFFFFF; /* Add a border to see the circle more clearly */
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .custom-nav svg {
            width: 40%; /* Adjust the size of the SVG as needed */
            height: auto; /* Maintain aspect ratio */
        }

        .custom-nav:hover {
            background-color: #990d23;
            color: white;
            border: none;
        }


        .banner-gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            padding: 50px 0;
            text-align: center;
        }

        .uk-slider-items img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .uk-slider-nav-wrapper {
            position: absolute;
            bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        @media (max-width: 767px) {
            .banner-gradient {
                padding: 30px 0;
            }

            .uk-slider-nav-wrapper {
                bottom: 10px;
            }
        }

        #section_1364875212 {
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: rgb(249, 245, 240);
        }

        .uk-section a {
            text-decoration: none;
        }

        .custom-card {
            background: #f5ecdb;
            border-radius: 5%; /* Rounded corners */
            overflow: hidden; /* Ensure content stays within rounded corners */
        }

        .custom-card a {
            display: block; /* Make the entire card clickable */
            text-decoration: none; /* Remove underline from link */
            color: inherit; /* Inherit text color */
        }


        .menu-services a {
            font-size: 20px !important;
            text-transform: uppercase;
            color: #fff;
            font-weight: 500 !important;
            margin: 10px 0; /* Adjust margin as needed */
            display: flex;
            align-items: center; /* Aligns text and icon vertically */
        }

        .menu-services a i.uk-icon {
            margin-right: 10px; /* Adjust icon spacing */
            display: inline-flex; /* Ensures icon is inline with text */
            justify-content: center; /* Centers icon horizontally */
            align-items: center; /* Centers icon vertically */
        }

        .menu-services ul.uk-nav-default {
            font-weight: 400;
            font-size: 13px;
            line-height: 20px;
        }

        .uk-height-1-4 {
            height: 25%; /* Adjust height percentage as needed */
        }

        .uk-flex-center {
            justify-content: center; /* Center align items horizontally */
        }


    </style>
@endsection

@section('content')
    <section class="uk-section uk-padding-remove">
        <div class=" uk-padding-remove uk-width-1-1	">
            <div uk-slider>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                    <ul class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-1@m">
                        <li>
                            <img src="https://winecellar.vn/wp-content/uploads/2022/04/banner-vang-trang-0.jpg"
                                 alt="Image 1">
                        </li>
                        <li>
                            <img src="https://winecellar.vn/wp-content/uploads/2022/04/banner-vang-trang-0.jpg"
                                 alt="Image 2">
                        </li>
                        <li>
                            <img src="https://winecellar.vn/wp-content/uploads/2022/04/banner-vang-trang-0.jpg"
                                 alt="Image 3">
                        </li>
                        <li>
                            <img src="https://winecellar.vn/wp-content/uploads/2022/04/banner-vang-trang-0.jpg"
                                 alt="Image 4">
                        </li>
                        <li>
                            <img src="https://winecellar.vn/wp-content/uploads/2022/04/banner-vang-trang-0.jpg"
                                 alt="Image 5">
                        </li>
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover custom-nav" href="#"
                       uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover custom-nav" href="#"
                       uk-slidenav-next uk-slider-item="next"></a>

                    <!-- Add the navigation dots inside the images -->
                    <div class="uk-slider-nav-wrapper">
                        <ul class="uk-slider-nav uk-dotnav"></ul>
                    </div>
                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center "></ul>

            </div>
        </div>
    </section>
    <section class="uk-section uk-section-small uk-light uk-padding-remove" id="section_1130581520">
        <div class="uk-background-cover uk-padding" style="background-color: #990d23;">
            <div class="">
                <div id="text-1504872352" class="uk-text-center uk-text-white">
                    <h1 class="uk-margin-remove uk-heading-small uk-text-uppercase uk-text-large	"><strong>Winecellar.vn
                            – We are master of wine</strong></h1>
                    <p class="uk-margin-remove uk-text-small	">Nơi trải nghiệm rượu vang trọn vẹn và thăng hoa</p>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section uk-section-default" id="section_1364875212">
        <div class="uk-padding-remove">
            <div class="uk-grid-collapse uk-child-width-1-4@m uk-child-width-1-2@s	" uk-grid>
                <div>
                    <div class="uk-card uk-card-hover uk-card-body uk-text-center ">
                        <div class="uk-card-media-top" style="width:20%; margin: 0 auto;">
                            <img src="https://winecellar.vn/wp-content/uploads/2022/03/champagne-1.png" width="80"
                                 height="80" alt="">
                        </div>
                        <div class="uk-padding-remove uk-card-body">
                            <h4><span style="color: #800000;">2000 sản phẩm</span></h4>
                            <p><span style="font-size: 80%;">Nhập khẩu &amp; phân phối chính hãng</span></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-hover uk-card-body uk-text-center">
                        <div class="uk-card-media-top" style="width:20%; margin: 0 auto;">
                            <img src="https://winecellar.vn/wp-content/uploads/2023/06/gh-toan-quoc.png" width="42"
                                 height="43" alt="">
                        </div>
                        <div class="uk-card-body uk-padding-remove">
                            <h4><span style="color: #800000;">Giao hàng toàn quốc</span></h4>
                            <p><span style="font-size: 80%;">Linh hoạt giao hàng theo yêu cầu từ Khách hàng</span></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-hover uk-card-body uk-text-center">
                        <div class="uk-card-media-top" style="width:20%; margin: 0 auto;">
                            <img src="https://winecellar.vn/wp-content/uploads/2022/03/delivery-1.png" width="80"
                                 height="80" alt="">
                        </div>
                        <div class="uk-card-body uk-padding-remove">
                            <h4><span style="color: #800000;">GIAO HÀNG NHANH (2H)</span></h4>
                            <p><span style="font-size: 80%;">Miễn phí giao hàng tại<br> Hà Nội, Đà Nẵng, Nha Trang, Hồ Chí Minh, Phú Quốc</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-hover uk-card-body uk-text-center">
                        <div class="uk-card-media-top" style="width:20%; margin: 0 auto;">
                            <img src="https://winecellar.vn/wp-content/uploads/2023/06/check-correct.png" width="48"
                                 height="48" alt="">
                        </div>
                        <div class="uk-card-body uk-padding-remove">
                            <h4><span style="color: #800000;">CAM KẾT CHẤT LƯỢNG</span></h4>
                            <p><span style="font-size: 80%;">Sản phẩm nhập nguyên chai, chính hãng,<br> từ thương hiệu uy tín.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section_1276758985" class="uk-section uk-padding">
        <div class="">
            <div class="uk-text-center uk-margin-medium-bottom">
                <h2 class="uk-text-large" style="color: #990d23">DANH MỤC SẢN PHẨM ĐA ĐẠNG & VÔ VÀN KHÁM PHÁ</h2>
            </div>
            <div class="uk-child-width-1-2@s uk-child-width-1-4@l uk-grid-medium uk-grid-match" uk-grid>
                @foreach($posts as $post)
                    <div class="">
                        <div class="uk-card uk-card-default uk-card-body uk-padding-remove custom-card"
                             style="background: #f5ecdb;">
                            <a href="">
                                {{--                                {{ route('post.show', ['slug' => $post->slug]) }}--}}
                                @if ($post->featuredImage)
                                    <img src="{{ asset($post->featuredImage->path) }}" alt="{{ $post->title }}"
                                         class="uk-width-1-1">
                                @else
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2024/05/ruou-vang-nhap-khau-home.jpg"
                                        alt="{{ $post->title }}" class="uk-width-1-1">
                                @endif
                                <h3 class="uk-card-title uk-text-default uk-text-center">{{ $post->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="uk-section uk-section-small" id="section_142852121" style="background-color: #f9f5f0;">
        <div class="uk-background-cover uk-background-norepeat">
            <div class=" uk-position-relative">
                <div class="uk-flex uk-flex-center">
                    <div class="uk-width-3-5@s uk-padding">
                        <div class="uk-text-center">
                            <h2 class="uk-heading-medium uk-text-bold uk-margin-remove-top uk-text-large"
                                style="color: #990d23;">Bạn tìm gì hôm nay?</h2>
                        </div>
                        <div class="uk-child-width-1-1 uk-child-width-1-4@m uk-grid-match" uk-grid>
                            <div class="uk-width-1-1">
                                <form action="https://winecellar.vn/cua-hang-ruou-vang/" id="quick_search" method="get"
                                      class="uk-form-stacked">
                                    <!-- Your form content here -->
                                    <input type="search" id="woocommerce-product-search-field-2"
                                           class="uk-border-rounded uk-input"
                                           placeholder="Hãy thử 'vang cá chép' xem sao!" value="" name="s">
                                </form>
                            </div>
                            <div class="uk-width-1-1 uk-margin-remove-top">
                                <div class="uk-flex uk-flex-wrap uk-margin-top uk-margin-bottom">
                                    <a href="https://winecellar.vn/ruou-vang-phap/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Pháp</a>
                                    <a href="https://winecellar.vn/ruou-vang-my/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Mỹ</a>
                                    <a href="https://winecellar.vn/ruou-vang-y/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Ý</a>
                                    <a href="https://winecellar.vn/ruou-vang-phap/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Pháp</a>
                                    <a href="https://winecellar.vn/ruou-vang-my/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Mỹ</a>
                                    <a href="https://winecellar.vn/ruou-vang-y/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Ý</a>
                                    <a href="https://winecellar.vn/ruou-vang-phap/"
                                       class="uk-button uk-button-secondary uk-button-small uk-border-pill uk-margin-small-right">Vang
                                        Pháp</a>
                                    <!-- Add more links as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="uk-section uk-section-primary uk-padding" id="section_2140810014"
             style="background: #9d7623; color: #0A0A0A">
        <div class="">
            <h2 class="uk-text-large uk-text-center uk-margin-remove-top uk-margin-remove-bottom">KHÁM PHÁ THƯƠNG
                HIỆU</h2>
            <div class="uk-text-center uk-light">
                <p>WINECELLAR.vn tự hào là đại diện độc quyền nhập khẩu và phân phối sản phẩm từ một số nhà sản xuất
                    rượu vang tốt nhất thế giới tại Việt Nam.</p>
            </div>
            <div class="uk-child-width-1-2@s uk-child-width-1-4@l uk-grid-medium uk-grid-match" uk-grid>
                @foreach($brands as $brand)
                    <div class="uk-width-1-4@l">
                        <div class="uk-card uk-card-default uk-card-body uk-padding-remove custom-card"
                             style="background: #f5ecdb;">
                            <a href="">
                                {{--                                <a href="{{ route('brand.show', ['slug' => $brand->slug]) }}">--}}
                                @if ($post->featuredImage)
                                    <img src="{{ asset($brand->path) }}" alt="{{ $brand->name }}" uk-cover
                                         class="uk-width-1-1">
                                @else
                                    <img src="https://winecellar.vn/wp-content/uploads/2024/04/chateau-dauzac.png"
                                         alt="{{ $post->title }}" class="uk-width-1-1">
                                @endif
                                <h3 class="uk-text-default uk-text-center"
                                    style="color: #0A0A0A">{{ $brand->name }}</h3>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <section class="uk-section uk-section-small uk-background-norepeat uk-background-cover uk-background-center-center"
             style="background-image: url('path/to/background/image.jpg');" id="section_1212447303">
        <div class="">
            <div class="uk-text-center">
                <h2 class="uk-text-large uk-margin-remove-top" style="color: #990d23; font-weight: 600">Sản phẩm bán
                    chạy</h2>
            </div>
            <div class="uk-child-width-1-2@s uk-child-width-1-5@m uk-grid-match uk-grid-small" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 100; repeat: false">
                @foreach($products as $product)
                    <div>
                        <div
                            class="uk-card uk-card-default uk-card-body uk-card-hover uk-flex uk-flex-column uk-flex-middle">
                            <a href="">
                                {{--                                <a href="{{ route('product.show', ['slug' => $product->slug]) }}">--}}
                                @if ($product->featuredImage)
                                    <img src="{{ asset($product->featuredImage->path) }}" alt="{{ $product->name }}">
                                @else
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2024/03/cf-collefrisio-montepulciano-dabruzzo-300x400.jpg"
                                        alt="{{ $product->name }}">
                                @endif
                            </a>
                            <h3 class="uk-text-default uk-text-center">{{ $product->name }}</h3>
                            <p class="uk-text-meta uk-margin-remove-top"
                               style="color: #990d23; font-weight: bold;">{{ number_format($product->price, 0, ',', '.') }}
                                ₫</p>
                            <a href="?add-to-cart={{ $product->id }}" class="uk-button uk-border-rounded"
                               style="background: #990d23; color: #FFFFFF">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="uk-section uk-section-primary" id="section_1822066111" style="background: #9d7623">
        <div class="uk-padding uk-padding-remove-top">
            <div class="uk-text-center">
                <h2 class="uk-text-large" style="color: #FFFFFF; font-weight: 600">DỊCH VỤ KHÁCH HÀNG</h2>
            </div>
            <div class="uk-grid uk-child-width-1-2@m" uk-grid>
                <div class="uk-width-2-3@m uk-flex uk-flex-middle">
                    <div class="uk-position-relative uk-light uk-background-cover uk-height-1-1">
                        <img
                            src="https://winecellar.vn/wp-content/uploads/2023/11/hop-qua-tang-doanh-nghiep-phu-quy-doan-vien-chim-tri-banner-1400x510.jpg"
                            class="uk-border-rounded" alt="" uk-cover>
                    </div>
                </div>
                <div class="uk-width-1-3@m">
                    <div class="uk-margin menu-services uk-height-1-1">
                        <ul class="uk-nav uk-nav-default uk-flex-column uk-height-1-1 uk-child-height-1-4@m uk-flex uk-flex-center">
                            <li class="uk-height-1-4"><a href="https://winecellar.vn/qua-tang-doanh-nghiep/"><i
                                        class="uk-icon uk-margin-small-right icon-user-o"></i> Khách hàng doanh
                                    nghiệp</a></li>
                            <li class="uk-height-1-4"><a href="https://winecellar.vn/qua-tang-doanh-nghiep/"><i
                                        class="uk-icon uk-margin-small-right icon-gift"></i> Quà tặng doanh nghiệp</a>
                            </li>
                            <li class="uk-height-1-4"><a href="https://winecellar.vn"><i
                                        class="uk-icon uk-margin-small-right icon-star"></i> Tư vấn quà tặng</a></li>
                            <li class="uk-height-1-4"><a href="https://winecellar.vn"><i
                                        class="uk-icon uk-margin-small-right icon-menu"></i> Đào tạo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
