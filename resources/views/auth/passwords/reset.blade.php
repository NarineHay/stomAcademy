@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container">
        <div class="d-flex justify-content-center row" style="padding: 80px 0 80px;">
            <div class="col-md-4 bg-white d-flex justify-content-center flex-column align-items-center br-12 p-4">
                <div class="mb-3" style="width: 202px">
                    <a href="/"><img class="w-100" src="/dist/image/logo-dark.svg" alt="logoPic"></a>
                </div>
                <p class="fs-20 f-600 text-center text-dark m-0">{{ __('passwords.reset_password') }}</p>
                <form method="post" action="{{route('password.update')}}" class="w-100">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group w-100">
                        <label for="exampleInputEmail1"
                            class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.email') }}</label><span class="text-danger">*</span>
                        <input type="email" name="email" class="form-control text-secondary br-12" id="exampleInputEmail1" required autocomplete="email" autofocus
                            aria-describedby="emailHelp" value="{{$email ?? old('email')}}">
                        @error('email')
                            <span class="error text-danger fs-12">{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="form-group mt-2 mb-2 w-100">
                        <label for="exampleInputPassword1"
                                class="mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.password') }}</label><span class="text-danger">*</span>
                        <div class="position-relative password_container">
                            <input name="password" type="password" class="form-control br-12" id="exampleInputPassword1">
                            <i class="fal fa-eye text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
                            <i class="fal eye fa-eye-slash text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
                        </div>
                        @error('password')
                            <span class="error text-danger fs-12">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group mt-2 mb-2 w-100">
                        <label for="exampleInputPassword2"
                                class="mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.password_re') }}</label><span class="text-danger">*</span>
                        <div class="position-relative password_container">
                            <input name="password_confirmation" type="password" class="form-control br-12"
                                id="exampleInputPassword2" required autocomplete="new-password">
                            <i class="fal fa-eye text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
                            <i class="fal eye fa-eye-slash text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12">{{ __('passwords.reset_password') }}</button>
                </form>
            </div>

        </div>
    </div>

@endsection
