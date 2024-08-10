@extends('content.layouts.app')

@section('content')
    <div class="uk-container">
        <div class="uk-flex uk-flex-center uk-margin-large-top uk-margin-large-bottom">
            <div class="uk-width-1-2@m">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">{{ __('Register') }}</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="uk-margin">
                            <label for="name" class="uk-form-label">{{ __('Name') }}</label>
                            <div class="uk-form-controls">
                                <input id="name" type="text" class="uk-input @error('name') uk-form-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="email" class="uk-form-label">{{ __('Email Address') }}</label>
                            <div class="uk-form-controls">
                                <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password" class="uk-form-label">{{ __('Password') }}</label>
                            <div class="uk-form-controls">
                                <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password-confirm" class="uk-form-label">{{ __('Confirm Password') }}</label>
                            <div class="uk-form-controls">
                                <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-flex uk-flex-right">
                                <button type="submit" class="uk-button uk-button-primary  custom-add-to-cart-button uk-border-rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
