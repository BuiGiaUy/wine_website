@extends('content.layouts.app')

@section('title', $post->title)
@section('style')
    <style>
        .responsive-image {
            width: 100%;
            max-width: 900px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .comment, .reply {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }

        .comment-header, .reply-header {
            margin-bottom: 10px;
        }

        .comment-body, .reply-body {
            margin-bottom: 10px;
        }

        .comment .reply {
            margin-left: 30px;
            border-color: #e0e0e0;
        }

        .uk-comment-header {
            margin-bottom: 10px;
        }

        .uk-comment-title {
            margin-bottom: 5px;
        }

        .uk-comment-body {
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
    <section class="uk-section uk-section-small uk-padding-small" id="section_1984779848">
        <div class="uk-background-cover b"></div>
        @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])
    </section>

    <div class="uk-container">
        <article class="uk-article">
            <h1 class="uk-article-title">{{ $post->title }}</h1>
            <p class="uk-text-meta">Published on {{ $post->created_at->format('F d, Y') }}</p>
            <div class="uk-margin">
                {!! $post->content !!}
            </div>
            <a class="uk-button uk-button-default" href="{{ route('posts.index') }}">Back to Posts</a>
        </article>

        <section class="uk-section uk-section-muted uk-padding-small uk-margin-large-bottom uk-margin-top">
            <h2 class="uk-heading-line"><span>Comments</span></h2>

            @auth
                <div class="uk-flex uk-flex-middle uk-margin-bottom">
                    <img src="{{ auth()->user()->avatar ?? 'https://tse1.mm.bing.net/th?id=OIP.Sw0g2adwtwCJAbIAveYGbgHaHa&pid=Api&P=0&h=180' }}"
                         alt="{{ auth()->user()->name }}'s avatar"
                         class="uk-border-circle"
                         width="50" height="50">
                    <form method="POST" action="{{ route('comments.store', ['slug' => $post->slug]) }}" class="uk-form-stacked uk-margin-left uk-flex-1">
                        @csrf
                        <div class="uk-margin">
                            <label class="uk-form-label" for="content">{{ __('Your Comment') }}</label>
                            <div class="uk-form-controls">
                                <textarea id="content" name="content" class="uk-textarea" rows="5" required></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="parent_id" value="{{ $comment->id ?? '' }}"> <!-- Include parent_id for replies -->
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="uk-button uk-button-primary custom-add-to-cart-button uk-border-rounded">{{ __('Submit Comment') }}</button>
                    </form>
                </div>
            @endauth

            @if ($errors->any())
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <ul class="uk-list uk-list-bullet">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($post->comments()->whereNull('parent_id')->get() as $comment)
                @php
                    $modalId = 'login-modal-' . $comment->id; // Unique ID for each modal
                @endphp
                <div class="uk-comment uk-margin-bottom">
                    <div class="uk-comment-header uk-flex uk-flex-between uk-flex-middle">
                        <!-- Avatar and Comment Header -->
                        <div class="uk-flex uk-flex-middle">
                            <img src="{{ $comment->user->avatar ?? 'https://tse2.mm.bing.net/th?id=OIP.qfWsGwDe5UPIKd5_aSf4PQHaHa&pid=Api&P=0&h=180' }}"
                                 alt="{{ $comment->user->name }}'s avatar"
                                 class="uk-border-circle"
                                 width="50" height="50">
                            <div class="uk-margin-left">
                                <h4 class="uk-comment-title uk-margin-remove">
                                    <a href="/@{{ $comment->user->username }}">{{ $comment->user->name }}</a>
                                </h4>
                                <p class="uk-text-meta uk-margin-remove">
                                    @php
                                        $now = \Carbon\Carbon::now();
                                        $createdAt = \Carbon\Carbon::parse($comment->created_at);
                                        $diffInMinutes = $now->diffInMinutes($createdAt);
                                        $diffInHours = $now->diffInHours($createdAt);
                                    @endphp

                                    @if ($diffInHours > 0)
                                        {{ $diffInHours }} hours ago
                                    @elseif ($diffInMinutes > 0)
                                        {{ $diffInMinutes }} minutes ago
                                    @else
                                        Just now
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-comment-body">
                        <p>{{ $comment->content }}</p>
                    </div>
                    <div class="uk-comment-footer">
                        <a href="#" class="uk-button uk-button-text">
                            <span class="uk-icon" uk-icon="icon: thumbs-up"></span>
                            <span class="uk-margin-small-left">Like</span>
                        </a>
                        <a href="#" class="uk-button uk-button-text">
                            <span class="uk-icon" uk-icon="icon: thumbs-down"></span>
                            <span class="uk-margin-small-left">Dislike</span>
                        </a>
                        <a href="#" class="uk-button uk-button-text reply-toggle">
                            <span class="uk-icon" uk-icon="icon: reply"></span>
                            <span class="uk-margin-small-left">Reply</span>
                        </a>
                        @auth()
                            <div class="reply-form " style="display: none;">
                                <div class="" uk-grid>
                                    <div class="uk-width-1-6 uk-flex-right uk-flex uk-height-auto" >
                                        <img src="{{ auth()->user()->avatar ?? 'https://tse1.mm.bing.net/th?id=OIP.Sw0g2adwtwCJAbIAveYGbgHaHa&pid=Api&P=0&h=180' }}"
                                             alt="{{ auth()->user()->name }}'s avatar"
                                             class="uk-border-circle uk-margin-top"
                                             width="50" height="50"
                                             style=" width: 50px; height: 50px"
                                        >
                                    </div>
                                    <form method="POST" action="{{ route('comments.store', ['slug' => $post->slug]) }}" class="uk-form-stacked uk-width-5-6">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="reply-content">{{ __('Your Reply') }}</label>
                                            <div class="uk-form-controls">
                                                <textarea id="reply-content" name="content" class="uk-textarea" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="uk-button uk-button-primary custom-add-to-cart-button uk-border-rounded">{{ __('Submit Reply') }}</button>
                                    </form>
                                </div>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.querySelectorAll('.reply-toggle').forEach(button => {
                                        button.addEventListener('click', function (e) {
                                            e.preventDefault();
                                            const form = this.nextElementSibling;
                                            if (form.style.display === 'none' || form.style.display === '') {
                                                form.style.display = 'block';
                                                this.innerHTML = '<span class="uk-icon" uk-icon="icon: reply"></span><span class="uk-margin-small-left">Cancel</span>';
                                            } else {
                                                form.style.display = 'none';
                                                this.innerHTML = '<span class="uk-icon" uk-icon="icon: reply"></span><span class="uk-margin-small-left">Reply</span>';
                                            }
                                        });
                                    });
                                });
                            </script>

                        @endauth
                        @guest
                            <!-- Modal Trigger -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const replyToggles = document.querySelectorAll('.reply-toggle'); // Get all reply toggle buttons
                                    replyToggles.forEach((toggle, index) => {
                                        toggle.addEventListener('click', function (event) {
                                            event.preventDefault();
                                            UIkit.modal('#{{ $modalId }}').show(); // Show the corresponding modal
                                        });
                                    });
                                });
                            </script>
                        @endguest

                        <!-- Modal for Login -->
                        <div id="{{ $modalId }}" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body uk-border-rounded">
                                <h2 class="uk-modal-title">Yêu cầu đăng nhập</h2>
                                <p>Bạn cần đăng nhập để có thể trả lời bình luận. Vui lòng đăng nhập hoặc tạo một tài khoản mới.</p>
                                <div class="uk-text-right">
                                    <a href="{{ route('login') }}" class="uk-button uk-button-primary custom-add-to-cart-button uk-border-rounded">Đăng nhập</a>
                                    <button class="uk-button uk-button-default uk-border-rounded uk-modal-close" type="button">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('content.posts.replies', ['comments' => $comment->replies])
                </div>
            @endforeach
        </section>
    </div>

@endsection
