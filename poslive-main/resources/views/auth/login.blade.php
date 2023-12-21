@extends('layouts.app-auth')

@section('title', 'Login')

@section('content')
<div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
        <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                <img src="{{asset('assets/images/logo/logo_white_1x.png')}}" alt="auth-login-cover"
                    class="img-fluid my-5 auth-illustration"/>
            </div>
        </div>
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">

                <div class="app-brand mb-2 justify-content-center">
                    <a href="{{route('home')}}" class="app-brand-link gap-2">
                        <img src="{{asset('assets/images/logo/favourite_icon.png')}}" alt="" width="100" class="rounded-circle">
                    </a>
                </div>

                <div class="text-center">
                    <h4 class="card-title font-weight-bold text-center mb-25">POS Livewire</h4>
                    <p class="mb-3">Silahkan Masuk</p>
                </div>

                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Masukan Email" autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    <small>Lupa Password?</small>
                                </a>
                            @endif
                        </div>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                placeholder="Masukan Password"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} />
                            <label class="form-check-label" for="remember"> Ingat saya </label>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </form>

                <p class="text-center">
                    <span>Belum punya akun?</span>
                    <a href="{{route('register')}}">
                      <span>Buat akun</span>
                    </a>
                </p>

                <div class="divider my-4">
                    <div class="divider-text">POS Livewire</div>
                </div>

                <div class="d-flex justify-content-center">
                    <small class="text-center">
                        <span style="color: #858585">POSLIVE © 2023 |</span> <a href="{{url('/')}}" target="_blank"><span class="text-info">POSLIVE</span></a>
                      </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
