@extends('layouts.app-auth')

@section('title', 'Daftar')

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="{{asset('assets/images/logo/logo_white_1x.png')}}"
                        alt="auth-register-cover" class="img-fluid my-5 auth-illustration" />
                </div>
            </div>

            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">

                    <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="Nama Lengkap" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password-confirm">Konfirmasi Password</label>
                            <div class="input-group input-group-merge">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                <label class="form-check-label" for="terms-conditions">
                                    Saya setuju untuk
                                    <a href="javascript:void(0);">kebijakan dan ketentuan privasi</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                    </form>

                    <p class="text-center">
                        <span>Sudah punya akun?</span>
                        <a href="{{route('login')}}">
                            <span>Masuk</span>
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
