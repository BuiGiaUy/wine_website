@extends('content.layouts.app')

@section('title', $brand->name)

@section('content')
<div class="bg-light uk-section-small">
   <div class="uk-container">
       <div class="uk-text-center">
            @if($brand->logo)
                <img src="{{ asset($brand->logo) }}" class="uk-border-circle uk-box-shadow-medium bg-white uk-padding-small uk-margin-bottom" style="width: 120px; height: 120px; object-fit: contain;">
            @endif
           <h1 class="product-title-large uk-margin-small-bottom">{{ $brand->name }}</h1>
           
           @if($brand->country || $brand->region)
           <div class="uk-text-meta uk-text-uppercase uk-margin-small-bottom uk-flex uk-flex-center uk-flex-middle">
               <span uk-icon="location" class="uk-margin-small-right text-accent"></span>
               <span>{{ $brand->country }}</span>
               @if($brand->region)
                <span class="uk-margin-small-left uk-margin-small-right">-</span>
                <span>{{ $brand->region }}</span>
               @endif
           </div>
           @endif

           @if($brand->description)
           <div class="uk-width-2-3@m uk-margin-auto">
               <p class="uk-text-muted">{{ $brand->description }}</p>
           </div>
           @endif
       </div>
   </div>
</div>

<div class="uk-section">
   <div class="uk-container">
       <div class="section-header uk-text-center uk-margin-medium-bottom">
            <span class="section-subtitle">Khám phá</span>
           <h3 class="section-title">SẢN PHẨM CỦA {{ strtoupper($brand->name) }}</h3>
           <div class="section-divider mx-auto"></div>
       </div>

       @if($products->count() > 0)
           <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-medium uk-grid-match" uk-grid>
               @foreach($products as $product)
                   <div>
                       <div class="product-card h-100">
                            <!-- Image -->
                            <div class="product-image-container">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <img src="{{ $product->featuredImage ? asset($product->featuredImage->path) : asset('frontend/images/default.jpg') }}" 
                                         alt="{{ $product->name }}" 
                                         class="product-image">
                                </a>
                                @if($product->discount_percent > 0)
                                    <span class="product-badge badge-sale">-{{ $product->discount_percent }}%</span>
                                @elseif($product->is_new)
                                     <span class="product-badge badge-new">New</span>
                                @endif
                                <div class="product-actions">
                                    <button class="action-btn wishlist-btn" 
                                            data-product-id="{{ $product->id }}" 
                                            data-authenticated="{{ Auth::check() ? 'true' : 'false' }}"
                                            uk-tooltip="Thêm vào yêu thích">
                                        <span uk-icon="heart"></span>
                                    </button>
                                </div>
                            </div>
                            <!-- Info -->
                            <div class="product-info uk-flex uk-flex-column">
                                <div class="product-category">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </div>
                                <h3 class="product-name uk-margin-remove-top">
                                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                
                                <div class="product-rating uk-margin-small-bottom">
                                    <span class="rating-stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span uk-icon="icon: star; ratio: 0.8" class="{{ $i <= $product->rating_value ? 'text-warning' : 'text-muted' }}"></span>
                                        @endfor
                                    </span>
                                    <span class="rating-count text-muted uk-text-small">({{ $product->reviews_count ?? 0 }})</span>
                                </div>

                                <div class="uk-margin-auto-top">
                                    <div class="product-price-wrapper">
                                         @if($product->discount_percent > 0)
                                            <span class="product-price-original">{{ number_format($product->price) }}đ</span>
                                            <span class="product-price">{{ number_format($product->price * (1 - $product->discount_percent/100)) }}đ</span>
                                         @else
                                            <span class="product-price">{{ number_format($product->price) }}đ</span>
                                         @endif
                                    </div>
                                     <form action="{{ route('cart.add') }}" method="POST" class="uk-margin-small-top">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="product-btn uk-width-1-1">Thêm vào giỏ</button>
                                    </form>
                                </div>
                            </div>
                       </div>
                   </div>
               @endforeach
           </div>

           <div class="uk-margin-large-top">
               {{ $products->links('content.components.pagination') }}
           </div>
       @else
           <div class="uk-placeholder uk-text-center">
               <span uk-icon="icon: database; ratio: 2"></span>
               <p class="uk-text-muted">Hiện chưa có sản phẩm nào của thương hiệu này.</p>
               <a href="{{ route('products.index') }}" class="btn-primary-custom uk-button uk-button-small">Xem tất cả sản phẩm</a>
           </div>
       @endif
   </div>
</div>
@endsection
