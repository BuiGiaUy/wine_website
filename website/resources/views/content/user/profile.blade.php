@extends('content.layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="uk-section uk-section-small">
        <div class="uk-container">
            <h2 class="uk-heading-line uk-text-center"><span>Profile</span></h2>
            <div class="uk-card uk-card-default uk-card-body">
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Assuming you want to use PUT for updates -->

                    <!-- Displaying user information -->
                    <div class="uk-margin ">
                        <label class="uk-form-label" for="name">Name</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="email">Email</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="uk-margin">
                        <button class="uk-margin-small uk-button uk-button-primary uk-border-rounded custom-add-to-cart-button" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
