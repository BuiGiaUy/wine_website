@extends('layouts.partialLayout')

@section('title', '')

@section('style')
    <style>
        #section_782981026 {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .btn-icon {
            border: solid 1px #cccccc;
            color: #cccccc;
            border-radius: 50%;
            padding: 10px;
        }
        .btn-icon:hover {
            background: #990d23;
            color: #FFFFFF;
        }

        .btn-winea{
            color: #990d23; /* Thay đổi màu chữ khi hover */
            font-weight: 500;
        }

        .btn-winea:hover{
            text-decoration: none; /* Loại bỏ dấu gạch chân khi hover */
            color: blue;
        }

        .btn-wine {
            color: #990d23; /* Thay đổi màu chữ khi hover */
            font-weight: 500;
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
        .heading-yellow > span{
            color: #B4975A;
            font-size: 32px;
        }


    </style>
@endsection

@section('content')
    <main id="main">
        <div class="">
            <div class=""></div>
            <div class="">
                <div class="">
                    <section class="uk-section uk-section-small uk-padding-small" id="section_1984779848">
                        <div class="uk-background-cover b"></div>
                        <div class="uk-position-relative ">
                            <div class=" uk-text-muted uk-text-normal">
                                <nav class="uk-breadcrumb ">
                                    <ul class="uk-breadcrumb uk-text-default">
                                        <li><a href="https://winecellar.vn">Trang chủ</a></li>
                                        <li><a href="https://winecellar.vn/ruou-manh-cao-cap/">Rượu Mạnh</a></li>
                                        <li><a href="https://winecellar.vn/ruou-whisky-single-malt/">Rượu Whisky Single Malt</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>

                    <section class="uk-section uk-section-small product-detail__row product-detail__gallery" id="section_1403097712">
                        <div class="uk-background-cover bg section-bg fill bg-fill bg-loaded"></div>
                        <div class="uk-container ">
                            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-3@m" id="row-566856114">
                                <div id="col-1218010425" class="uk-width-1-3@m">
                                    <div class="uk-card uk-card-body uk-padding-remove">
                                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="animation: push; autoplay: false;">
                                            <ul class="uk-slideshow-items" style="height: 506.65px;">
                                                <li>
                                                    <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold.jpg" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)" uk-cover>
                                                </li>
                                                <li>
                                                    <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-2-1.jpg" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)" uk-cover>
                                                </li>
                                                <li>
                                                    <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-1-1.jpg" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)" uk-cover>
                                                </li>
                                            </ul>

                                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                        </div>


                                        <!-- Wishlist Button -->
                                        <div class="uk-position-top-right uk-padding-small uk-margin-small-top">
                                            <button class="btn-icon" aria-label="Wishlist">
                                                <span uk-icon="heart"></span>
                                            </button>
                                        </div>

                                        <!-- Zoom Button -->
                                        <div class="uk-position-bottom-left uk-padding-small uk-margin-small-bottom">
                                            <a href="#product-zoom" class="btn-icon  uk-padding-small" uk-tooltip="title: Zoom">
                                                <span uk-icon="expand"></span>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="uk-thumbnav uk-flex-center">
                                        <a href="#" uk-slideshow-item="0">
                                            <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-300x400.jpg" width="100" height="100" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)">
                                        </a>
                                        <a href="#" uk-slideshow-item="1">
                                            <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-2-1-300x400.jpg" width="100" height="100" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)">
                                        </a>
                                        <a href="#" uk-slideshow-item="2">
                                            <img src="https://winecellar.vn/wp-content/uploads/2023/11/60-sessantanni-limited-edition-24-karat-gold-1-1-300x400.jpg" width="100" height="100" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)">
                                        </a>
                                    </div>
                                </div>

                                <div id="col-2003211962" class="col uk-width-1-3@m">
                                    <div class="uk-card uk-padding-remove uk-card-body">
                                        <h1 class="uk-text-bold uk-text-large btn-wine">Rượu Whisky Glengoyne 10 Year Old</h1>
                                        <div class="uk-margin" uk-margin>
                                            <div class="uk-flex" uk-grid>
                                                <div class="uk-width-auto">
                                                    <div class="uk-position-relative uk-display-inline-block uk-rating" uk-rating="{rating: 4.6, size: 18, width: 103.3, best: 5}">
                                                        <div class="uk-position-relative uk-display-inline-block">
                                                            <div class="uk-rating-stars uk-display-inline-block uk-position-relative" >
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                            </div>
                                                            <div class="uk-position-absolute uk-position-cover uk-display-inline-block uk-rating-stars" style="overflow: hidden; width: 103.3px;">
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                                <span class="uk-rating-star uk-icon" uk-icon="icon: star"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-auto">
                                                    <span class="uk-text-muted uk-margin-small-left">4.6/5 - (5 bình chọn)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-text-small">
                                            <p style="text-align: justify;">
                                                Dòng whisky mang sắc vàng kim sắc nét, mở ra những nốt hương quyến rũ, ngọt ngào của kẹo toffee, bỏng ngô, cuốn theo hương táo xanh đầy tươi mới. Chất vị whisky mạnh mẽ với táo xanh và chút cỏ hoa quyện cùng gỗ sồi mềm mại. Hương vị cam thảo dần bung toả ngọt ngào. Thêm một chút nước khi thưởng thức để cảm nhận vị hạt lanh và hạnh nhân đầy lôi cuốn. Hậu vị thoảng hương lúa mạch ngọt ngào, lưu luyến.
                                            </p>
                                        </div>
                                        <div class="uk-card uk-border-bottom">
                                            <div class="uk-grid-small uk-child-width-1-3@s " uk-grid>
                                                <div class="uk-flex">
                                                    <div class="">
                                                        <img src="https://winecellar.vn/wp-content/themes/winecellarvn/assets/icons/svg/pa_dung-tich.svg" alt="Dung tích">
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Dung tích</div>
                                                        <div class="uk-text-bold">
                                                            <p>700ml</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex">
                                                    <div class="">
                                                        <img src="https://winecellar.vn/wp-content/themes/winecellarvn/assets/icons/svg/pa_nha-san-xuat.svg" alt="Nhà sản xuất">
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Nhà sản xuất</div>
                                                        <div class="uk-text-bold">
                                                            <p><a href="https://winecellar.vn/nha-san-xuat/glengoyne/" class="btn-wine " rel="tag">Glengoyne</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex">
                                                    <div class="">
                                                        <img src="https://winecellar.vn/wp-content/themes/winecellarvn/assets/icons/svg/pa_quoc-gia.svg" alt="Quốc gia">
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Quốc gia</div>
                                                        <div class="uk-text-bold">
                                                            <p>Scotland</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex uk-margin-remove-top" >
                                                    <div class="">
                                                        <img class="uk-margin-remove" src="https://winecellar.vn/wp-content/themes/winecellarvn/assets/icons/svg/pa_nong-do.svg" alt="Nồng độ">
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Nồng độ</div>
                                                        <div class="uk-text-bold uk-margin-remove">
                                                            <p class="uk-margin-remove">40% ABV*</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="uk-divider-small">
                                        <div id="text-3363948913" class="uk-padding-remove-bottom uk-margin uk-margin-remove-bottom uk-padding-small" style="background: #f7f7f7">
                                            <ul class="uk-list uk-list-bullet uk-text-small">
                                                <li>Giá sản phẩm đã bao gồm VAT</li>
                                                <li>Phí giao hàng tùy theo từng khu vực.</li>
                                                <li>Đơn hàng từ 1.000.000vnđ miễn phí giao hàng.</li>
                                            </ul>
                                        </div>
                                        <div class="uk-visible@s">
                                            <p class="uk-text-default btn-wine" style="font-size: 22px">
                                                <span class="woocommerce-Price-amount amount"><bdi>1.430.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                            </p>
                                        </div>


                                        <div class=" uk-margin">
                                            <form class="uk-grid-small" action="https://winecellar.vn/ruou-whisky-single-malt/glengoyne-10-year-old/" method="post" enctype="multipart/form-data" uk-grid>
                                                <div class="uk-margin uk-padding-remove uk-flex" style="width: 80px;">
                                                    <div class="uk-width-auto ">
                                                        <button type="button" class="ux-quantity__button ux-quantity__button--minus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;">-</button>
                                                    </div>
                                                    <div class="uk-width-expand ">
                                                        <input type="number" id="quantity" size="4" class="uk-input" name="cart[c15e114aa760ddb760c00f8bb029d8cc][qty]" value="1" aria-label="Product quantity" min="0" step="1" autocomplete="off">
                                                    </div>
                                                    <div class="uk-width-auto ">
                                                        <button type="button" class="ux-quantity__button ux-quantity__button--plus uk-button uk-button-default" style="padding-right: 3px; padding-left: 3px;">+</button>
                                                    </div>
                                                </div>
                                                <div class="wcl-button w-50 uk-text-right ">
                                                    <button type="submit" name="add-to-cart" class="uk-margin-small uk-button uk-button-primary uk-border-rounded custom-add-to-cart-button" >Thêm vào giỏ hàng</>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <div id="col-317425088" class="">
                                    <div class="col-inner">
                                        <div class="uk-card uk-card-default uk-card-body ">
                                            <div class="uk-grid-small " uk-grid>
                                                <div class="uk-width-auto">
                                                    <div class="icon-box-img uk-border-circle uk-box-shadow-medium">
                                                        <img width="25" height="25" src="https://winecellar.vn/wp-content/uploads/2022/04/icon_hotline.png" class="attachment-medium size-medium" alt="" decoding="async" loading="lazy">
                                                    </div>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <div class=" ">
                                                        <h5 class="uppercase">Hotline</h5>
                                                        <p><a class="btn-winea" href="tel:0946.698.008">0946.698.008</a></p>
                                                        <p><a class="btn-winea" href="tel:0903.520.268">0903.520.268</a></p>
                                                        <p><a class="btn-winea" href="tel:0903.530.268">0903.530.268</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a class="plain" href="https://winecellar.vn/lien-he/he-thong-cua-hang/">
                                            <div class="uk-card uk-card-default uk-card-body icon-box featured-box ss-icon-box icon-box-left text-left uk-margin-top">
                                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                    <div class="uk-width-auto">
                                                        <div class="icon-box-img uk-border-circle uk-box-shadow-medium">
                                                            <img width="30" height="24" src="https://winecellar.vn/wp-content/uploads/2022/04/icon_shop.png" class="attachment-medium size-medium" alt="" decoding="async" loading="lazy">
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-expand">
                                                        <div class="icon-box-text last-reset">
                                                            <h5 class="uppercase">Thông tin cửa hàng</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <div id="text-412004289" class="text wcl-text-uu-dai hidden uk-margin-top">
                                            <div class="uk-card uk-card-default uk-card-body">
                                                <p style="text-align: center;"><strong>Ưu đãi thêm</strong></p>
                                                <ul class="uk-list uk-list-bullet">
                                                    <li><span style="font-size: 100%;">Xem chính sách ưu đãi dành riêng cho <a  class="btn-winea" href="https://winecellar.vn/my-account/rank/">WINE Member</a>.</span></li>
                                                    <li><span style="font-size: 100%;">Quà tặng khui rượu vang cho đơn đặt hàng đầu tiên.</span></li>
                                                    <li><span style="font-size: 100%;">Giảm thêm 5%/tổng hóa đơn cho tháng sinh nhật.</span></li>
                                                    <li><span style="font-size: 100%;">Liên hệ B2B để được tư vấn giá tốt nhất cho khách hàng doanh nghiệp khi mua số lượng nhiều.</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="section product-detail__row" id="section_782981026">
                        <div class="bg section-bg fill bg-fill bg-loaded"></div>

                        <div class="section-content relative uk-padding-remove">
                            <div class="uk-grid-divider uk-grid-match uk-child-width-1-1@m" uk-grid>
                                <div class="uk-width-expand@m">
                                    <div class="uk-padding-large uk-padding-remove-top">
                                        <h3 class="heading-yellow uk-heading-line  uk-text-center"><span>Thông tin sản phẩm</span></h3>
                                        <div class="product-detail__content uk-text-justify">
                                            <p>Siêu phẩm quà tặng từ nhà sản xuất San Marzano hàng đầu Nam Ý. 60 Sessantanni Limited Edition 24 Karat Gold lôi cuốn với sắc đỏ ruby đậm đà, nồng nàn hương thơm trái cây hòa quyện cùng mứt mận, anh đào. Hương vị vang đầy đặn, cân bằng tuyệt vời, vị chát mềm mượt và thanh lịch. Hậu vị đầy lưu luyến với những nốt hương cacao, cà phê và vani tinh tế.</p>
                                            <p>Những cây nho từ 60 năm tuổi trồng trên thổ nhưỡng đặc biệt tại trung tâm Primitivo di Manduria D.O.P đã được lựa chọn để làm nên phiên bản vang Ý 60 Sessantanni Limited Edition 24 Karat Gold. Dòng vang Ý mang biểu hiện trung thực nhất của lãnh thổ, nơi những cây nho phát triển trong điều kiện khí hậu trong lành. Đây cũng là vùng đất mang truyền thống sản xuất vang từ lâu đời – Một di sản mà San Marzano luôn gìn giữ trong nhiều năm qua.</p>
                                            <p>60 Sessantanni Limited Edition với hương vị tuyệt hảo, nhãn chai mạ vàng 24 Karat sang trọng – Quà tặng tuyệt vời cho đối tác, khách hàng.</p>
                                        </div>
                                        <h3 class="heading-yellow uk-heading-line uk-text-center"><span>Những câu hỏi thường gặp</span></h3>
                                        <ul uk-accordion>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Địa chỉ các cửa hàng của WINECELLAR.vn ở đâu</a>
                                                <div class="uk-accordion-content">
                                                    <p>Cảm ơn quý khách đã quan tâm đến sản phẩm của WINECELLAR.vn.</p>
                                                    <p><strong>Quý khách có thể tìm kiếm cửa hàng mua rượu vang của WINECELLAR.vn tại Hà Nội: </strong></p>
                                                    <ul>
                                                        <li>78 Vũ Phạm Hàm, Cầu Giấy: 02435379777</li>
                                                        <li>88 Đào Tấn, Ba Đình: 02432262599</li>
                                                        <li>246 Hoàng Ngân, Cầu Giấy: 02439037888</li>
                                                        <li>43 Phan Chu Trinh, Hoàn Kiếm: 02432047097</li>
                                                    </ul>
                                                    <p><strong>Tại thành phố Đà Nẵng: </strong></p>
                                                    <ul>
                                                        <li>172 Nguyễn Văn Linh, Thanh Khê: 02363996588</li>
                                                    </ul>
                                                    <p><strong>Tại thành phố Hội An: </strong></p>
                                                    <ul>
                                                        <li>Số 166 Nguyễn Trường Tộ, Phường Cẩm Phô, Hội An</li>
                                                    </ul>
                                                    <p><strong>Tại thành phố Nha Trang: </strong></p>
                                                    <ul>
                                                        <li>Số 15 Hai Bà Trưng, Phường Xương Huân, Thành phố Nha Trang, Tỉnh Khánh Hòa</li>
                                                    </ul>
                                                    <p><strong>Tại thành phố Hồ Chí Minh: </strong></p>
                                                    <ul>
                                                        <li>188 Nguyễn Văn Thủ, Quận 1: 02838237197</li>
                                                        <li>253 Nam Kỳ Khởi Nghĩa, Quận 3: 02838435368</li>
                                                        <li>58 Song Hành, thành phố Thủ Đức</li>
                                                    </ul>
                                                    <p><strong>Tại Phú Quốc: </strong></p>
                                                    <ul>
                                                        <li>Số 217B Đường 30/4, Phú Quốc, Kiên Giang</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Làm sao để chọn được chai vang phù hợp nhất</a>
                                                <div class="uk-accordion-content">
                                                    <ul>
                                                        <li>Trò chuyện trực tiếp với chúng tôi chúng tôi sẽ tư vấn cho quý vị dòng vang phù hợp nhất để thưởng thức</li>
                                                        <li>Liên hệ với chúng tôi qua HOTLINE 094 669 8008 để được tư vấn nhanh nhất có thể</li>
                                                        <li>Xem thêm các bài viết, tin tức về rượu vang tại <a href="https://winecellar.vn/tin-tuc" target="_blank" rel="noopener">https://winecellar.vn/tin-tuc/</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Những hình thức thanh toán tại Winecellar.vn</a>
                                                <div class="uk-accordion-content">
                                                    <p>Những thông tin, nội dung trên website chỉ mang tính chất giới thiệu sản phẩm. Chúng tôi không bán hàng trực tuyến ! Quý khách mua hàng xin vui lòng liên hệ trực tiếp hoặc ghé thăm <a href="https://winecellar.vn/lien-he/he-thong-cua-hang/">Hệ thống cửa hàng WINECELLAR.vn</a> để chọn mua rượu vang ngon và giá tốt.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Thời gian giao hàng trong bao lâu?</a>
                                                <div class="uk-accordion-content">
                                                    <p>Ngay sau khi tiếp nhận được yêu cầu từ quý khách, chúng tôi sẽ chuẩn bị, đóng gói sản phẩm nhanh nhất có thể để đem tới tận tay quý khách một cách sớm nhất. Thông thường tại nội thị các thành phố Hà Nội, Đà Nẵng, Tp. Hồ Chí Minh, thời gian giao hàng thường trong tối đa 5h, đối với các tỉnh khác thời gian tối đa thường là 1-2 ngày.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Liệu có thể nếm thử vang trước khi yêu cầu về sản phẩm?</a>
                                                <div class="uk-accordion-content">
                                                    <p>Tại WINECELLAR.vn, chúng tôi luôn có các buổi FREE TASTING tại hệ thống cửa hàng hoặc thông qua đội ngũ tư vấn viên chuyên sâu về rượu vang. Hãy đăng ký tham gia để thử nếm và lựa chọn dòng vang phù hợp nhất.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Chương trình thưởng thức vang kèm đồ nguội MIỄN PHÍ</a>
                                                <div class="uk-accordion-content">
                                                    <p>Tại hệ thống cửa hàng WINECELLAR.vn, chúng tôi tặng MIỄN PHÍ đồ nguội (Jamon Iberico, Salami, Phomai, Bánh mì...) tới quý khách khi thưởng thức vang tại Tasting Room. Hãy đăng ký, đặt bàn để tận hưởng trải nghiệm ẩm thực độc đáo tại WINECELLAR.vn</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="uk-width-1-4@m">
                                    <div class="uk-card ">
                                        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>



                </div>
            </div>
        </div>
    </main>
@endsection