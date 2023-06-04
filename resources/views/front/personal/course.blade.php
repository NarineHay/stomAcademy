@extends("layouts.app")

@section("content")

<section style="overflow: hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                <div class="account_left_aside_bg profile_left"></div>
                <x-profile></x-profile>
            </div>
            <div class="col-lg-10">
                <div class="py-5 px-5 mt-4 mt-lg-5">
                    <p class="m-0 f-500 fs-14 cursor"><a class="text-black" href="{{ route("personal.courses") }}"><i class="fal fa-arrow-left me-3"></i>{{ __("profile.courses.back") }}</a></p>
                    <div class="mt-4">
                        <div class="bg d-flex justify-content-center align-items-center position-relative br-12">
                            <iframe style="height: 400px;width: 100%" allowfullscreen src="{{ \Illuminate\Support\Str::replace("watch?v=","embed/",$webinar->info->video) }}?autoplay=0&showinfo=0&controls=0"></iframe>
{{--                            <img src="dist/image/onliechat3.png" alt="pic" class="br-12 w-100">--}}
{{--                            <div class="rounded-circle d-flex align-items-center justify-content-center icon-style4 border-0 bg-primary position-absolute"--}}
{{--                                 style="background: rgba(255, 255, 255, 0.3);">--}}
{{--                                <i class="fas fa-play text-white fs-22"></i>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="mt-4">
                        <div>
                            <p class="m-0 text-primary fs-10 f-700">{{ $webinar->directions->map(function ($item){ return $item->title; })->join(", ") }}</p>
                            <p class="m-0 fs-24 f-700 mt-2">{{ $webinar->info->title }}</p>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <img style="width: 50px;height: 50px;border-radius: 100%;object-fit: cover" src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->userInfo->image) }}" alt="pic">
                            </div>
                            <div>
                                <p class="fs-16 f-500 m-0 ms-3">{{ $webinar->user->userInfo->fullName }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="m-0 fs-16 f-500">{!! $webinar->info->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col-lg-2 col-12 position-relative">--}}
{{--                <div class="aside d-none d-lg-block">--}}
{{--                    <div class="p-4 d-flex flex-column justify-content-between mt-4 mt-lg-5" style="height: 65vh">--}}
{{--                        <div>--}}
{{--                            <p class="m-0 fs-20 f-700">Онлайн чат</p>--}}
{{--                            <div class="mt-4">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <div>--}}
{{--                                        <img src="dist/image/onlinecchat1.png" alt="pic">--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-2">--}}
{{--                                        <p class="m-0 fs-14 f-700">Estherа Howard</p>--}}
{{--                                        <p class="m-0 fs-14">Всем добрый вечер!</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex align-items-center mt-4">--}}
{{--                                    <div>--}}
{{--                                        <img src="dist/image/onlinechat2.png" alt="pic">--}}
{{--                                    </div>--}}
{{--                                    <div class="ms-2">--}}
{{--                                        <p class="m-0 fs-14 f-700">Robertа Fox</p>--}}
{{--                                        <p class="m-0 fs-14">Хорошая слышимость, <br>спасибо!</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-6 position-relative">--}}
{{--                            <input class="w-100 py-3 px-3 br-12 border-0 position-relative" placeholder="Добавить комментарий">--}}
{{--                            <div class="icon-style bg-primary br-12 d-flex justify-content-center align-items-center--}}
{{--                                    position-absolute top-0 bottom-0 end-0 me-2 mt-2">--}}
{{--                                <i class="far fa-paper-plane text-white"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    </div>
</section>

@endsection
