@extends('content.layouts.app')

@section('title', 'Kiến Thức Rượu Vang')

@section('style')
    <style>
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

        .list a {
            color: #990d23 !important;
            text-decoration: none;
        }

        .list a:hover {
            color: #5B8DBF !important;

        }

        .uk-card-title {
            font-size: 28px !important;
            color: #990d23 !important;
            font-weight: 600;
        }

        .uk-card-title a:hover {
            color: #5B8DBF !important;
        }
    </style>
@endsection

@section('content')
    <main id="main">
        <div class="">
            <section class="uk-padding"></section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_1792157930">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="uk-child-width-1-2@l"uk-grid>
                        <div class="uk-width-1-2@l uk-width-1-1">
                            <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1"
                                 style="background-color: rgb(243, 243, 243) !important;">
                                <h2 class="uk-card-title"><a
                                        href="https://winecellar.vn/ruou-vang-cho-nguoi-moi-bat-dau/"
                                        class="uk-link-text">Tìm hiểu rượu vang cho người mới bắt đầu</a></h2>
                                <p class="uk-text-justify">Dù bạn mới biết đến rượu vang hay đang làm việc trong lĩnh
                                    vực rượu thì trang web này sẽ cung cấp cho bạn nhiều kiến thức rượu vang hữu ích.
                                    Hãy cùng bắt đầu nào!</p>
                                <a href="https://winecellar.vn/ruou-vang-cho-nguoi-moi-bat-dau/"
                                   class="custom-add-to-cart-button uk-button uk-button-primary uk-border-rounded">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                        <div class="uk-width-1-2@l uk-width-1-1">
                            <div class="uk-card ">
                                <a href="https://winecellar.vn/ruou-vang-cho-nguoi-moi-bat-dau/" class="uk-link-reset">
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2021/06/banner-knowledge-homepage.jpg"
                                        alt="Kiến thức rượu vang tại WINECELLAR.vn"
                                        class="uk-width-1-1 uk-margin-remove-bottom">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_2043780788">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="">
                        <div class="uk-child-width-1-2@l" uk-grid>
                            <div class="">
                                <div class="uk-card ">
                                    <a href="https://winecellar.vn/kien-thuc-ruou-vang-co-ban/" class="uk-link-reset">
                                        <img
                                            src="https://winecellar.vn/wp-content/uploads/2023/03/nhung-kien-thuc-co-ban-ve-ruou-vang.jpg"
                                            alt="Những kiến thức cơ bản nhất về rượu vang" class="uk-width-1-1">
                                    </a>
                                </div>
                            </div>

                            <div class="">
                                <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1"
                                     style="background-color: rgb(243, 243, 243) !important;">
                                    <h2 class="uk-card-title"><a
                                            href="https://winecellar.vn/kien-thuc-ruou-vang-co-ban/"
                                            class="uk-link-text">Những kiến thức cơ bản nhất về rượu vang</a></h2>
                                    <p class="uk-text-justify">Hầu hết rượu vang được làm từ nho và chắc chắn rằng chúng
                                        khác so với những loại rượu mà bạn có thể tìm thấy trong cửa hàng tạp hóa. Nho
                                        làm rượu vang có tên Latin là Vitis vinifera, …</p>
                                    <ul class="list">
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/cac-giong-nho-lam-ruou-vang-chinh-tai-vung-bordeaux/">Các
                                                giống nho làm rượu vang chính tại Bordeaux, Pháp</a></li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/ruou-vang-la-gi-tim-hieu-quy-trinh-san-xuat-ruou-vang/">Rượu
                                                vang là gì? Tìm hiểu quy trình sản xuất rượu vang</a></li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/tim-hieu-quy-trinh-san-xuat-ruou-vang-do/">Tìm
                                                hiểu quy trình sản xuất rượu vang đỏ</a></li>
                                    </ul>
                                    <a href="https://winecellar.vn/kien-thuc-ruou-vang-co-ban/"
                                       class="custom-add-to-cart-button uk-button uk-button-primary uk-border-rounded">Tìm
                                        hiểu thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical uk-width-1-1@m">
                    <div class="uk-grid-match uk-child-width-1-1@s " uk-grid>
                        <div class="uk-width-1-1">
                            <a href="https://grandcru.vn" style="padding: 10px;margin-bottom:0 !important;"
                               class=" custom-add-to-cart-button uk-button uk-button-primary uk-width-1-1 uk-margin-bottom uk-border-rounded">Tìm
                                hiểu về rượu vang cao cấp</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_2142074539">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="uk-child-width-1-2@l" uk-grid>
                        <div class="">
                            <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1"
                                 style="background-color: rgb(243, 243, 243) !important;">
                                <h2 class="uk-card-title"><a
                                        href="https://winecellar.vn/nghe-thuat-thuong-thuc-ruou-vang/"
                                        class="uk-link-text">Nghệ thuật thưởng thức và chọn ly rượu vang phù hợp</a>
                                </h2>
                                <p class="uk-text-justify">Nghệ thuật thưởng thức rượu vang là một thế giới kỳ diệu. Sẽ
                                    thật tuyệt khi được khám phá thêm những kiến thức và tip phục vụ, xử lý cũng như bảo
                                    quản rượu vang hoàn hảo, trong đó không thể bỏ qua việc chọn ly phù hợp cho từng
                                    loại rượu vang.</p>
                                <a href="https://winecellar.vn/nghe-thuat-thuong-thuc-ruou-vang/"
                                   class="custom-add-to-cart-button uk-button uk-button-primary  uk-margin-bottom uk-border-rounded">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                        <div class="">
                            <div class="uk-card uk-card-default">
                                <a href="https://winecellar.vn/nghe-thuat-thuong-thuc-ruou-vang/" class="uk-link-reset">
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2021/06/nhiet-do-phuc-vu-toi-uu-de-thuong-thuc-ruou-vang.jpg"
                                        alt="Nhiệt độ phục vụ tối ưu để thưởng thức rượu vang" class="uk-width-1-1">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_909080405">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="">
                        <div class="uk-child-width-1-4@l" uk-grid>
                            <div class="">
                                <div class="uk-card  uk-height-1-1">
                                    <div class="uk-position-cover">
                                        <a class="uk-position-cover"
                                           href="https://winecellar.vn/tim-hieu-ruou-vang-phap/"></a>
                                        <div class="uk-position-center uk-text-center">
                                            <h3 class="uk-text-uppercase"><a
                                                    href="https://winecellar.vn/tim-hieu-ruou-vang-phap/"
                                                    class="uk-link-text" style="color: #990d23;">Tìm hiểu rượu vang
                                                    Pháp</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card uk-height-1-1">
                                    <a href="https://winecellar.vn/tim-hieu-ruou-vang-y/">
                                        <img
                                            src="https://winecellar.vn/wp-content/uploads/2023/03/tim-hieu-ve-ruou-vang-y.jpg"
                                            alt="Tìm hiểu rượu vang Ý" class="uk-width-1-1">
                                    </a>
                                    <div
                                        class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                                        <h3 class="uk-text-uppercase"><a
                                                href="https://winecellar.vn/tim-hieu-ruou-vang-y/"
                                                class="uk-link-text">Tìm hiểu rượu vang Ý</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card uk-card-default uk-height-1-1">
                                    <a href="https://winecellar.vn/tim-hieu-ruou-vang-my/">
                                        <img
                                            src="https://winecellar.vn/wp-content/uploads/2023/03/tim-hieu-ve-ruou-vang-my.jpg"
                                            alt="Tìm hiểu rượu vang Mỹ" class="uk-width-1-1">
                                    </a>
                                    <div
                                        class="uk-position-cover uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle">
                                        <h3 class="uk-text-uppercase"><a
                                                href="https://winecellar.vn/tim-hieu-ruou-vang-my/"
                                                class="uk-link-text" style="color: #990d23;">Tìm hiểu rượu vang
                                                Mỹ</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card uk-card-default uk-height-1-1">
                                    <a href="https://winecellar.vn/tim-hieu-ruou-vang-tay-ban-nha/">
                                        <img
                                            src="https://winecellar.vn/wp-content/uploads/2023/03/tim-hieu-ve-ruou-vang-tay-ban-nha.jpg"
                                            alt="Tìm hiểu rượu vang Tây Ban Nha" class="uk-width-1-1">
                                    </a>
                                    <div
                                        class="uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
                                        <h3 class="uk-text-uppercase"><a
                                                href="https://winecellar.vn/tim-hieu-ruou-vang-tay-ban-nha/"
                                                class="uk-link-text">Tìm hiểu rượu vang Tây Ban Nha</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_1643984231">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="uk-child-width-1-2@m" uk-grid>
                        <div class="">
                            <div class="uk-card   ">
                                <img src="https://winecellar.vn/wp-content/uploads/2021/07/basic-wine-guide.jpg"
                                     alt="basic wine guide" class="uk-width-1-1 uk-cover-container uk-height-large">
                            </div>
                        </div>
                        <div class="">
                            <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1 "
                                 style="background-color: rgb(243, 243, 243) !important;">
                                <h2 class="uk-card-title">Phát triển khả năng cảm nhận rượu vang</h2>
                                <p class="uk-text-justify">Bạn sẽ học được cách nhận biết hương vị trong rượu vang và
                                    xác định những lỗi bên trong rượu. Bên cạnh đó, việc thực hành nếm thử rượu cũng sẽ
                                    giúp bạn khám phá những hương vị tuyệt vời.</p>
                                <ul class="list">
                                    <li>
                                        <a href="https://winecellar.vn/tin-tuc-ruou-vang/nhung-quy-tac-co-ban-khi-thuong-thuc-ruou-vang/"
                                           class="uk-link-text">Các bước thưởng thức rượu vang đúng chuẩn chuyên gia</a>
                                    </li>
                                    <li>
                                        <a href="https://winecellar.vn/kien-thuc-ruou-vang/meo-ket-hop-ruou-vang-voi-do-an-ngon-chuan-vi/"
                                           class="uk-link-text">Mẹo kết hợp rượu vang với thực phẩm ngon chuẩn vị</a>
                                    </li>
                                    <li>
                                        <a href="https://winecellar.vn/kien-thuc-ruou-vang/ruou-vang-mo-nap-roi-de-duoc-trong-bao-lau/"
                                           class="uk-link-text">Rượu vang mở nắp rồi để được trong bao lâu</a></li>
                                </ul>
                                <a href="https://winecellar.vn/kien-thuc-ruou-vang-chuyen-sau/"
                                   class="custom-add-to-cart-button uk-button uk-button-primary  uk-margin-top uk-border-rounded">Tìm
                                    hiểu thêm</a>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_1814412409">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="">
                        <div class="uk-child-width-1-2@m" uk-grid>
                            <div class="">
                                <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1 "
                                     style="background-color: rgb(243, 243, 243) !important;">
                                    <h2 class="uk-card-title">Hướng dẫn bảo quản rượu vang đúng cách</h2>
                                    <ul class="list">
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/cach-tang-giam-nhiet-do-ruou-vang-dung-ky-thuat/"
                                               class="uk-link-text">Cách tăng giảm nhiệt độ rượu vang đúng kỹ thuật</a>
                                        </li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/tai-sao-750ml-lai-la-dung-tich-tieu-chuan-cua-chai-ruou-vang/"
                                               class="uk-link-text">Tại sao 750ml lại là dung tích tiêu chuẩn của chai
                                                rượu vang</a></li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/huong-dan-bao-quan-ruou-vang-dung-cach/"
                                               class="uk-link-text">Hướng dẫn bảo quản rượu vang đúng cách</a></li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/nhiet-do-anh-huong-the-nao-den-chat-luong-ruou-vang/"
                                               class="uk-link-text">Nhiệt độ ảnh thế nào đến chất lượng rượu vang?</a>
                                        </li>
                                        <li>
                                            <a href="https://winecellar.vn/kien-thuc-ruou-vang/cac-kich-thuoc-chai-ruou-vang/"
                                               class="uk-link-text">Các kích thước chai rượu vang người sành rượu nên
                                                biết</a></li>
                                    </ul>
                                    <a href="https://winecellar.vn/bao-quan-ruou-vang/"
                                       class="uk-button uk-button-primary custom-add-to-cart-button uk-margin-top uk-border-rounded">Tìm
                                        hiểu thêm</a>
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card  uk-flex uk-flex-center uk-flex-middle">
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2021/06/day-chai-lom-giup-viec-xep-ruou-de-dang-hon.jpg"
                                        alt="Đáy chai rượu vang lõm giúp việc xếp rượu dễ dàng hơn"
                                        class="uk-width-1-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_1220425891">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="">
                        <div class="uk-child-width-1-2@m" uk-grid>
                            <div class="">
                                <div class="uk-card  uk-flex uk-flex-center uk-flex-middle">
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2023/03/tip-hay-khi-thuong-thuc-ruou-vang.jpg"
                                        alt="Tips hay khi thưởng thức rượu vang" class="uk-width-1-1">
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1 "
                                     style="background-color: rgb(243, 243, 243) !important;">
                                    <h2 class="uk-card-title">Tips hay khi thưởng thức rượu vang</h2>
                                    <a href="https://winecellar.vn/cach-thuong-thuc-ruou-vang/"
                                       class="custom-add-to-cart-button uk-button uk-button-primary uk-margin-top uk-border-rounded">Tìm
                                        hiểu thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="uk-section uk-section-kt uk-padding-remove" id="section_1220425891">
                <div class="uk-section uk-section-content uk-padding-large uk-padding-remove-vertical">
                    <div class="">
                        <div  class="uk-child-width-1-2@m" uk-grid>
                            <div class="">
                                <div class="uk-card uk-card-default uk-card-body uk-padding-large uk-height-1-1 "
                                     style="background-color: rgb(243, 243, 243) !important;">
                                    <h2 class="uk-card-title">Food wine Pairing</h2>
                                    <a href="https://winecellar.vn/cach-thuong-thuc-ruou-vang/"
                                       class="custom-add-to-cart-button uk-button uk-button-primary uk-margin-top uk-border-rounded">Tìm
                                        hiểu thêm</a>
                                </div>
                            </div>
                            <div class="">
                                <div class="uk-card  uk-flex uk-flex-center uk-flex-middle">
                                    <img
                                        src="https://winecellar.vn/wp-content/uploads/2023/03/tip-hay-khi-thuong-thuc-ruou-vang.jpg"
                                        alt="Tips hay khi thưởng thức rượu vang" class="uk-width-1-1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

@endsection
