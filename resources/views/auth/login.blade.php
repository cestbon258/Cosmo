@extends('layouts.master')
@section('title', 'Login')

@section('specificScript')
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
@stop

@section('content')

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome back!</h3>
                            <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                                @csrf

                                <div class="form-label-group">
                                    <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
                                    {{-- <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus> --}}

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                </div>

                                <div class="form-label-group">
                                    <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                    {{-- <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password"> --}}

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="inputPassword">{{ __('Password') }}</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-lg primary-btn btn-block btn-login text-uppercase font-weight-bold mb-2">
                                    {{ __('Sign In') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request', app()->getLocale()) }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                                <br>
                                <div class="text-center">
                                    <span>{{ __('New to Cosmo') }} ?</span>
                                    <a class="small" href="{{ route('register', app()->getLocale()) }}"> {{ __('Sign up now') }}</a>.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-image {
      background-image: url( {{ url('img/bg-img/hero5.jpg') }} );
      background-size: cover;
      background-position: center;
    }
</style>
@endsection
