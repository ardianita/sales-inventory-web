@extends('layouts.app')

@section('content')
    <div class="vh-100" style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0.6) 0%, rgba(255, 255, 255, 0.6) 75%), url('/img/background.jpg');">
        <div class="container py-5 h-90">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                @if (session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            <div class="card text-white" style="border-radius: 1rem; background-color: #242F40;">
                <div class="card-body p-5">

                <div class="mt-md-4 pb-5">

                    <div class="text-center">
                        <h2 class="fw-bold mb-2 text-uppercase ">Sign Up</h2>
                        <p class="text-white-50 mb-3">Please register your account!</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-4">
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        {{-- button sign up --}}
                        <div class="row justify-content-center align-items-center">
                            <div class="lg-10 text-center">
                                <button type="submit" class="btn btn-outline-light btn-lg px-5">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <p class="mb-0 text-center">Have an account?
                        <a href="{{ route('login') }}" class="text-white-50 fw-bold">Sign In</a>
                    </p>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

@endsection
