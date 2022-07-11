@extends('layouts.app')
@section('partials._navbar')
<!-- Empty section. Do not remove this comment please -->
@endsection
@section('partials._jumbotron')
<!-- Empty section. Do not remove this comment please -->
@endsection
@section('partials._footer')
<!-- Empty section. Do not remove this comment please -->
@endsection
@section('content')
<div class="login">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6" style="text-align: center; padding-top: 30px;">
            <h1>HackerPair</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="text-align: center; padding-bottom: 10px;">
                <a href="/auth/github" class="btn btn-lg btn-info btn-block" style="background-color: rgb(0, 0, 0); border: 1px solid white; color: white;">
                    <span class="fa-brands fa-github"></span> Login with GitHub
                </a>
                <br>
                <br>
                <h3>or</h3>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email"
                            autofocus placeholder="Email Address">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col text-center">
                        @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                        @if (Route::has('register'))
                        .
                        <a class="" href="{{ route('register') }}">
                            {{ __('Create an Account') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
