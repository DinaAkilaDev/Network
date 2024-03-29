@extends('layouts.app')

@section('content')

    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="land-featurearea">
                        <div class="land-meta">
                            <h1>Network</h1>
                            <p>
                                Network is free to use for as long as you want
                            </p>
                            <div class="friend-logo">
                                <span><img src="images/wink.png" alt=""></span>
                            </div>
                            <a href="#" title="" class="folow-me">Follow Us on</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Login</h2>
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input  id="input" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    <label class="control-label" for="input">{{ __('E-Mail Address') }}</label><i class="mtrl-select"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                                    <label class="control-label" for="input" > {{ __('Password') }}</label><i class="mtrl-select"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/><i class="check-box"></i>Always Remember Me.
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="forgot-pwd" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>{{ __('Login') }}</span></button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
