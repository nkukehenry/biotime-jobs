@extends('layouts.plain')

@section('content')
<!-- Simple login form -->
<div style="display:flex; justify-content: center;  margin-top: 50px;">
    <form  class="col-md-4" method="POST" action="{{ route('changepass') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group"><small class="display-block">You need to change your password</small></h5>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input  id="email" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="off" autofocus >
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="password" type="password" class="form-control @error('confirmpassword') is-invalid @enderror" name="confirmpassword" required autocomplete="off">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
                @error('confirmpassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Change Password <i class="icon-circle-right2 position-right"></i></button>
            </div>

        </div>
    </form>
 </div>

@endsection
