@extends('content.layouts.app')

@section('title', $post->title)

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
                <p>{{ $post->content }}</p>
            </div>
            <a class="uk-button uk-button-default" href="{{ route('posts.index') }}">Back to Posts</a>
        </article>
    </div>
@endsection
