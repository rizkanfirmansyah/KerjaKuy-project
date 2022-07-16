<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
</style>


@extends('layouts.login_register')

@section('content')
<div class="container mt-5" style="width : 800px;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center>
                <div class="card-header">{{ __('Login to our website now!') }}</div>
                </center>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <center>
                        <img src="{{ asset('images/logo.png') }}" class= "mt-3" alt="logo" style ="height : 100px; width : 100px;">
                        </center>
                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-md-6 mt-3">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter your email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2 d-flex justify-content-center">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style ="margin-right : 106px;">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 d-flex justify-content-center">
                            <div class="col-md-8 ">
                                <button type="submit" class="bttn-warning bttn-jelly bttn-sm" style ="width : 200px; margin-left : 50px;">
                                    {{ __('Login') }}
                                </button>
                                <br>
                            </div>
                        </div>
                        <center>
                        <p class ="mt-3">Dont have an account? <a href="/register">Register now!</a></p>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
