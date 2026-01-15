@extends('content.layouts.app')

@section('title', $product->name)

@section('style')
    <style>
        /* Add this to your CSS file */
        .uk-flex-middle {
            align-items: center;
        }

        .uk-width-auto {
            flex: 0 0 auto;
        }

        .uk-input {
            text-align: center;
        }

        .ux-quantity__button {
            cursor: pointer;
            font-size: 18px;
        }

        .ux-quantity__button:hover {
            opacity: 0.8;
        }

        .uk-flex-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }

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

        .btn-winea {
            color: #990d23; /* Thay đổi màu chữ khi hover */
            font-weight: 500;
        }

        .btn-winea:hover {
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

        .heading-yellow > span {
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
                        @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])
                    </section>

                    <section class="uk-section uk-section-small product-detail__row product-detail__gallery"
                             id="section_1403097712">
                        <div class="uk-background-cover bg section-bg fill bg-fill bg-loaded"></div>
                        <div class="uk-container ">
                            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-3@m"
                                 id="row-566856114">
                                <div id="col-1218010425" class="uk-width-1-3@m">
                                    <div class="uk-card uk-card-body uk-padding-remove"  uk-slideshow="animation: push">
                                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
                                             uk-slideshow="animation: push; autoplay: false;">
                                            <div class="uk-slideshow-items" style="height: 506.65px;">
                                                @if($product->images && $product->images->isNotEmpty() )
                                                    @foreach ($product->images as $image)
                                                        <div>
                                                            <img src="{{ $image->path }}" alt="{{ $image->alt }}" uk-cover>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div>
                                                        <img
                                                            src="https://via.placeholder.com/400x500/722F37/D4AF37?text=BIGBA"
                                                            alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)"
                                                            uk-cover>
                                                    </div>
                                                @endif


                                            </div>

                                            <a class="uk-position-center-left uk-position-small uk-hidden-hover"
                                               href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                            <a class="uk-position-center-right uk-position-small uk-hidden-hover"
                                               href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                        </div>


                                        <!-- Wishlist Button -->
                                        <div class="uk-position-top-right uk-padding-small uk-margin-small-top">
                                            <button class="btn-icon wishlist-btn"
                                                    aria-label="Wishlist"
                                                    data-product-id="{{ $product->id }}"
                                                    data-authenticated="{{ Auth::check() ? 'true' : 'false' }}">
                                                <span uk-icon="heart" class="wishlist-icon"></span>
                                            </button>
                                        </div>

                                        <!-- Thumbnail Navigation -->
                                        <div class="uk-thumbnav uk-flex-center">
                                                @if($product->images && $product->images->isNotEmpty())
                                                <ul class="uk-slideshow-nav ">
                                                    @foreach($product->images as $image)
                                                        <li uk-slideshow-item="{{ $loop->index }}">
                                                            <a href="#">
                                                                <img src="{{ $image->path }}" width="100" height="100" alt="{{ $image->alt }}">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                @else
                                                    <div uk-slideshow-item="0">
                                                        <a href="#">
                                                            <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA"
                                                                 width="100" height="100" alt="Rượu Vang Ý 60 Sessantanni Limited Edition (24 Karat Gold)">
                                                        </a>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>

                                </div>

                                <div id="col-{{ $product->id }}" class="col uk-width-1-3@m">
                                    <div class="uk-card uk-padding-remove uk-card-body">
                                        <h1 class="uk-text-bold uk-text-large btn-wine">{{ $product->name }}</h1>
{{--                                        rating--}}
                                        @php
                                            $avgRating = $product->averageRating();
                                            $reviewCount = $product->reviewsCount();
                                            $ratingWidth = ($avgRating / 5) * 100;
                                        @endphp
                                        <div class="uk-margin" uk-margin>
                                            <div class="uk-flex" uk-grid>
                                                <div class="uk-width-auto">
                                                    <div class="uk-position-relative uk-display-inline-block">
                                                        <div class="uk-position-relative uk-display-inline-block">
                                                            <div class="uk-display-inline-block uk-position-relative" style="color: #ddd;">
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                            </div>
                                                            <div class="uk-position-absolute uk-position-cover uk-display-inline-block"
                                                                 style="overflow: hidden; width: {{ $ratingWidth }}%; color: #D4AF37;">
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                                <span uk-icon="icon: star"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-auto">
                                                    <span class="uk-text-muted uk-margin-small-left">{{ $avgRating > 0 ? $avgRating : '-' }}/5 - ({{ $reviewCount }} đánh giá)</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-text-small">
                                            <p style="text-align: justify;">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                        <div class="uk-card uk-border-bottom">
                                            <div class="uk-grid-small uk-child-width-1-2 " uk-grid>
                                                <div class="uk-flex">
                                                    <div class="uk-margin-small-right" style="color: #990d23;">
                                                        <span uk-icon="icon: database; ratio: 1.2"></span>
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Dung tích</div>
                                                        <div class="uk-text-bold">
                                                            <p>700ml</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex">
                                                    <div class="uk-margin-small-right" style="color: #990d23;">
                                                        <span uk-icon="icon: home; ratio: 1.2"></span>
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Nhà sản xuất</div>
                                                        <div class="uk-text-bold">
                                                            <p><a href="{{ route('brands.show', $product->brand->slug) }}"
                                                                  class="btn-wine " rel="tag">{{ $product->brand->name }}</a></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex">
                                                    <div class="uk-margin-small-right" style="color: #990d23;">
                                                        <span uk-icon="icon: tag; ratio: 1.2"></span>
                                                    </div>
                                                    <div class="uk-text-small">
                                                        <div class="pa-info__label">Danh mục</div>
                                                        <div class="uk-text-bold">
                                                            <p>{{ $product->category->name ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="uk-flex uk-margin-remove-top">
                                                    <div class="uk-margin-small-right" style="color: #990d23;">
                                                        <span uk-icon="icon: bolt; ratio: 1.2"></span>
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
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="uk-divider-small">
                                        <div id="text-3363948913"
                                             class=" uk-margin-remove-bottom "
                                             style="background: #f7f7f7">
                                            <ul class="uk-list uk-list-bullet uk-text-small uk-padding-small">
                                                <li>Giá sản phẩm đã bao gồm VAT</li>
                                                <li>Phí giao hàng tùy theo từng khu vực.</li>
                                                <li>Đơn hàng từ 1.000.000vnđ miễn phí giao hàng.</li>
                                            </ul>
                                        </div>
                                        <div class="">
                                            <p class="uk-text-default btn-wine" style="font-size: 22px">
                                                <span >
                                                    <bdi>
                                                        {{ number_format($product->price, 0, ',', '.') }}
                                                        <span>₫</span>
                                                    </bdi>
                                                </span>
                                            </p>
                                        </div>


                                        <!-- resources/views/products/show.blade.php -->

                                        <div class="uk-margin">
                                            <form class="uk-grid-small" action="{{ route('cart.add') }}" method="post" enctype="multipart/form-data" uk-grid>
                                                @csrf
                                                <div class="uk-padding-remove uk-flex uk-flex-middle" style="width: 120px;">
                                                    <div class="uk-width-auto">
                                                        <button type="button" class="ux-quantity__button ux-quantity__button--minus uk-button uk-button-default" style="padding: 2px 10px; font-size: 18px;">-</button>
                                                    </div>
                                                    <div class="uk-width-auto uk-flex uk-flex-center">
                                                        <input type="number" id="quantity" size="4" class="uk-input" name="quantity" value="1" aria-label="Product quantity" min="1" step="1" autocomplete="off" style="text-align: center; width: 30px;">
                                                    </div>
                                                    <div class="uk-width-auto">
                                                        <button type="button" class="ux-quantity__button ux-quantity__button--plus uk-button uk-button-default" style="padding: 2px 10px; font-size: 18px;">+</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->price }}">
                                                <input type="hidden" name="image" value="@if($product->featuredImage){{ $product->featuredImage->path }} @else https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA  @endif">
                                                <input type="hidden" name="url" value="{{ route('products.show', $product->slug) }}">
                                                <div class="wcl-button w-50 uk-text-right">
                                                    <button type="submit" name="add-to-cart" class="uk-margin-small uk-button uk-button-primary uk-border-rounded custom-add-to-cart-button">
                                                        Thêm vào giỏ hàng
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div id="col-317425088" class="uk-margin-top">
                                    <div class="col-inner">
                                        <div class="uk-card uk-card-default uk-card-body ">
                                            <div class="uk-grid-small " uk-grid>
                                                <div class="uk-width-auto">
                                                    <div class="icon-box-img uk-border-circle uk-box-shadow-medium" style="padding: 10px; background: #990d23;">
                                                        <span uk-icon="icon: receiver; ratio: 1.2" style="color: #fff;"></span>
                                                    </div>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <div class=" ">
                                                        <h5 class="uppercase">Hotline</h5>
                                                        <p><a class="btn-winea" href="tel:0946.698.008">0946.698.008</a>
                                                        </p>
                                                        <p><a class="btn-winea" href="tel:0903.520.268">0903.520.268</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="text-412004289" class="text wcl-text-uu-dai uk-margin-top">
                                            <div class="uk-card uk-card-default uk-card-body">
                                                <p style="text-align: center;"><strong>Ưu đãi thêm</strong></p>
                                                <ul class="uk-list uk-list-bullet">
                                                    <li><span style="font-size: 100%;">Quà tặng khui rượu vang cho đơn đặt hàng đầu tiên.</span>
                                                    </li>
                                                    <li><span style="font-size: 100%;">Giảm thêm 5%/tổng hóa đơn cho tháng sinh nhật.</span>
                                                    </li>
                                                    <li><span style="font-size: 100%;">Liên hệ B2B để được tư vấn giá tốt nhất cho khách hàng doanh nghiệp khi mua số lượng nhiều.</span>
                                                    </li>
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
                                        <h3 class="heading-yellow uk-heading-line  uk-text-center"><span>Thông tin sản phẩm</span>
                                        </h3>
                                        <div class="product-detail__content uk-text-justify">
                                            <p>{{ $product->description }}</p>
                                        </div>
                                        <h3 class="heading-yellow uk-heading-line uk-text-center"><span>Những câu hỏi thường gặp</span>
                                        </h3>
                                        <ul uk-accordion>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Làm sao để chọn được chai vang phù hợp nhất?</a>
                                                <div class="uk-accordion-content">
                                                    <ul>
                                                        <li>Trò chuyện trực tiếp với chúng tôi để được tư vấn dòng vang phù hợp nhất</li>
                                                        <li>Liên hệ qua HOTLINE 094 669 8008 để được tư vấn nhanh nhất</li>
                                                        <li>Xem thêm các bài viết, tin tức về rượu vang tại <a href="{{ route('posts.index') }}">mục Tin tức</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Chính sách thanh toán</a>
                                                <div class="uk-accordion-content">
                                                    <p>Chúng tôi hỗ trợ nhiều hình thức thanh toán: tiền mặt khi nhận hàng (COD), chuyển khoản ngân hàng, và thanh toán online qua các cổng thanh toán phổ biến.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Thời gian giao hàng trong bao lâu?</a>
                                                <div class="uk-accordion-content">
                                                    <p>Ngay sau khi tiếp nhận được yêu cầu từ quý khách, chúng tôi sẽ chuẩn bị và đóng gói sản phẩm nhanh nhất có thể. Thông thường, thời gian giao hàng tại nội thành tối đa 5 giờ, các tỉnh khác từ 1-2 ngày.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a class="uk-accordion-title" href="#">Chính sách đổi trả</a>
                                                <div class="uk-accordion-content">
                                                    <p>Chúng tôi cam kết đổi trả sản phẩm trong vòng 7 ngày nếu sản phẩm bị lỗi do nhà sản xuất hoặc trong quá trình vận chuyển. Vui lòng liên hệ hotline để được hỗ trợ.</p>
                                                </div>
                                            </li>
                                        </ul>

                                        {{-- Reviews Section --}}
                                        <h3 class="heading-yellow uk-heading-line uk-text-center uk-margin-large-top">
                                            <span>Đánh giá sản phẩm ({{ $product->reviewsCount() }})</span>
                                        </h3>

                                        @if(session('success'))
                                            <div class="uk-alert-success" uk-alert>
                                                <a class="uk-alert-close" uk-close></a>
                                                <p>{{ session('success') }}</p>
                                            </div>
                                        @endif

                                        @if($errors->any())
                                            <div class="uk-alert-danger" uk-alert>
                                                <a class="uk-alert-close" uk-close></a>
                                                <ul class="uk-list">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        {{-- Average Rating Display --}}
                                        <div class="uk-card uk-card-default uk-card-body uk-margin">
                                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                                <div class="uk-width-auto">
                                                    <div class="uk-text-center">
                                                        <div style="font-size: 48px; font-weight: bold; color: #990d23;">
                                                            {{ $product->averageRating() > 0 ? $product->averageRating() : '-' }}
                                                        </div>
                                                        <div class="uk-flex uk-flex-center">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= floor($product->averageRating()))
                                                                    <span uk-icon="icon: star" style="color: #D4AF37;"></span>
                                                                @elseif($i - 0.5 <= $product->averageRating())
                                                                    <span uk-icon="icon: star" style="color: #D4AF37; opacity: 0.5;"></span>
                                                                @else
                                                                    <span uk-icon="icon: star" style="color: #ddd;"></span>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <div class="uk-text-muted uk-text-small">{{ $product->reviewsCount() }} đánh giá</div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-expand">
                                                    @php
                                                        $totalReviews = $product->reviewsCount() ?: 1;
                                                        $ratingCounts = [];
                                                        for ($i = 5; $i >= 1; $i--) {
                                                            $ratingCounts[$i] = $product->reviews()->where('rating', $i)->count();
                                                        }
                                                    @endphp
                                                    @for($i = 5; $i >= 1; $i--)
                                                        <div class="uk-grid-small uk-flex-middle uk-margin-small" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <span>{{ $i }}</span>
                                                                <span uk-icon="icon: star; ratio: 0.8" style="color: #D4AF37;"></span>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <progress class="uk-progress" value="{{ $ratingCounts[$i] }}" max="{{ $totalReviews }}" style="height: 8px;"></progress>
                                                            </div>
                                                            <div class="uk-width-auto uk-text-muted uk-text-small" style="width: 30px;">
                                                                {{ $ratingCounts[$i] }}
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Review Form --}}
                                        @auth
                                            @php
                                                $userReview = $product->reviews()->where('user_id', Auth::id())->first();
                                            @endphp
                                            <div class="uk-card uk-card-default uk-card-body uk-margin">
                                                <h4 class="uk-margin-small-bottom" style="color: #990d23;">
                                                    {{ $userReview ? 'Cập nhật đánh giá của bạn' : 'Viết đánh giá' }}
                                                </h4>
                                                <form action="{{ route('products.review.store', $product->slug) }}" method="POST">
                                                    @csrf
                                                    <div class="uk-margin">
                                                        <label class="uk-form-label">Đánh giá của bạn *</label>
                                                        <div class="uk-flex uk-flex-middle star-rating-input" style="gap: 5px;">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <label style="cursor: pointer;">
                                                                    <input type="radio" name="rating" value="{{ $i }}" class="uk-hidden" {{ old('rating', $userReview->rating ?? 5) == $i ? 'checked' : '' }}>
                                                                    <span uk-icon="icon: star; ratio: 1.5" class="rating-star" data-value="{{ $i }}" style="color: {{ $i <= ($userReview->rating ?? 5) ? '#D4AF37' : '#ddd' }};"></span>
                                                                </label>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="uk-margin">
                                                        <label class="uk-form-label" for="comment">Nhận xét</label>
                                                        <textarea class="uk-textarea" id="comment" name="comment" rows="4" placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm này...">{{ old('comment', $userReview->comment ?? '') }}</textarea>
                                                    </div>
                                                    <div class="uk-margin">
                                                        <button type="submit" class="uk-button" style="background: #990d23; color: #fff; border-radius: 5px;">
                                                            <span uk-icon="check"></span> {{ $userReview ? 'Cập nhật đánh giá' : 'Gửi đánh giá' }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="uk-card uk-card-default uk-card-body uk-margin uk-text-center">
                                                <p>Vui lòng <a href="{{ route('login') }}" style="color: #990d23; font-weight: 600;">đăng nhập</a> để viết đánh giá.</p>
                                            </div>
                                        @endauth

                                        {{-- Reviews List --}}
                                        @if($product->reviews->count() > 0)
                                            <div class="uk-margin-medium-top">
                                                @foreach($product->reviews as $review)
                                                    <div class="uk-card uk-card-default uk-card-body uk-margin-small">
                                                        <div class="uk-grid-small" uk-grid>
                                                            <div class="uk-width-auto">
                                                                <div class="uk-border-circle uk-flex uk-flex-center uk-flex-middle" style="width: 50px; height: 50px; background: #990d23; color: #fff; font-weight: bold; font-size: 18px;">
                                                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                                                </div>
                                                            </div>
                                                            <div class="uk-width-expand">
                                                                <div class="uk-flex uk-flex-between uk-flex-middle">
                                                                    <div>
                                                                        <h5 class="uk-margin-remove-bottom uk-text-bold">{{ $review->user->name }}</h5>
                                                                        <div class="uk-flex" style="gap: 2px;">
                                                                            @for($i = 1; $i <= 5; $i++)
                                                                                <span uk-icon="icon: star; ratio: 0.8" style="color: {{ $i <= $review->rating ? '#D4AF37' : '#ddd' }};"></span>
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                    <div class="uk-text-muted uk-text-small">
                                                                        {{ $review->created_at->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                                @if($review->comment)
                                                                    <p class="uk-margin-small-top uk-margin-remove-bottom">{{ $review->comment }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <div class="uk-text-center uk-margin-medium-top uk-text-muted">
                                                <span uk-icon="icon: comments; ratio: 2"></span>
                                                <p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                                            </div>
                                        @endif
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

    <script>
    // Interactive star rating
    document.addEventListener('DOMContentLoaded', function() {
        const ratingContainer = document.querySelector('.star-rating-input');
        if (ratingContainer) {
            const stars = ratingContainer.querySelectorAll('.rating-star');
            const inputs = ratingContainer.querySelectorAll('input[name="rating"]');

            function updateStars(value) {
                stars.forEach((star, index) => {
                    if (index < value) {
                        star.style.color = '#D4AF37';
                    } else {
                        star.style.color = '#ddd';
                    }
                });
            }

            stars.forEach((star, index) => {
                star.addEventListener('mouseenter', function() {
                    updateStars(index + 1);
                });

                star.addEventListener('click', function() {
                    const value = index + 1;
                    inputs.forEach(input => {
                        input.checked = (parseInt(input.value) === value);
                    });
                    updateStars(value);
                });
            });

            ratingContainer.addEventListener('mouseleave', function() {
                let checkedValue = 5;
                inputs.forEach(input => {
                    if (input.checked) checkedValue = parseInt(input.value);
                });
                updateStars(checkedValue);
            });
        }
    });
    </script>
@endsection
