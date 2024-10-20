@extends('layouts.guest-layout')

@section('content')
<div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-xxl-12">
          <div class="card mb-0">
            <div class="card-body">
              <a href="/" class="text-nowrap logo-img text-center d-block w-100 mb-2">
                <img src="{{ asset('assets/img/logo.png')}}" width="180" alt="">
              </a>
              <div class="row mb-2">
                  <div class="col-6 mb-sm-0">
                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                      <img src="{{ asset('assets/modernize/images/svgs/google-icon.svg')}}" alt="" class="img-fluid me-2" width="18" height="18">
                      <span class="d-none d-sm-block me-1 flex-shrink-0">Sign Up with</span>Google
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                      <img src="{{ asset('assets/modernize/images/svgs/facebook-icon.svg')}}" alt="" class="img-fluid me-2" width="18" height="18">
                      <span class="d-none d-sm-block me-1 flex-shrink-0">Sign Up with</span>FB
                    </a>
                  </div>
              </div>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="">
                  <label for="name" class="form-label">Name</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <div class="">
                  <label for="email" class="form-label">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="">
                  <label for="password" class="form-label">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>                   
                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
              </form>
              <div class="d-flex align-items-center">
                <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                <a class="text-primary fw-medium ms-2" href="{{route('login')}}">Sign In</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
