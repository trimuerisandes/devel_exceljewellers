@extends('layouts.app')

@section('general')
<title>Login | Excel Jewellers</title>
<link rel="canonical" href="https://www.exceljewellers.com/login">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if(isset($redirect_link))
                        <input id="redirect_link" type="hidden" value="{{$redirect_link}}" name="redirect_link">
                        @endif

<!--                         <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn login-btn">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn btn-link register-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                                <br>
                                <a href="{{ url('/google-login') }}" class="google_ctn"><img class="google_sign_in" src="{{ asset('storage/image/g_login.png') }}"> Log In With Google</a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style type="text/css">

    a{
        text-decoration: none !important;
    }
    
    .google_ctn{
        margin-top: 4px;
        border: solid 1px #eaeaea;
        height: 20px;
        padding: 6px 16px 9px 16px;
        border-radius: 4px;
    }

    .google_sign_in {
        height: 20px;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    .login-btn,.register-btn{
        background: #d60d8c !important;
        color: white !important;
        outline:none !important;
        margin-bottom: 10px;
    }

</style>