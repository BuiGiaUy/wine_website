@extends('content.layouts.app')

@section('title', 'Blog Posts')

@section('content')
    <!-- Hero Section -->
    <header class="uk-background-cover uk-background-center-center uk-position-relative uk-height-medium uk-flex uk-flex-center uk-flex-middle" 
            data-src="https://winecellar.vn/wp-content/uploads/2022/04/pinot-noir-banner.jpg" uk-img>
        <div class="uk-overlay uk-overlay-primary uk-position-cover" style="background-color: rgba(0, 0, 0, 0.5);"></div>
        <div class="uk-position-relative uk-text-center uk-light z-index-1">
            <h1 class="hero-title uk-margin-remove">Kiến Thức Rượu Vang</h1>
             <p class="uk-text-lead uk-margin-small-top">Khám phá thế giới rượu vang đầy cảm hứng</p>
        </div>
    </header>

    <section class="uk-section bg-light">
        <div class="uk-container">
            <!-- Breadcrumb -->
            <div class="uk-margin-medium-bottom">
                 @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])
            </div>

            <!-- Blog Grid -->
            <div class="uk-grid-medium uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-match" uk-grid>
                @foreach ($posts as $post)
                    <div>
                        <div class="blog-card">
                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="uk-link-reset">
                                <div class="uk-cover-container blog-card-image">
                                    @if ($post->featuredImage)
                                        <img src="{{ asset($post->featuredImage->path) }}" alt="{{ $post->name }}" uk-cover>
                                    @else
                                        <img src="https://winecellar.vn/wp-content/uploads/2023/04/hai-san-va-ruou-vang-600x400.jpg" alt="Default Image" uk-cover>
                                    @endif
                                </div>
                            </a>
                            <div class="blog-card-body">
                                <h3 class="blog-title">
                                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                                </h3>
                                <p class="blog-excerpt">
                                    {{ Str::limit($post->description, 120) }}
                                </p>
                                <div class="uk-margin-auto-top">
                                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="uk-button uk-button-text text-primary">Đọc tiếp <span uk-icon="arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="uk-margin-large-top">
                 {{ $posts->links('content.components.pagination') }}
            </div>
        </div>
    </section>
@endsection
