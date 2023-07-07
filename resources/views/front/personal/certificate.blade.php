@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <x-profile></x-profile>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="mt-0 mb-3 mb-lg-5 py-5 py-lg-6">
                        <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-5">
                            <h3 class="f-700 m-0">{{ __("profile.certificates.title") }}</h3>
                            <div class="position-relative d-none d-lg-block">
                                <input class="form-control br-12" placeholder="{{ __("profile.certificates.search") }}">
                                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
                            </div>
                        </div>
                        <div>
                            @foreach($certificates as $certificate)
                                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center bg-white br-12 p-3 mb-3">
                                    <div class="d-flex align-items-center flex-column flex-lg-row">
                                        <div>
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($certificate->image)}}" alt="pic" width="162" height="114">
                                        </div>
                                        <div class="ms-lg-4">
                                            <p class="m-0 fs-20 f-700 mb-2 mt-2 mt-lg-0 text-center text-lg-start">
                                                {{$certificate->course->info->title}}
                                            </p>
                                            <div class="d-flex flex-column flex-xl-row">
                                                <div class="d-flex justify-content-center justify-content-lg-start">
                                                    <p class="fs-14 f-500 m-0 text-secondary">{{ __("profile.certificates.number") }}</p>
                                                    <p class="fs-14 f-600 m-0 ms-1 ms-md-2">{{ __("profile.certificates.reg_num") }}{{$certificate->id}}</p>
                                                </div>
                                                <div class="d-flex ms-0 ms-xl-5 justify-content-center justify-content-lg-start">
                                                    <p class="fs-14 f-500 m-0 text-secondary">{{ __("profile.certificates.hourse") }}</p>
                                                    <p class="fs-14 f-600 m-0 ms-1 ms-md-2">{{$certificate->hours_number}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('download',$certificate->id) }}" class="btn btn-outline-primary py-2 px-3 px-xxl-4 br-12 fs-14 f-600 mt-3 mt-mb-0 w-100">
                                            <i class="fal fa-arrow-to-bottom me-2"></i>{{ __("profile.certificates.download") }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
