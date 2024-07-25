@extends('content.layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <header class="uk-background-cover uk-margin-remove-bottom uk-background-center-center uk-position-relative " data-src="https://winecellar.vn/wp-content/uploads/2022/04/pinot-noir-banner.jpg" uk-img style="margin-bottom: 40px">
        <div class="uk-overlay uk-overlay-primary uk-position-cover" style="background-color: rgba(0, 0, 0, 0.4); "></div>
        <section class="uk-section uk-section-large uk-text-center uk-position-relative">
            <div class="uk-container uk-container-large">
                <div class="uk-position-center uk-text-center">
                    <h1 class="uk-heading-default " style="color: #cccccc">
                        Rượu vang cho người mới bắt đầu
                    </h1>
                </div>
            </div>
        </section>
    </header>
    <section class="uk-section uk-section-small uk-padding-small" id="section_1984779848">
        <div class="uk-background-cover b"></div>
        @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])
    </section>
    <div class="uk-container uk-margin-top">
        <div class="uk-grid uk-grid-match uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>
            @foreach ($posts as $post)
                <!-- Blog Post Item -->
                <div class="uk-card  uk-card-hover ">
                    <div class="uk-card-media-top">
                        <img src="{{ $post->featuredImage->path }}" alt="{{ $post->featuredImage->alt }}" class="uk-img" style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="uk-padding-small">
                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}"  style="text-decoration: none;">
                            <h3 class="uk-text-large uk-text-center uk-margin-remove">{{ $post->name }}</h3>
                        </a>
                        <p class="uk-text-default uk-text-center uk-padding-small uk-margin-remove">{{ $post->description }}</p>
                    </div>
                </div>
            @endforeach

            <!-- Blog Post Item -->
            <div>
                <div class="uk-card uk-card-hover ">
                    <a href="https://winecellar.vn/15-mon-ngon-ket-hop-cung-ruou-vang/" style="text-decoration: none">
                        <div class="uk-card-media-top">
                            <img style="height: 250px" src="https://winecellar.vn/wp-content/uploads/2023/04/hai-san-va-ruou-vang-600x400.jpg" alt="15+ Món Ngon Ăn Kèm Với Rượu Vang" class="uk-img">
                        </div>
                        <h3 class="uk-text-large uk-text-center uk-padding-small uk-margin-remove">15+ Món Ngon Ăn Kèm Với Rượu Vang và 3 Quy Tắc Vàng Dành Cho Người Mới</h3>
                    </a>
                    <p class="uk-text-default uk-text-center uk-padding-small uk-margin-remove">Rượu vang và đồ ăn từ lâu vẫn đi liền với nhau, một chai rượu [...]</p>
                </div>
            </div>
            <!-- Repeat for other posts -->

        </div>
    </div>


@endsection
