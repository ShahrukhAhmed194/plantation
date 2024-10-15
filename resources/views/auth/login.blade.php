@extends('layouts.guest-layout')

@section('content')
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="/" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                    <img src="{{ asset('assets/modernize/images/logos/dark-logo.svg')}}" width="180" alt="">
                  </a>
                  <div class="row">
                    <div class="col-6 mb-2 mb-sm-0">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="{{ asset('assets/modernize/images/svgs/google-icon.svg')}}" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>Google
                      </a>
                    </div>
                    <div class="col-6">
                      <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                        <img src="{{ asset('assets/modernize/images/svgs/facebook-icon.svg')}}" alt="" class="img-fluid me-2" width="18" height="18">
                        <span class="d-none d-sm-block me-1 flex-shrink-0">Sign in with</span>FB
                      </a>
                    </div>
                  </div>
                  <div class="position-relative text-center my-4">
                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">or sign in with</p>
                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                  </div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-dark" for="flexCheckChecked">
                          Remeber this Device
                        </label>
                      </div>
                      @if (Route::has('password.request'))
                        {{-- <a class="text-primary fw-medium" href="{{ route('password.request') }}">
                           Forget Password
                        </a> --}}
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-medium">New to Modernize?</p>
                      <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
