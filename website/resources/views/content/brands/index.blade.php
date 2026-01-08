@extends('content.layouts.app')

@section('title', '')

@section('style')
    <style>
        #stack-list-view > * {
            margin-left: 1rem;
        }

        #main, #wrapper {
            background-color: #fff;
            position: relative;
        }

        .heading-yellow > span {
            color: #B4975A;
            font-size: 32px;
        }

        .uk-subnav-pill > li > a {
            color: #b19458 !important;
            background: #FFFFFF !important;
            font-weight: 600;
            font-size: 18px !important;
        }

        .uk-subnav-pill > li {
            padding-left: 5px !important;
        }

        .uk-subnav-pill > li:hover > a {
            color: #990d23 !important; /* Set link color to red on hover */
        }

        .uk-subnav-pill > li.active > a {
            color: #990d23 !important; /* Set link color to red when active */
        }
    </style>
@endsection

@section('content')
       <section class="uk-section  uk-padding-remove ">
           <div class="">
               <div class="uk-position-relative uk-light  uk-height-large">
                   <img src="https://winecellar.vn/wp-content/uploads/2024/06/nsx-banner-scaled.jpg" class="uk-height-1-1 uk-width-1-1" alt="Rượu Vang">
                   <div class="uk-overlay-primary uk-position-cover"></div>
                   <div class="uk-position-left uk-width-1-1 uk-flex uk-flex-between uk-container">
                       <div class="uk-width-1-5"></div>
                       <div
                           class="uk-width-3-5 uk-text-center uk-padding-large uk-padding-remove-left uk-padding-remove-right uk-margin-large">
                           <h1 class="uk-text-large">DANH SÁCH NHÀ SẢN XUẤT</h1>
                           <p class="uk-text-default">
                               Danh mục sản phẩm của WINECELLAR.vn không ngừng mở rộng từ các thương hiệu rượu vang, bia,
                               whisky danh giá nhất thế giới đến các thương hiệu phụ kiện như ly pha lê Riedel, dụng cụ
                               chiết vang Coravin, thịt heo muối Iberico, nước khoáng, các thương hiệu gốm sứ Anh Wedgwood,
                               bánh quy Bỉ Jules Destrooper, trà Anh Quốc…
                           </p>
                       </div>
                       <div class="uk-width-1-5"></div>

                   </div>
               </div>
           </div>
       </section>

            <section class="uk-section">
                <div class="">
                    <div class="uk-padding-small">
                        <h2 class="heading-yellow uk-heading-line  uk-text-center"><span>THƯƠNG HIỆU NỔI BẬT</span></h2>
                    </div>
                    <div class="uk-slider-container uk-margin" tabindex="-1"
                         uk-slider="center: true; autoplay: true; autoplay-interval: 6000; pause-on-hover: true">

                        <ul class="uk-slider-items uk-child-width-1-5@s uk-grid">
                            @foreach($brands as $brand)
                                <li>
                                    <div class="uk-panel">
                                        <a href="">
                                            {{--                                        <a href="{{ route('brand.show', ['slug' => $brand->slug]) }}">--}}
                                            @if ($brand->logo)
                                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}">
                                            @else
                                                <img
                                                    src="https://winecellar.vn/wp-content/uploads/2024/03/Louis-latour-80.jpg"
                                                    alt="{{ $brand->name }}">
                                            @endif
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                           uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                           uk-slider-item="next"></a>
                    </div>

                </div>
            </section>

            <section class="uk-section uk-padding-remove">
                <div class="uk-padding ">
                    <div class="uk-margin-bottom">
                        <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: .filter-nav">
                            <li class="active"><a href="#" data-filter="*">Tất cả</a></li>
                            <li><a href="#" data-filter=".A">A</a></li>
                            <li><a href="#" data-filter=".B">B</a></li>
                            <li><a href="#" data-filter=".C">C</a></li>
                            <li><a href="#" data-filter=".D">D</a></li>
                            <li><a href="#" data-filter=".E">E</a></li>
                            <li><a href="#" data-filter=".F">F</a></li>
                            <li><a href="#" data-filter=".G">G</a></li>
                            <li><a href="#" data-filter=".H">H</a></li>
                            <li><a href="#" data-filter=".I">I</a></li>
                            <li><a href="#" data-filter=".J">J</a></li>
                            <li><a href="#" data-filter=".K">K</a></li>
                            <li><a href="#" data-filter=".L">L</a></li>
                            <li><a href="#" data-filter=".M">M</a></li>
                            <li><a href="#" data-filter=".N">N</a></li>
                            <li><a href="#" data-filter=".O">O</a></li>
                            <li><a href="#" data-filter=".P">P</a></li>
                            <li><a href="#" data-filter=".R">R</a></li>
                            <li><a href="#" data-filter=".S">S</a></li>
                            <li><a href="#" data-filter=".T">T</a></li>
                            <li><a href="#" data-filter=".V">V</a></li>
                            <li><a href="#" data-filter=".W">W</a></li>
                            <li><a href="#" data-filter=".Y">Y</a></li>
                        </ul>
                    </div>
                    <div class="uk-margin-bottom">
                        <ul class="uk-subnav uk-subnav-pill uk-flex-center" uk-switcher="connect: .filter-nav">
                            <li class=""><a href="#" data-filter=".Pháp">Pháp</a></li>
                            <li class=""><a href="#" data-filter=".Ý">Ý</a></li>
                            <li class=""><a href="#" data-filter=".Mỹ">Mỹ</a></li>
                            <li class=""><a href="#" data-filter=".Argentina">Argentina</a></li>
                            <li class=""><a href="#" data-filter=".Chile">Chile</a></li>
                            <li class=""><a href="#" data-filter=".Tây-Ban-Nha">Tây Ban Nha</a></li>
                            <li class=""><a href="#" data-filter=".Úc">Úc</a></li>
                            <li class=""><a href="#" data-filter=".New-Zealand">New Zealand</a></li>
                            <li class=""><a href="#" data-filter=".Đức">Đức</a></li>
                            <li class=""><a href="#" data-filter=".Bỉ">Bỉ</a></li>
                            <li class=""><a href="#" data-filter=".Nam-Phi">Nam Phi</a></li>
                        </ul>
                    </div>



                </div>


            </section>
        <section class="uk-section uk-padding">
            <div class="uk-child-width-1-2 uk-child-width-1-4@l uk-grid-medium uk-grid-match uk-grid" uk-grid="">
            @foreach($brands as $brand)
                    <div class="">
                        <div class="uk-card uk-card-default uk-card-body uk-padding-remove custom-card uk-border-rounded" style="background: #f5ecdb;">
                            <a href="{{ route('brands.show', ['slug' => $brand->slug]) }}" style="text-decoration: none; color: #0A0A0A" class="uk-padding-remove">
                                <img src="{{ $brand->image ? asset($brand->image) : 'https://winecellar.vn/wp-content/uploads/2024/04/chateau-dauzac.png' }}" alt="{{ $brand->name }}" class="uk-width-1-1 uk-border-rounded">
                                <h3 class="uk-text-default uk-text-center uk-margin-remove uk-padding-small uk-padding-remove-bottom" style="color: #0A0A0A;">{{ $brand->name }}</h3>
                                <div class="uk-flex uk-flex-between uk-flex-middle">
                                    <div class="uk-flex uk-flex-middle uk-margin-right uk-padding-small">
                                        <span uk-icon="icon: location" style="color: #b19458"></span>
                                        <span class="uk-margin-small-left">{{ $brand->country }}</span>
                                    </div>
                                    <div class="uk-flex uk-flex-middle uk-padding-small">
                                <span class="uk-margin-small-right">
                                    <img decoding="async" src="https://winecellar.vn/wp-content/themes/winecellarvn/assets/icons/icon_region.png" alt="Vùng" uk-img>
                                </span>
                                        {{ $brand->region }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

@endsection
