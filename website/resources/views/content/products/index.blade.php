@extends('content.layouts.app')

@section('title', 'Tất cả sản phẩm')

@section('content')
    <div class="uk-section bg-light">
        <div class="uk-container">
            {{-- Breadcrumb --}}
            @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])

            <div class="section-header uk-margin-medium-bottom">
                <h1 class="section-title">Khám Phá Bộ Sưu Tập</h1>
                <p class="uk-text-lead uk-text-muted">Tuyển tập những chai rượu vang hảo hạng nhất thế giới</p>
            </div>

            <div class="uk-grid-large" uk-grid>
                {{-- Sidebar Filter --}}
                <div class="uk-width-1-4@m">
                    <div class="filter-sidebar uk-padding">
                        {{-- Search --}}
                        <div class="uk-margin-medium-bottom">
                            <h4 class="filter-title">Tìm kiếm</h4>
                            <form action="{{ route('products.index') }}" method="get">
                                <div class="uk-position-relative">
                                    <input type="search" class="uk-input uk-form-large" style="border-radius: 50px; border-color: rgba(0,0,0,0.1);" name="q"
                                           placeholder="Tìm sản phẩm..."
                                           value="{{ request('q') }}">
                                    <button type="submit"
                                            class="uk-position-center-right uk-icon-button"
                                            style="background: var(--accent); color: #fff; border: none; margin-right: 5px;">
                                        <span uk-icon="search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Price Filter --}}
                        <div class="uk-margin-medium-bottom">
                            <h4 class="filter-title">Phân khúc giá</h4>
                            <ul class="uk-nav uk-nav-default">
                                <li><a href="{{ request()->fullUrlWithQuery(['max_price' => 500000, 'min_price' => null]) }}"><span uk-icon="chevron-right" class="uk-margin-small-right"></span> Dưới 500K</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 500000, 'max_price' => 1000000]) }}"><span uk-icon="chevron-right" class="uk-margin-small-right"></span> 500K - 1 triệu</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 1000000, 'max_price' => 3000000]) }}"><span uk-icon="chevron-right" class="uk-margin-small-right"></span> 1 - 3 triệu</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 3000000, 'max_price' => null]) }}"><span uk-icon="chevron-right" class="uk-margin-small-right"></span> Trên 3 triệu</a></li>
                                <li class="uk-margin-small-top"><a href="{{ route('products.index') }}" class="uk-text-bold text-primary">Xem tất cả</a></li>
                            </ul>
                        </div>

                        {{-- Category Filter --}}
                        <div class="uk-margin-medium-bottom">
                            <h4 class="filter-title">Danh mục</h4>
                            <ul class="uk-nav uk-nav-default">
                                @foreach($navCategories as $category)
                                    <li><a href="{{ route('products.category', $category->slug) }}"><span uk-icon="chevron-right" class="uk-margin-small-right"></span> {{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Sort --}}
                        <div>
                            <h4 class="filter-title">Sắp xếp</h4>
                            <form action="{{ route('products.index') }}" method="get">
                                <select name="orderby" class="uk-select uk-form-large" style="border-radius: 50px; border-color: rgba(0,0,0,0.1);" onchange="this.form.submit()">
                                    <option value="created_at" {{ request('orderby') == 'created_at' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="price" {{ request('orderby') == 'price' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                                    <option value="price-desc" {{ request('orderby') == 'price-desc' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                                </select>
                                @if(request('q'))
                                    <input type="hidden" name="q" value="{{ request('q') }}">
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="uk-width-3-4@m">
                    {{-- Results info --}}
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
                        @if($products->total() > 0)
                            <p class="uk-text-meta uk-margin-remove">
                                Hiển thị <span class="uk-text-bold text-primary">{{ $products->firstItem() }}–{{ $products->lastItem() }}</span> của <span class="uk-text-bold">{{ $products->total() }}</span> sản phẩm
                            </p>
                        @else
                            <p class="uk-text-meta uk-margin-remove">Không tìm thấy sản phẩm nào.</p>
                        @endif
                    </div>

                    {{-- Products --}}
                    <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-medium" uk-grid>
                        @foreach ($products as $product)
                            <div>
                                <div class="product-card">
                                    <div class="product-image-container">
                                        <a href="{{ route('products.show', $product->slug) }}">
                                            @if ($product->featuredImage)
                                                <img src="{{ $product->featuredImage->path }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA" alt="{{ $product->name }}">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <span class="product-category">{{ $product->category->name ?? 'N/A' }}</span>
                                        <h3 class="product-name">
                                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <span class="product-price">{{ number_format($product->price) }}₫</span>
                                        <a href="{{ route('products.show', $product->slug) }}" class="product-btn">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="uk-flex uk-flex-center uk-margin-large-top">
                        {{ $products->appends(request()->query())->links('content.components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
