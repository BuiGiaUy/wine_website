@extends('content.layouts.app')

@section('title', '500 Internal Server Error')

@section('content')
    <div class="uk-container uk-margin-top">
        <div class="uk-text-center">
            <h1 class="uk-heading-large">500</h1>
            <p class="uk-text-lead">Something went wrong on our end. Please try again later.</p>
            <p><a href="{{ url('/') }}" class="uk-button uk-button-primary">Go to Homepage</a></p>
        </div>
    </div>
@endsection
