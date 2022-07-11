@extends('layouts.app')

@section('content')
@section('partials._jumbotron')
<!-- Empty section. Do not remove this comment please -->
@endsection
<div class="container">
    <div class="row" style="text-align: center;">
        <div class="col">
            <h1>Create a HackerPair Account</h1>
            <p>
                Create a HackerPair account by authenticating your identity using Github. Alternatively,
                you can use the below form to create a new account.
            </p> <a href="/auth/github" class="btn btn-lg btn-info" style="background-color: rgb(0, 0, 0);">
                <span class="fa-brands fa-github"></span> Login with GitHub
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div style="text-align: center; padding-top: 15px; padding-bottom: 5px;">
                <h2>OR</h2>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="first_name" class="col-form-label text-md-end">{{ __('First Name*') }}</label>
                    <br>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"
                        required autocomplete="first_name" autofocus>

                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name*') }}</label>
                    <br>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required
                        autocomplete="last_name" autofocus>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title" class="control-label">Title</label> <br>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="zip_code" class=" col-form-label text-md-end">{{ __('Zip Code*') }}</label> <br>

                    <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required
                        autocomplete="zip_code">

                    @error('zip_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="time_zone" class=" col-form-label text-md-end">{{ __('Time Zone*') }}</label> <br>

                    {!! Form::select('time_zone',
                    [
                    'America/New_York' => 'Eastern Time',
                    'America/Chicago' => 'Central Time',
                    'America/Denver' => 'Mountain Time',
                    'America/Phoenix' => 'Mountain Time (no DST)',
                    'America/Los_Angeles' => 'Pacific Time',
                    'America/Anchorage' => 'Alaska Time',
                    'America/Adak' => 'Hawaii-Aleutian (no DST)',
                    'Pacific/Honolulu' => 'Hawaii-Aleutian Time (no DST)'
                    ],
                    null, ['class' => 'form-control input-lg']); !!}

                    @error('time_zone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if ($errors->has('time_zone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('timezone') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email" class=" col-form-label text-md-end">{{ __('Email Address*') }}</label> <br>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                        autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="col-form-label text-md-end">{{ __('Password*') }}</label>

                    <div class="">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password*') }}</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
