@extends('content.layouts.app')

@section('title', 'Tìm kiếm: ' . $searchQuery)

@section('style')
    <style>
        .product-grid {
            background-color: #fff;
        }

        .uk-input {
            border: 1px solid #b4975a !important;
            border-radius: 5px;
            height: 3.0084em !important;
            color: #333 !important;
            background: #fff !important;
        }

        .uk-input:focus {
            border: 1px solid #990d23;
            box-shadow: 0 0 4px rgba(255, 0, 0, 0.5);
        }

        .checkout-button {
            transition: background-color 0.3s, color 0.3s;
            background: #b4975a;
            border-radius: 5px;
            font-weight: 700;
            color: #ffffff;
        }

        .checkout-button:hover {
            color: #ffffff;
            background-color: #907948;
        }

        .custom-add-to-cart-button {
            background: #990d23;
            color: #fff;
            font-weight: 600;
        }

        .custom-add-to-cart-button:hover {
            background: #7a0a1c;
            color: #fff;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .product-price {
            color: #990d23;
            font-weight: bold;
            font-size: 1.1em;
        }

        .filter-sidebar {
            background: #f9f5f0;
            border-radius: 10px;
        }

        .filter-title {
            color: #990d23;
            font-weight: 600;
        }

        .search-highlight {
            background: linear-gradient(135deg, #990d23, #7a0a1c);
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            {{-- Breadcrumb --}}
            @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])

            <h1 class="uk-heading-line uk-text-center uk-margin-medium-bottom">
                <span>Kết quả tìm kiếm cho: <span class="search-highlight">"{{ $searchQuery }}"</span></span>
            </h1>

            <div class="uk-grid-medium" uk-grid>
                {{-- Sidebar Filter --}}
                <div class="uk-width-1-4@m">
                    <div class="filter-sidebar uk-padding">
                        {{-- Search --}}
                        <div class="uk-margin-bottom">
                            <h4 class="filter-title">Tìm kiếm mới</h4>
                            <form action="{{ route('search') }}" method="get">
                                <div class="uk-position-relative">
                                    <input type="search" class="uk-input" name="q"
                                           placeholder="Tìm sản phẩm..."
                                           value="{{ $searchQuery }}">
                                    <button type="submit"
                                            class="uk-position-center-right checkout-button"
                                            style="height: 100%; min-width: 2.5em; padding: 0 .6em; border: none;">
                                        <span uk-icon="search"></span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Price Filter --}}
                        <div class="uk-margin-bottom">
                            <h4 class="filter-title">Phân khúc giá</h4>
                            <ul class="uk-nav uk-nav-default">
                                <li><a href="{{ request()->fullUrlWithQuery(['max_price' => 500000, 'min_price' => null]) }}">Dưới 500K</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 500000, 'max_price' => 1000000]) }}">500K - 1 triệu</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 1000000, 'max_price' => 3000000]) }}">1 - 3 triệu</a></li>
                                <li><a href="{{ request()->fullUrlWithQuery(['min_price' => 3000000, 'max_price' => null]) }}">Trên 3 triệu</a></li>
                                <li><a href="{{ route('search', ['q' => $searchQuery]) }}" class="uk-text-bold">Xóa bộ lọc</a></li>
                            </ul>
                        </div>

                        {{-- Category Filter --}}
                        <div class="uk-margin-bottom">
                            <h4 class="filter-title">Danh mục</h4>
                            <ul class="uk-nav uk-nav-default">
                                @foreach($navCategories as $category)
                                    <li><a href="{{ route('products.category', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Sort --}}
                        <div class="uk-margin-bottom">
                            <h4 class="filter-title">Sắp xếp</h4>
                            <form action="{{ route('search') }}" method="get">
                                <input type="hidden" name="q" value="{{ $searchQuery }}">
                                <select name="orderby" class="uk-select" onchange="this.form.submit()">
                                    <option value="created_at" {{ ($currentSort ?? '') == 'created_at' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="price" {{ ($currentSort ?? '') == 'price' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                                    <option value="price-desc" {{ ($currentSort ?? '') == 'price-desc' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                                </select>
                            </form>
                        </div>

                        {{-- Back to all products --}}
                        <div class="uk-margin-top">
                            <a href="{{ route('products.index') }}" class="uk-button uk-button-default uk-width-1-1">
                                <span uk-icon="arrow-left"></span> Xem tất cả sản phẩm
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Product Grid --}}
                <div class="uk-width-3-4@m">
                    {{-- Results info --}}
                    <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-bottom">
                        @if($products->total() > 0)
                            <p class="uk-text-meta uk-margin-remove">
                                Tìm thấy <strong>{{ $products->total() }}</strong> sản phẩm
                                (Hiển thị {{ $products->firstItem() }}–{{ $products->lastItem() }})
                            </p>
                        @else
                            <div class="uk-width-1-1 uk-text-center uk-padding-large">
                                <span uk-icon="icon: search; ratio: 3" style="color: #ddd;"></span>
                                <h3 class="uk-margin-top">Không tìm thấy sản phẩm nào</h3>
                                <p class="uk-text-muted">Thử tìm kiếm với từ khóa khác hoặc <a href="{{ route('products.index') }}" style="color: #990d23;">xem tất cả sản phẩm</a></p>
                            </div>
                        @endif
                    </div>

                    {{-- Products --}}
                    @if($products->count() > 0)
                        <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-medium" uk-grid>
                            @foreach ($products as $product)
                                <div>
                                    <div class="uk-card uk-card-default product-card">
                                        <div class="uk-card-media-top">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                @if ($product->featuredImage)
                                                    <img src="{{ $product->featuredImage->path }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                                @else
                                                    <img src="https://via.placeholder.com/300x400/722F37/D4AF37?text=BIGBA" alt="Default Image" style="width: 100%; height: 200px; object-fit: cover;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="uk-card-body uk-padding-small">
                                            <h5 class="uk-margin-small-bottom" style="height: 40px; overflow: hidden;">
                                                <a href="{{ route('products.show', $product->slug) }}" style="color: #333;">
                                                    {{ Str::limit($product->name, 45) }}
                                                </a>
                                            </h5>
                                            <p class="uk-text-small uk-text-muted uk-margin-remove">
                                                {{ $product->category->name ?? 'N/A' }}
                                            </p>
                                            <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-top">
                                                <span class="product-price">{{ number_format($product->price) }}₫</span>
                                                <a href="{{ route('products.show', $product->slug) }}"
                                                   class="uk-button uk-button-small uk-border-rounded custom-add-to-cart-button">
                                                    Xem
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="uk-flex uk-flex-center uk-margin-large-top">
                            {{ $products->links('content.components.pagination') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
