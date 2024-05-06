@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="d-flex justify-content-center" style="padding: 130px 0 50px;">
            <div class="bg-white d-flex justify-content-center flex-column align-items-center br-12 p-4">
                <p class="fs-20 f-600 text-center text-dark m-0">{{ __("header.form.conf_payment_account") }}</p>
                <form action="{{ route('payment_account_confirm') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group w-100">
                        <label for="exampleInputEmail1" class="mt-4 mb-1 text-secondary f-500 fs-12 m-0">{{ __("header.form.email") }}</label>
                        <input type="email" class="form-control text-secondary br-12" id="exampleInputEmail1" name="email">
                            @error('email')
                                <span class="text-danger mt-2 fs-12" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <input type="hidden" value="{{request()->token}}" name="token">

                    <button type="submit"  class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12">{{ __("header.form.confirm") }}</button>
                </form>
            </div>


        </div>
    </div>
@endsection
