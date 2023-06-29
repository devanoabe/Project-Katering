@extends('layouts.app')

<head>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <title>Login | Farhan Catering</title>
</head>
@section('content')
<div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 login-block">
                            <div class="p-5">
                                <div class="mb-6">
                                    <h3 style="font-size: 100px; letter-spacing: -5px" class="h4 font-weight-bold">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome back!</h6>
                                <p class="text-muted mt-2 mb-3">Masukan email address and password untuk akses ke halaman selanjutnya</p>

                                <div class="col-lg-10">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="d-grid gap-2 mb-2">
                                            <button type="submit" class="btn btn-dark btn-block btn-login">
                                                {{ __('Login') }}
                                            </button>
                                        </div>

                                        <div class="d-flex justify-content-center mt-4">
                                            @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Belum Punya Akun?') }}
                                            </a>
                                            @endif
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    @guest
                                    <button class="button-74">
                                        @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Belum Punya Akun') }}
                                            <span><i class="fa-solid fa-share fa-lg p-1"></i></span>
                                        </a>
                                        @endif
                                    </button>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>
@endsection