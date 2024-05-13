<div class="bg-white d-flex justify-content-center flex-column align-items-center br-12 p-4">
    <p class="fs-20 f-600 text-center text-dark m-0">{{ __('header.form.register') }}</p>
    <form method="post" action="{{route('register')}}">
        @csrf
    <div class="form-group w-100">
        <label for="exampleInputName"
            class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.name') }}</label><span class="text-danger">*</span>
        <input type="text" name="name" class="form-control text-secondary br-12" id="exampleInputName">
        @error('name')
            <span class="error text-danger fs-12">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group w-100">
        <label for="exampleInputLName"
            class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.lname') }}</label><span class="text-danger">*</span>
        <input type="text" name="lname" class="form-control text-secondary br-12" id="exampleInputLName">
        @error('lname')
            <span class="error text-danger fs-12">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group w-100">
        <label for="exampleInputEmail1"
            class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.email') }}</label><span class="text-danger">*</span>
        <input type="email" name="email" class="form-control text-secondary br-12" id="exampleInputEmail1"
            aria-describedby="emailHelp">
        @error('email')
            <span class="error text-danger fs-12">{{ $message }}</span>
        @enderror

    </div>

    <div class="form-group w-100">
        <label for="exampleInputPhone"
            class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.phone') }}</label><span class="text-danger">*</span>
        <input type="text" name="phone" class="form-control text-secondary br-12" id="exampleInputPhone">
        @error('phone')
            <span class="error text-danger fs-12">{{ $message }}</span>
        @enderror

    </div>

    <div class="form-group mt-2 mb-2 w-100">
        {{-- <div class="d-flex justify-content-between align-items-center"> --}}
            <label for="exampleInputPassword1"
                class="mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.password') }}</label><span class="text-danger">*</span>
        {{-- </div> --}}
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
        {{-- <div class="d-flex justify-content-between align-items-center"> --}}
            <label for="exampleInputPassword2"
                class="mb-1 text-secondary f-500 fs-12 m-0">{{ __('header.form.password_re') }}</label><span class="text-danger">*</span>
            {{--                    <span class="text-primary fs-12 f-500 m-0">{{ __("header.form.password_forget") }}</span> --}}
        {{-- </div> --}}
        <div class="position-relative password_container">
            <input name="password_confirmation" type="password" class="form-control br-12"
                id="exampleInputPassword2">
            <i class="fal fa-eye text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
            <i class="fal eye fa-eye-slash text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
        </div>
    </div>

    {{-- @if ($error) <p class="p-0 mb-1 text-danger f-500 fs-12 m-0">{{ $error }}</p> @endif --}}
    <div class="form-check mt-2">
        <label class="form-check-label fs-10 f-500 lh-14" style="color:#828282;">
            <input type="checkbox" value="" class="me-1 mt-1 form-check-input" checked>
            {!! __('header.form.check_text', ['href' => route('conf')]) !!}

        </label>
    </div>
    <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"></div>

    @error('g-recaptcha-response')
        <span class="error text-danger fs-12">{{ $message }}</span>
    @enderror
    @if(session('statys'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
    <button type="submit"
        class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12">{{ __('header.form.register') }}</button>
    </form>
    <div class="mt-4 text-center">
        <span class="text-secondary me-1 fs-14 f-500 m-0">{{ __('header.form.any_time') }}</span>
        {{-- <a wire:click="changeType" class="text-primary fs-14 f-500 m-0">{{ __('header.form.login') }}</a> --}}
        <a href="{{route('login')}}" class="text-primary fs-14 f-500 m-0">{{ __('header.form.login') }}</a>

    </div>
    <div id="html_element"></div>
</div>

</div>

    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
    </script> --}}
    <script async src="https://www.google.com/recaptcha/api.js"></script>

