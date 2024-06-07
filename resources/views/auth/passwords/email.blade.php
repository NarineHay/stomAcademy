@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- ==================================== --}}
<div class="container">
    @if (session('status'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="d-flex justify-content-center" style="padding: 80px 0 80px;">

        <div class="bg-white d-flex justify-content-center flex-column align-items-center br-12 p-4">

            <div class="mb-3" style="width: 202px">
                <a href="/"><img class="w-100" src="/dist/image/logo-dark.svg" alt="logoPic"></a>
            </div>

            <p class="fs-20 f-600 text-center text-dark m-0">{{ __('auth.reset.reset_password') }}</p>
            <form method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group w-100">
                    <label for="exampleInputEmail1"
                        class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.email') }}</label><span class="text-danger">*</span>
                    <input type="email" name="email" class="form-control text-secondary br-12" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{old('email')}}">
                    @error('email')
                        <span class="error text-danger fs-12">{{ $message }}</span>
                    @enderror

                </div>

                @if(session('statys'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif
                <button type="submit" class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12">{{ __('auth.reset.reset_password_link') }}</button>
            </form>

        </div>
    </div>
</div>


@endsection
