@extends('content.layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="uk-container uk-margin-top">
        <div class="uk-text-center">
            <h1 class="uk-heading-large">404</h1>
            <p class="uk-text-lead">Oops! The page you are looking for does not exist.</p>
            <p><a href="{{ url('/') }}" class="uk-button uk-button-primary">Go to Homepage</a></p>
        </div>
    </div>
@endsection
