@extends('layouts.master')

@section('title', 'Agro Persian | Login')

@section('content')
<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="" style="text-align:center;">
            <img src="{{ URL::to('AgroPersianLogo.ico') }}" alt="AgroPersian" style="width:40%; 
            height:auto; 
            text-align:center;
            margin-top: 30px;
            margin-bottom: 40px;">
        </div>
        <div class="login-body">
            <div class="login-title"><strong>Welcome</strong>, Please {{ __('Login') }}</div>
            <form action="{{ route('login') }}" class="form-horizontal" method="post">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input id="email" type="email" style="font-size:15px;" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input id="password" type="password" style="font-size:15px;"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 class=" pull-left"">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                <p style="color:#fbfbfb;">{{ __('Remember Me') }}</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-lg" style="width:100%; 
                        border-radius: 5px; background-color:#8cc63f;">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </form>
        </div>
        {{-- <div class="login-footer">
            <div class="pull-right">
                @if (Route::has('password.request'))
                <p style="color:#fbfbfb;">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
        </a>
        </p>
        @endif
    </div>
</div> --}}
</div>

</div>
@endsection