@extends('layouts.plain')

@section('content')
<!-- Simple login form -->
<div style="display:flex; justify-content: center;  margin-top: 50px;">
    <form  class="col-md-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class=" text-slate-300"><img width="200px" src="{{ asset('images/up.png') }}"></div>
                <h5 class="content-group">{{ __('Login') }} <small class="display-block">Enter your credentials below</small></h5>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input  id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
            </div>

            <!-- <div class="text-center">
                 @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div> -->


        </div>
    </form>
 </div>

@endsection
