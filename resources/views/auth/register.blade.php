@extends('layouts.app')

<head>
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
</head>
@section('content')
<div id="main-wrapper">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6 register-block">
                            <div class="p-5">
                                <div class="mb-6">
                                    <h3 style="font-size: 100px; letter-spacing: -5px" class="h4 font-weight-bold">Register</h3>
                                </div>

                                <p class="text-muted mt-1 mb-1">Masukan data yang diperlukan untuk akses ke halaman selanjutnya</p>

                                <div class="col-lg-10">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telepon</label>
                                            <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="telepon" autofocus>

                                            @error('telepon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        <div class="d-grid gap-2 ">
                                            <button type="submit" class="btn btn-dark">
                                                {{ __('Register') }}
                                            </button>
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
                                        @if (Route::has('login'))
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Sudah Punya Akun') }}
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