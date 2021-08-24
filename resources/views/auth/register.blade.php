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
                            <h2 class="log-title">{{ __('Register') }}</h2>
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input  id="input" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                    <label class="control-label" for="input">{{ __('Name') }}</label><i class="mtrl-select"></i>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                                    <label class="control-label" for="input" >{{ __('E-Mail Address') }}</label><i class="mtrl-select"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                                    <label class="control-label" for="input" >{{ __('Password') }}</label><i class="mtrl-select"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                                    <label class="control-label" for="input" >{{ __('Confirm Password') }}</label><i class="mtrl-select"></i>

                                </div>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>{{ __('Register') }}</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
