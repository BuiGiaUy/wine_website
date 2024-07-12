@extends('layouts.partialLayout')

@section('title', '')

@section('style')
    <style>
        .custom-add-to-cart-button {
            border-radius: 5px;
            background: #990d23;
            color: #FFFFFF;
            font-weight: 700;
            transition: background-color 0.3s ease, color 0.3s ease; /* smooth transition */
        }

        .custom-add-to-cart-button:hover {
            background: #990d23;

            box-shadow: inset 0 0 0 100px rgba(0, 0, 0, .2);
            color: #fff;
            opacity: 1;
            outline: none;
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

        .uk-accordion {

        }
    </style>
@endsection

@section('content')
    <div class="">
        <section class="uk-section uk-padding-small" id="section_1370848820">
            <div class="uk-container ">
                <div class="uk-text-center ">
                    <h1 class="uk-heading-line" style="font-size: 32px"><span>Liên hệ với chúng tôi</span></h1>
                </div>
                <div class="uk-margin-large-top  uk-child-width-1-2@m " uk-grid>
                    <div class="uk-text-center">
                        <img src="https://winecellar.vn/wp-content/uploads/2018/07/winecellar-dia-diem-mua-ruou-vang-uy-tin.jpg" alt="Gợi ý rượu vang Pháp làm quà tặng cho đối tác" class="uk-width-1-1">
                    </div>
                    <div class="">
                        <p class="uk-text-justify uk-padding-large uk-padding-remove-bottom uk-padding-remove-left ">
                            Hệ thống hầm rượu WINECELLAR.vn với đội ngũ tư vấn viên và đội ngũ bán hàng tận tâm sẽ luôn hỗ trợ quý khách khi liên hệ với chúng tôi. Chúng tôi cam kết sẽ luôn đáp ứng nhanh chóng nhu cầu lựa chọn rượu vang để uống hàng ngày, chọn quà tặng cá nhân và quà tặng doanh nghiệp, quà tặng Tết và mọi nhu cầu về rượu vang, bia, whisky, phụ kiện và ly pha lê rượu vang.
                        </p>
                        <div class="uk-margin-top">
                            <a href="https://winecellar.vn/lien-he/he-thong-cua-hang/" class=" custom-add-to-cart-button uk-button uk-button-primary uk-margin-small-right">
                                <span uk-icon="location"></span> Hệ thống cửa hàng
                            </a>
                            <a href="https://m.me/winecellar.vn" class="uk-button uk-button-secondary  checkout-button">
                                <span uk-icon="facebook"></span> Nhắn tin Facebook
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="uk-section uk-section-default" id="section_694093122" style="background-color: rgb(247, 245, 239);">
            <div class="uk-container">
                <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                    <div>
                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 6000; pause-on-hover: true;">

                            <ul class="uk-slider-items uk-child-width-1-1">
                                <li>
                                    <img src="https://winecellar.vn/wp-content/uploads/2022/04/f1.png" alt="Image 1" uk-img>
                                </li>
                                <li>
                                    <img src="https://winecellar.vn/wp-content/uploads/2022/04/f2.png" alt="Image 2" uk-img>
                                </li>
                            </ul>

                            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                        </div>
                    </div>
                    <div>
                        <div class="uk-text-center">
                            <h2 class="uk-heading-line"><span>Trở thành đối tác</span></h2>
                        </div>
                        <p style="text-align: justify;"><strong>Công ty TNHH Hầm Rượu Việt Nam WINECELLAR.vn</strong> tự hào là nhà cung cấp uy tín lâu năm cho các hệ thống khách sạn 5 sao, khách sạn nhà hàng và các hệ thống siêu thị, cửa hàng tiện lợi, đại lý bán buôn bán lẻ
                            <a class="link-p" href="https://winecellar.vn/ruou-vang/"><strong>rượu vang</strong></a>,
                            <a class="link-p" href="https://winecellar.vn/bia-nhap-khau/"><strong>bia nhập khẩu</strong></a> trên toàn quốc. Chúng tôi cam kết luôn đáp ứng nhu cầu của các đối tác về đa dạng chủng loại, số lượng sản phẩm lớn, giá cả cạnh tranh tốt nhất và thời gian giao hàng linh hoạt, nhanh chóng.<br>
                            Liên hệ ngay để nhận chính sách đặc biệt cho đối tác.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="uk-section" id="section_165013052">
            <div class="uk-container">
                <div class="uk-grid-match uk-child-width-1-2@m" uk-grid>
                    <div>
                        <div class="uk-card ">
                            <h3 class="uk-card-title">Thông tin liên hệ</h3>
                            <p><strong>Hầm rượu vang WINECELLAR.vn</strong></p>
                            <p><strong>Hotline</strong>: <a class="link-p" href="tel:0946698008">094 669 8008</a> – <a class="link-p" href="tel:0903530268">0903 530 268</a> – <a class="link-p" href="tel:0903520268">0903 520 268</a></p>
                            <p><strong>Email</strong>: <a href="mailto:info@winecellar.vn" class="link-p">info@winecellar.vn</a></p>
                            <a  href="https://winecellar.vn/lien-he/he-thong-cua-hang/" class="custom-add-to-cart-button  uk-button uk-button-primary uk-border-pill">
                                <i class="uk-icon" uk-icon="icon: location"></i> Hệ thống cửa hàng
                            </a>
                            <a  href="https://m.me/winecellar.vn" class="uk-button uk-button-secondary checkout-button">
                                <i class="uk-icon" uk-icon="icon: facebook"></i> Nhắn tin Facebook
                            </a>
                            <div class="uk-margin"></div>
                            <ul uk-accordion>
                                <li>
                                    <a class="uk-accordion-title" href="#">Làm sao để chọn được chai vang phù hợp nhất?</a>
                                    <div class="uk-accordion-content">
                                        <ul>
                                            <li>Trò chuyện trực tiếp với chúng tôi qua <a href="https://m.me/winecellar.vn/"><strong>Facebook WINECELLAR.vn</strong></a>, chúng tôi sẽ tư vấn cho quý vị dòng vang phù hợp nhất để thưởng thức</li>
                                            <li>Liên hệ với chúng tôi qua các HOTLINE: <strong>094 669 8008</strong> – <strong>0903 530 268</strong> – <strong>0903 520 268</strong> để được tư vấn nhanh nhất có thể</li>
                                            <li>Xem thêm các bài viết, <a href="https://winecellar.vn/tin-tuc/"><strong>tin tức về rượu vang</strong></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">Những hình thức thanh toán tại WINECELLAR.vn</a>
                                    <div class="uk-accordion-content">
                                        <p>Những thông tin, nội dung trên website chỉ mang tính chất giới thiệu sản phẩm. Chúng tôi không bán hàng trực tuyến ! Quý khách mua hàng xin vui lòng liên hệ trực tiếp qua số Hotline hoặc các phương thức liên hệ khác</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">Thời gian giao hàng trong bao lâu</a>
                                    <div class="uk-accordion-content">
                                        <p>Ngay sau khi tiếp nhận được yêu cầu từ quý khách, chúng tôi sẽ chuẩn bị, đóng gói sản phẩm nhanh nhất có thể để đem tới tận tay quý khách một cách sớm nhất. Thông thường tại nội thành thời gian giao hàng trong 24h, đối với các tỉnh khác thời gian thường là 1-2 ngày.</p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">Liệu có thể nếm thử vang trước khi yêu cầu về sản phẩm?</a>
                                    <div class="uk-accordion-content">
                                        <p>Tại hệ thống cửa hàng <strong><a class="text-is-link" target="_blank" rel="noopener noreferrer">WINECELLAR.vn</a></strong>, chúng tôi tặng MIỄN PHÍ đồ nguội (Jamon Iberico, Salami, Phomai, Bánh mì…) tới quý khách khi thưởng thức vang tại Tasting Room. Hãy đăng ký, đặt bàn để tận hưởng trải nghiệm ẩm thực độc đáo tại <strong><a class="text-is-link" target="_blank" rel="noopener noreferrer">WINECELLAR.vn</a></strong></p>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#">Chương trình thưởng thức vang kèm đồ nguội MIỄN PHÍ</a>
                                    <div class="uk-accordion-content">
                                        <p>Tại hệ thống cửa hàng WINECELLAR.vn, chúng tôi tặng MIỄN PHÍ đồ nguội (Jamon Iberico, Salami, Phomai, Bánh mì…) tới quý khách khi thưởng thức vang tại Tasting Room. Hãy đăng ký, đặt bàn để tận hưởng trải nghiệm ẩm thực độc đáo tại WINECELLAR.vn</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card ">
                            <form action="/lien-he/#wpcf7-f6208-p5312-o3" method="post" class="uk-form-stacked">
                                <fieldset class="uk-fieldset">
                                    <legend class="uk-legend">Form liên hệ</legend>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="your-name">Họ và tên *</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="your-name" name="your-name" type="text" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="your-email">Email *</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="your-email" name="your-email" type="email" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="your-phone">Số điện thoại *</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="your-phone" name="your-phone" type="tel" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="your-message">Nội dung</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-textarea" id="your-message" name="your-message" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <button class="uk-button uk-button-primary custom-add-to-cart-button" type="submit">Gửi đi</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection
