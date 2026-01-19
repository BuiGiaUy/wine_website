@extends('content.layouts.app')

@section('title', $product->name)

@section('content')
    <main id="main" class="product-detail-section bg-light">
        <div class="uk-container">
            {{-- Breadcrumb --}}
            @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])

            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@m uk-margin-medium-top" uk-grid style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
                {{-- Image Gallery --}}
                <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slideshow="animation: push; ratio: 3:4">
                    <ul class="uk-slideshow-items">
                        @if($product->images && $product->images->isNotEmpty() )
                            @foreach ($product->images as $image)
                                <li>
                                    <img src="{{ $image->path }}" alt="{{ $image->alt }}" uk-cover>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <img src="https://via.placeholder.com/600x800/722F37/D4AF37?text=BIGBA" alt="Product Image" uk-cover>
                            </li>
                        @endif
                    </ul>
                    
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                    
                    <div class="uk-position-top-right uk-padding-small">
                        <button class="wishlist-btn wishlist-btn-circle" 
                                aria-label="Wishlist"
                                data-product-id="{{ $product->id }}"
                                data-authenticated="{{ Auth::check() ? 'true' : 'false' }}">
                            <span uk-icon="heart"></span>
                        </button>
                    </div>

                    <div class="uk-position-bottom-center uk-position-small">
                        <ul class="uk-thumbnav">
                            @if($product->images && $product->images->isNotEmpty())
                                @foreach($product->images as $image)
                                    <li uk-slideshow-item="{{ $loop->index }}">
                                        <a href="#"><img src="{{ $image->path }}" width="60" alt="{{ $image->alt }}" class="product-gallery-thumb"></a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="uk-padding">
                    <span class="text-accent uk-text-uppercase uk-text-small uk-text-bold">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    <h1 class="product-title-large">{{ $product->name }}</h1>
                    
                     {{-- Rating --}}
                     @php
                        $avgRating = $product->averageRating();
                        $reviewCount = $product->reviewsCount();
                    @endphp
                    <div class="uk-flex uk-flex-middle uk-margin-small-bottom">
                         <div class="uk-margin-small-right">
                            @for($i = 1; $i <= 5; $i++)
                                <span uk-icon="icon: star" style="color: {{ $i <= round($avgRating) ? '#D4AF37' : '#ddd' }}"></span>
                            @endfor
                        </div>
                        <span class="uk-text-muted uk-text-small">({{ $reviewCount }} đánh giá)</span>
                    </div>

                    <p class="uk-text-justify uk-margin-medium-bottom">{{ $product->description }}</p>

                    <div class="product-info-box">
                        <div class="uk-grid-small uk-child-width-1-2" uk-grid>
                            <div class="product-meta-item">
                                <span uk-icon="database" class="product-meta-icon"></span>
                                <div>
                                    <div class="uk-text-small uk-text-muted">Dung tích</div>
                                    <div class="uk-text-bold">700ml</div>
                                </div>
                            </div>
                            <div class="product-meta-item">
                                <span uk-icon="home" class="product-meta-icon"></span>
                                <div>
                                    <div class="uk-text-small uk-text-muted">Nhà sản xuất</div>
                                    <div class="uk-text-bold">
                                        <a href="{{ route('brands.show', $product->brand->slug ?? '') }}" class="text-primary">{{ $product->brand->name ?? 'N/A' }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-meta-item">
                                <span uk-icon="tag" class="product-meta-icon"></span>
                                <div>
                                    <div class="uk-text-small uk-text-muted">Danh mục</div>
                                    <div class="uk-text-bold">{{ $product->category->name ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="product-meta-item">
                                <span uk-icon="bolt" class="product-meta-icon"></span>
                                <div>
                                    <div class="uk-text-small uk-text-muted">Nồng độ</div>
                                    <div class="uk-text-bold">40% ABV*</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="product-price-large">
                        {{ number_format($product->price, 0, ',', '.') }}₫
                    </p>

                    <form action="{{ route('cart.add') }}" method="post" class="uk-margin-medium-top">
                        @csrf
                        <div class="uk-flex uk-flex-middle">
                            <div class="quantity-control">
                                <button type="button" class="quantity-btn" onclick="decrementValue()">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                                <button type="button" class="quantity-btn" onclick="incrementValue()">+</button>
                            </div>
                            
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="image" value="{{ $product->featuredImage->path ?? 'https://via.placeholder.com/300' }}">
                            
                            <button type="submit" class="uk-button btn-primary-custom uk-width-expand">Thêm vào giỏ hàng</button>
                        </div>
                    </form>

                     <div class="uk-margin-top uk-padding-small" style="background: #fff5f5; border-radius: 8px;">
                        <ul class="uk-list uk-list-bullet uk-text-small uk-margin-remove">
                            <li>Cam kết hàng chính hãng 100%</li>
                            <li>Giao hàng miễn phí đơn từ 1.000.000đ</li>
                            <li>Hỗ trợ đổi trả trong 7 ngày</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="uk-grid-large uk-margin-large-top" uk-grid>
                <div class="uk-width-2-3@m">
                    <div class="section-header">
                        <h3 class="section-title" style="font-size: 1.5rem;">Thông Tin Chi Tiết</h3>
                    </div>
                    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom">
                        <p class="uk-text-justify">{{ $product->description }}</p>
                    </div>

                    <div class="section-header">
                        <h3 class="section-title" style="font-size: 1.5rem;">Câu Hỏi Thường Gặp</h3>
                    </div>
                     <ul uk-accordion="collapsible: false" class="uk-margin-bottom">
                        <li class="uk-open">
                            <a class="uk-accordion-title text-primary uk-text-bold" href="#">Làm sao để chọn được chai vang phù hợp?</a>
                            <div class="uk-accordion-content">
                                <p>Hãy liên hệ hotline 094 669 8008 hoặc chat trực tiếp, chuyên gia của chúng tôi sẽ tư vấn chai vang hoàn hảo cho khẩu vị của bạn.</p>
                            </div>
                        </li>
                        <li>
                            <a class="uk-accordion-title text-primary uk-text-bold" href="#">Chính sách thanh toán?</a>
                            <div class="uk-accordion-content">
                                <p>Hỗ trợ COD (tiền mặt khi nhận hàng), chuyển khoản và thanh toán online qua các cổng phổ biến.</p>
                            </div>
                        </li>
                        <li>
                            <a class="uk-accordion-title text-primary uk-text-bold" href="#">Thời gian giao hàng?</a>
                            <div class="uk-accordion-content">
                                <p>Nội thành: Tối đa 5 giờ. Các tỉnh khác: 1-2 ngày.</p>
                            </div>
                        </li>
                    </ul>

                    {{-- Reviews --}}
                    <div class="section-header">
                         <h3 class="section-title" style="font-size: 1.5rem;">Đánh Giá Khách Hàng</h3>
                    </div>

                    {{-- Rating Breakdown --}}
                    <div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
                         <div class="uk-grid-small uk-flex-middle" uk-grid>
                             <div class="uk-width-1-3@s uk-text-center">
                                 <div style="font-size: 4rem; font-weight: 800; color: var(--primary); line-height: 1;">
                                     {{ number_format($avgRating, 1) }}
                                 </div>
                                 <div class="uk-text-meta">trên 5 sao</div>
                             </div>
                             <div class="uk-width-2-3@s">
                                 @php
                                     $ratingCounts = [];
                                     for ($i = 5; $i >= 1; $i--) {
                                         $ratingCounts[$i] = $product->reviews()->where('rating', $i)->count();
                                     }
                                 @endphp
                                 @for($i = 5; $i >= 1; $i--)
                                     <div class="uk-grid-small uk-flex-middle uk-margin-remove" uk-grid>
                                         <div class="uk-width-auto uk-text-small">{{ $i }} <span uk-icon="star" style="width: 12px;"></span></div>
                                         <div class="uk-width-expand">
                                             <progress class="uk-progress uk-margin-remove" value="{{ $ratingCounts[$i] }}" max="{{ $reviewCount ?: 1 }}" style="height: 6px;"></progress>
                                         </div>
                                         <div class="uk-width-auto uk-text-small text-muted">{{ $ratingCounts[$i] }}</div>
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
                         <div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
                            <h4 class="text-primary uk-text-bold">{{ $userReview ? 'Cập nhật đánh giá' : 'Viết đánh giá của bạn' }}</h4>
                             <form action="{{ route('products.review.store', $product->slug) }}" method="POST">
                                @csrf
                                <div class="uk-margin">
                                    <label class="uk-form-label">Chọn mức đánh giá</label>
                                    <div class="star-rating-input">
                                         @for($i = 1; $i <= 5; $i++)
                                            <label>
                                                <input type="radio" name="rating" value="{{ $i }}" class="uk-hidden" {{ old('rating', $userReview->rating ?? 5) == $i ? 'checked' : '' }}>
                                                <span class="rating-star-large {{ $i <= ($userReview->rating ?? 5) ? 'active' : '' }}" data-value="{{ $i }}" uk-icon="icon: star; ratio: 1.5"></span>
                                            </label>
                                        @endfor
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <textarea class="uk-textarea" name="comment" rows="4" placeholder="Chia sẻ cảm nhận của bạn...">{{ old('comment', $userReview->comment ?? '') }}</textarea>
                                </div>
                                <button type="submit" class="uk-button btn-primary-custom">Gửi Đánh Giá</button>
                             </form>
                         </div>
                    @else
                         <div class="uk-alert-primary" uk-alert>
                             <p>Vui lòng <a href="{{ route('login') }}" class="uk-text-bold">đăng nhập</a> để viết đánh giá.</p>
                         </div>
                    @endauth

                    {{-- Reviews List --}}
                    @foreach($product->reviews as $review)
                        <div class="uk-card uk-card-default uk-card-body uk-margin-small-bottom">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-auto">
                                    <div class="review-avatar">
                                        {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class="uk-margin-remove-bottom uk-text-bold">{{ $review->user->name }}</h5>
                                    <div class="uk-text-meta uk-margin-small-bottom">{{ $review->created_at->format('d/m/Y') }}</div>
                                    <div>
                                        @for($i = 1; $i <= 5; $i++)
                                            <span uk-icon="star" style="color: {{ $i <= $review->rating ? '#D4AF37' : '#ddd' }}"></span>
                                        @endfor
                                    </div>
                                    <p class="uk-margin-small-top">{{ $review->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                
                <div class="uk-width-1-3@m">
                    <div class="uk-card uk-card-default uk-card-body">
                         <h4 class="uk-card-title text-primary uk-text-bold">Nổi Bật</h4>
                         {{-- Placeholder for related products or best sellers --}}
                         <p class="uk-text-muted">Danh sách sản phẩm liên quan sẽ hiển thị ở đây.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function incrementValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            document.getElementById('quantity').value = value + 1;
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                document.getElementById('quantity').value = value - 1;
            }
        }

        // Star rating interaction
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.rating-star-large');
            const inputs = document.querySelectorAll('input[name="rating"]');

            if(stars.length > 0) {
                 stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const val = this.getAttribute('data-value');
                        // Update UI
                        stars.forEach(s => {
                            if(s.getAttribute('data-value') <= val) {
                                s.classList.add('active');
                                s.style.color = '#D4AF37'; 
                            } else {
                                s.classList.remove('active');
                                s.style.color = '#ddd';
                            }
                        });
                        // Update radio
                        inputs.forEach(input => {
                            if(input.value == val) input.checked = true;
                        });
                    });
                });
            }
        });
    </script>
@endsection
