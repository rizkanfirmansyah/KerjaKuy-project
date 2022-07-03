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
                <div class="card-header">{{ __('Register now, free!') }}</div>
                </center>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <center>
                        <img src="{{ asset('images/logo.png') }}" class= "mt-3" alt="logo" style ="height : 100px; width : 100px;">
                        </center>
                        <div class="row mb-3 mt-3 d-flex justify-content-center">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <br>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                           
                            <br>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <br>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                            </div>
                        </div>
                        
                        <div class="row mb-0 d-flex justify-content-center">
                            <div class="col-md-6 mt-2">
                                <button type="submit" class="bttn-warning bttn-jelly bttn-sm " style ="width : 200px; margin-left : 10px;">
                                    {{ __('Register') }}
                                </button>
               
                            </div>
                        </div>
                        <center>
                        <p class ="mt-3">Already have an account? <a href="/login">Login now!</a></p>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection