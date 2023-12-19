@extends("layouts.app")

@section("content")
{{--    {{ dd( $lector->lector->info->enabled) }}--}}
    <div class="container mb-5 mb-lg-6">
        <div>
            <div class="d-flex mt-2 mt-md-3 py-2">
                <a href="{{route('home')}}" class="text-dark"><p class="fs-12 f-500 text-secondary">{{ __("header.menu.home") }}</p></a>
                <a href="{{route('lectors.index')}}" class="text-dark"><p class="fs-12 f-500 text-secondary ms-3 d-none d-lg-block main">{{ __("header.menu.lectors") }}</p></a>
                <a><p class="fs-12 f-500 ms-3 main">{{$lector->userInfo->fullName}}</p></a>
            </div>
            <div class="row mt-3 mt-lg-5">
                <div class="col-12 col-lg-4 me-0 me-lg-6">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}" class="br-12 w-100" alt="pic">
                </div>
                <div class="col-12 col-lg-6 ms-0 ms-lg-6">
                    <div>
                        <h3 class="f-700 m-0 mt-3 mt-lg-0">{{ $lector->userInfo->fullName }}</h3>
                        <p class="fs-16 f-500 mt-3 m-0">{!!$lector->lector->info->biography ?? ""!!}</p>
                    </div>
                    <div class="mt-4 mb-3">
                        <h3 class="f-700 m-0">Лекции</h3>
                        @foreach($lector->lector->webinars as $k => $webinar)
                            <a href="{{ route("webinar.show",$webinar->info->slug) }}" class="text-dark bg-white br-12 d-flex justify-content-between mt-4">
                                <div class="d-flex justify-content-between align-items-center py-2 px-3 fs-14">
                                    <p class="m-0 f-500 text-black-gray">{{ $k + 1 }}</p>
                                    <p class="ms-4 m-0 f-700">{{$webinar->info->title}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-3 fs-14">
                                    <i class="far fa-clock"></i>
                                    <p class="m-0 ms-2 f-500 me-2 text-black-gray text-nowrap">{{$webinar->duration}} {{ __("lectors.min") }}</p>
                                    <i class="fal fa-angle-right me-4 text-secondary"></i>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
