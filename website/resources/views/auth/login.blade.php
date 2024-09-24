@extends('content.layouts.app')

@section('content')
    <div class="uk-container">
        <div class="uk-grid-margin uk-flex uk-flex-center uk-margin-large-top uk-margin-large-bottom">
            <div class="uk-width-1-2@m">
                <div class="uk-card uk-card-default uk-card-body">
                    <h3 class="uk-card-title">{{ __('Login') }}</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="uk-margin">
                            <label for="email" class="uk-form-label">{{ __('Email Address') }}</label>
                            <div class="uk-form-controls">
                                <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="uk-text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                <label>
                                    <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <button type="submit" class="uk-button uk-button-primary  custom-add-to-cart-button uk-border-rounded">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="uk-button uk-button-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
