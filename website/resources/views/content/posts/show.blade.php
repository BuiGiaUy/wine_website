@extends('content.layouts.app')

@section('title', $post->name)

@section('content')
    <!-- Breadcrumb Section -->
    <div class="bg-light uk-section-small">
        <div class="uk-container">
            @include('content.components.breadcrumb', ['breadcrumbs' => $breadcrumbs])
        </div>
    </div>

    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-large" uk-grid>
                <!-- Main Content -->
                <div class="uk-width-expand@m">
                    <article class="uk-article">
                        <h1 class="uk-article-title product-title-large uk-margin-medium-bottom">{{ $post->name }}</h1>
                        
                        <div class="article-meta uk-flex uk-flex-middle">
                            <span class="uk-margin-right"><span uk-icon="icon: calendar; ratio: 0.8" class="uk-margin-small-right"></span>{{ $post->created_at->format('d/m/Y') }}</span>
                             @if($post->category)
                                <span class="uk-margin-right"><span uk-icon="icon: folder; ratio: 0.8" class="uk-margin-small-right"></span>{{ $post->category->name }}</span>
                            @endif
                        </div>

                        <div class="article-content">
                            {!! $post->content !!}
                        </div>

                        <div class="uk-margin-large-top uk-flex uk-flex-between uk-flex-middle border-top pt-3">
                            <div class="uk-text-muted">
                                Chia sẻ bài viết này:
                            </div>
                            <div>
                                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
                                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                                <a href="#" class="uk-icon-button" uk-icon="linkedin"></a>
                            </div>
                        </div>
                    </article>

                    <!-- Comments Section -->
                    <section class="uk-margin-large-top" id="comments-section">
                        <h3 class="section-title uk-text-left">Bình luận ({{ $post->comments()->count() }})</h3>
                        <div class="section-divider uk-margin-medium-bottom" style="margin-left: 0;"></div>

                         @auth
                            <div class="uk-margin-bottom uk-padding-small bg-light uk-border-rounded">
                                <div class="uk-grid-small uk-flex-middle" uk-grid>
                                    <div class="uk-width-auto">
                                        <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=random' }}"
                                             class="comment-avatar" alt="{{ auth()->user()->name }}">
                                    </div>
                                    <div class="uk-width-expand">
                                         <form method="POST" action="{{ route('comments.store', ['slug' => $post->slug]) }}">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="uk-margin-small-bottom">
                                                <textarea name="content" class="uk-textarea" rows="3" placeholder="Viết bình luận của bạn..." required></textarea>
                                            </div>
                                            <div class="uk-text-right">
                                                <button type="submit" class="btn-primary-custom uk-button-small">Gửi bình luận</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="uk-alert-primary" uk-alert>
                                <p>Vui lòng <a href="{{ route('login') }}" class="uk-text-bold">đăng nhập</a> để tham gia bình luận.</p>
                            </div>
                        @endauth

                         <div class="comment-list uk-margin-top">
                            @foreach ($post->comments()->whereNull('parent_id')->orderBy('created_at', 'desc')->get() as $comment)
                                <div class="uk-comment uk-margin-medium-bottom">
                                    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
                                        <div class="uk-width-auto">
                                            <img class="comment-avatar" src="{{ $comment->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name).'&background=random' }}" alt="">
                                        </div>
                                        <div class="uk-width-expand">
                                            <h4 class="comment-author uk-margin-remove">{{ $comment->user->name }}</h4>
                                            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                                <li><a href="#">{{ $comment->created_at->diffForHumans() }}</a></li>
                                                 @auth
                                                    <li><a href="#" class="reply-toggle" data-comment-id="{{ $comment->id }}">Trả lời</a></li>
                                                 @endauth
                                            </ul>
                                        </div>
                                    </header>
                                    <div class="uk-comment-body">
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                    
                                    <!-- Reply Form (Hidden) -->
                                    @auth
                                    <div class="reply-form uk-margin-small-top uk-margin-left" id="reply-form-{{ $comment->id }}" style="display: none;">
                                         <form method="POST" action="{{ route('comments.store', ['slug' => $post->slug]) }}">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <div class="uk-flex">
                                                <input type="text" name="content" class="uk-input uk-form-small uk-width-expand" placeholder="Trả lời..." required>
                                                <button type="submit" class="uk-button uk-button-primary uk-button-small uk-margin-small-left">Gửi</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endauth

                                    <!-- Replies -->
                                    @if($comment->replies->count() > 0)
                                        <div class="uk-margin-left uk-margin-top border-left pl-3" style="border-left: 2px solid #eee; padding-left: 20px;">
                                            @foreach($comment->replies as $reply)
                                                 <div class="uk-comment uk-margin-small-bottom">
                                                    <header class="uk-comment-header uk-grid-small uk-flex-middle" uk-grid>
                                                        <div class="uk-width-auto">
                                                            <img class="uk-border-circle" width="30" height="30" src="{{ $reply->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($reply->user->name).'&background=random' }}" alt="">
                                                        </div>
                                                        <div class="uk-width-expand">
                                                            <h5 class="uk-comment-title uk-margin-remove uk-text-bold uk-text-small">{{ $reply->user->name }}</h5>
                                                            <p class="uk-comment-meta uk-margin-remove-top uk-text-small">{{ $reply->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </header>
                                                     <div class="uk-comment-body uk-margin-small-top">
                                                        <p class="uk-text-small">{{ $reply->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                <!-- Sidebar -->
                <div class="uk-width-1-3@m">
                    <div class="filter-sidebar uk-padding">
                        <h4 class="filter-title">Bài viết nổi bật</h4>
                        <ul class="uk-list uk-list-divider">
                            @foreach($posts->take(5) as $recentPost)
                                <li>
                                    <a href="{{ route('posts.show', $recentPost->slug) }}" class="uk-link-reset uk-grid-small uk-flex-middle" uk-grid>
                                        <div class="uk-width-auto">
                                             @if ($recentPost->featuredImage)
                                                <img src="{{ asset($recentPost->featuredImage->path) }}" width="60" height="60" class="uk-border-rounded" style="object-fit:cover; height: 60px;">
                                            @endif
                                        </div>
                                        <div class="uk-width-expand">
                                            <h5 class="uk-text-small uk-margin-remove uk-text-bold">{{ $recentPost->name }}</h5>
                                            <span class="uk-text-meta uk-text-xsmall">{{ $recentPost->created_at->format('d/m/Y') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const replyToggles = document.querySelectorAll('.reply-toggle');
            replyToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const commentId = this.getAttribute('data-comment-id');
                    const form = document.getElementById('reply-form-' + commentId);
                    if (form.style.display === 'none') {
                        form.style.display = 'block';
                    } else {
                        form.style.display = 'none';
                    }
                });
            });
        });
    </script>
    @endauth
@endsection
