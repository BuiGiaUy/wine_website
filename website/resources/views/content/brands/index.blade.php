@extends('content.layouts.app')

@section('title', 'Danh Sách Nhà Sản Xuất')

@section('content')
    <!-- Hero Section -->
    <div class="product-banner uk-position-relative uk-background-cover uk-background-center-center" 
         style="background-image: url('https://winecellar.vn/wp-content/uploads/2024/06/nsx-banner-scaled.jpg'); height: 400px;">
        <div class="uk-overlay-primary uk-position-cover"></div>
        <div class="uk-position-center uk-text-center uk-light uk-container">
            <h1 class="uk-heading-medium" style="font-family: 'Playfair Display', serif;">DANH SÁCH NHÀ SẢN XUẤT</h1>
            <p class="uk-text-large uk-visible@s">
                Khám phá bộ sưu tập rượu vang, bia và whisky từ các thương hiệu danh giá nhất thế giới.
            </p>
        </div>
    </div>

    <!-- Featured Brands Slider -->
    <section class="uk-section bg-light">
        <div class="uk-container">
            <div class="section-header uk-text-center">
                <h2 class="section-title">THƯƠNG HIỆU NỔI BẬT</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">
                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-child-width-1-5@m uk-grid">
                    @foreach($brands as $brand)
                        <li>
                            <div class="brand-card h-100">
                                <a href="{{ route('brands.show', ['slug' => $brand->slug]) }}" class="uk-link-reset uk-width-1-1 uk-flex uk-flex-column uk-flex-middle">
                                    <img src="{{ $brand->image ? asset($brand->image) : 'https://winecellar.vn/wp-content/uploads/2024/03/Louis-latour-80.jpg' }}" 
                                         alt="{{ $brand->name }}" 
                                         class="brand-image">
                                    <h4 class="brand-name">{{ $brand->name }}</h4>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
    </section>

    <!-- All Brands with Filter -->
    <section class="uk-section">
        <div class="uk-container">
            <!-- Alphabet Filter -->
            <div class="uk-margin-medium-bottom alphabet-filter">
                <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: .filter-brand-grid">
                    <li class="active"><a href="#" data-filter="*">Tất cả</a></li>
                    @foreach(range('A', 'Z') as $char)
                         <!-- Only showing A-Z for demo, ideally disable ones with no brands -->
                        <li><a href="#" data-filter=".{{ $char }}">{{ $char }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Country Filter (Optional - kept structure for future JS logic if needed, currently just links) -->
            <div class="uk-margin-medium-bottom alphabet-filter uk-hidden">
                <ul class="uk-subnav uk-subnav-pill uk-flex-center">
                    <li><a href="#">Pháp</a></li>
                    <li><a href="#">Ý</a></li>
                    <li><a href="#">Mỹ</a></li>
                    <li><a href="#">Chile</a></li>
                    <!-- Add more countries as needed -->
                </ul>
            </div>

            <!-- Brand Grid -->
            <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-medium uk-grid-match filter-brand-grid" uk-grid>
                @foreach($brands as $brand)
                    <!-- Initial Letter Class for Filtering -->
                    @php 
                        $firstLetter = strtoupper(substr($brand->name, 0, 1)); 
                    @endphp
                    <div class="{{ $firstLetter }}">
                        <a href="{{ route('brands.show', ['slug' => $brand->slug]) }}" class="brand-card">
                            <img src="{{ $brand->image ? asset($brand->image) : 'https://winecellar.vn/wp-content/uploads/2024/04/chateau-dauzac.png' }}" 
                                 alt="{{ $brand->name }}" 
                                 class="brand-image">
                            <h3 class="brand-name">{{ $brand->name }}</h3>
                            
                            <div class="brand-meta">
                                @if($brand->country)
                                    <span><span uk-icon="icon: location; ratio: 0.8" class="uk-margin-small-right text-accent"></span>{{ $brand->country }}</span>
                                @endif
                                @if($brand->region)
                                    <span><span uk-icon="icon: world; ratio: 0.8" class="uk-margin-small-right text-accent"></span>{{ $brand->region }}</span>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
