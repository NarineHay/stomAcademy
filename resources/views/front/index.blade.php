@extends('layouts.app')

@section('content')
    <div class="container mt-4 mt-lg-5">
        <div class="d-flex justify-content-center flex-wrap gap-2 directions_index directions_index-media">
            <a href="{{ route('course.index') }}" class="btn btn-outline-primary rounded-5 fs-15 f-600 py-2 px-3">
                {{ __('index.all_directions') }}
            </a>
            @foreach ($directions as $direction)
                <a href="{{ route('course.index', ['direction_id' => $direction->id]) }}"
                    class="btn btn-outline-primary rounded-5 fs-15 f-600 py-2 px-3">
                    {{ $direction->title }}
                </a>
            @endforeach
            <span
                class="show_more btn btn-outline-primary rounded-5 fs-15 f-600 py-2 px-3">{{ __('index.show_more') }}</span>
        </div>
    </div>
    <!--Популярные курсы-->
    @if ($courses->count() > 0)
        <div class="container mt-4 mt-lg-5 ">
            <div class="d-flex justify-content-between position-relative">
                <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ">
                    <div>
                        <h3 class="f-700 m-0">{{ __('index.popular_courses') }}</h3>
                    </div>
                    <div class="ms-lg-4 mt-2 mt-lg-0">
                        <a href="{{ route('webinar.index') }}" class="text-info text-decoration-underline">
                            <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="slider_navigation videoPopularSwiper_nav mb-4 d-none d-md-flex">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="swiper videoPopularSwiper br-12">
                <div class="swiper-wrapper">
                    @foreach ($courses as $course)
                        @if ($course->info->enabled)
                            <a href="{{ route('course.show', $course->info->slug) }}"
                                class="p-3 swiper-slide d-flex flex-column flex-xxl-row br-12" style="color: inherit">
                                <img src='{{ \Illuminate\Support\Facades\Storage::url($course->image) }}' alt="videoPic"
                                    class="videoPic-index"
                                    style="width: 100%; height: 192px; object-fit: cover;   border-radius: 12px;">
                                <div class="d-flex flex-column ms-0 ms-xxl-4 mt-3 mt-xxl-0">
                                    @if ($course->directions->first())
                                        <p class="text-primary text-uppercase f-700 fs-10">
                                            {{ $course->directions->first()->title }}</p>
                                    @endif
                                    <h5 class="f-700 fs-21 videoTxt-index">{{ $course->info->title }}</h5>
                                    <div class="mt-2 min-h-48">
                                        <i class="far fa-clock me-1"></i> <span
                                            class="me-2 f-500 f-14">{{ $course->getDuration() }}</span>
                                        <i class="fas fa-tasks me-1"></i> <span
                                            class="f-500 f-14">{{ $course->webinars_count }}
                                            {{ __('index.video') }}</span>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        @if ($course->getLectors()->count() == 1)
                                            <img class="rounded-circle border-white me-3 img_r_42"
                                                src="{{ \Illuminate\Support\Facades\Storage::url($course->getLectors()->first()->lector->photo) }}"
                                                alt="videoPic">
                                            <p class="m-0 f-500 fs-14">
                                                {{ $course->getLectors()->first()->userInfo->fullName }}</p>
                                        @else
                                            @foreach ($course->getLectors() as $k => $user)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image) }}"
                                                    class="@if ($k > 0) m-25 @endif me-1 rounded-circle img_r_42"
                                                    alt="videoPic">
                                            @endforeach
                                            <p class="m-0 ms-2 f-500 fs-14">
                                                {{ \App\Helpers\TEXT::lectorCount($course->getLectors()->count()) }}</p>
                                        @endif

                                    </div>

                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!--Новые курсы-->
    @if ($courses_new->count() > 0)
        <div class="container mt-4 mt-lg-6">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ff">
                    <div>
                        <h3 class="f-700 m-0">{{ __('index.new_courses') }}</h3>
                    </div>
                    <div class="ms-lg-4 mt-2 mt-lg-0">
                        <a href="{{ route('course.index') }}" class="text-info text-decoration-underline">
                            <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="slider_navigation AdditionsSwiper_nav mb-4 d-none d-md-flex flex-row-reverse">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="swiper AdditionsSwiper">
                <div class="swiper-wrapper">
                    @foreach ($courses_new as $course)
                        @if ($course->info->enabled)
                            <div class="swiper-slide">
                                <a href="{{ route('course.show', $course->info->slug) }}" style="color: inherit"
                                    class="d-block bg-white br-12">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}"
                                        alt="addPic" style="width: 386px; height: 214px; object-fit: cover "
                                        class="img-swip">
                                    <div class="p-3">
                                        @if ($course->directions->first())
                                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">
                                                {{ $course->directions->first()->title }}</p>
                                        @endif
                                        <p class="f-700 fs-16 min-h-75 courseTxt-index">{{ $course->info->title }}</p>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                                                <span>
                                                    <i class="far fa-clock me-1"></i>
                                                    <span class="me-2 fs-14 f-500">{{ $course->getDuration() }}</span>
                                                </span>
                                                <span>
                                                    <i class="fas fa-tasks me-1"></i>
                                                    <span class="fs-14 f-500">{{ $course->webinars_count }}
                                                        {{ __('index.video') }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                            @if ($course->getLectors()->count() == 1)
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded-circle border-white me-3 img_r_42"
                                                        src="{{ \Illuminate\Support\Facades\Storage::url($course->getLectors()->first()->lector->photo) }}"
                                                        alt="videoPic">
                                                    <p class="m-0 f-500 fs-15 d-none d-sm-block">
                                                        {{ $course->getLectors()->first()->userInfo->fullName }}</p>
                                                </div>
                                            @else
                                                <div>
                                                    @foreach ($course->getLectors() as $k => $user)
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image) }}"
                                                            class="@if ($k > 0) m-25 @endif me-1 rounded-circle img_r_42"
                                                            alt="videoPic">
                                                    @endforeach

                                                </div>
                                            @endif
                                            <span class="price_box d-flex flex-column" style="min-height: 50px">

                                                @if ($course->sale)
                                                    <span
                                                        class="f-700 text-primary fs-16 me-2 me-xl-0">{{ $course->sale->html() }}</span>
                                                    <span
                                                        class="f-700 text-secondary del fs-16">{{ $course->price->html() }}</span>
                                                @else
                                                    <span
                                                        class="f-700 text-primary fs-16 me-1">{{ $course->price->html() }}</span>
                                                @endif
                                            </span>
                                        </div>
                                        <form method="POST" action="{{ route('addToCart') }}" class="buy_form">
                                            @csrf
                                            <input type="hidden" value="{{ $course->id }}" name="id">
                                            <input type="hidden" value="course" name="type">
                                            <button
                                                class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __('index.buy_webinar') }}</button>
                                        </form>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!--Онлайн-конференции-->
    @if ($conferences->count() > 0)
        <div class="container mt-4 mt-lg-6">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ">
                    <div>
                        <h3 class="f-700 m-0">{{ __('index.online') }}</h3>
                    </div>
                    <div class="ms-lg-4 mt-2 mt-lg-0">

                        <a href="{{ route('conference') }}" class="text-info text-decoration-underline">
                            <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="slider_navigation  WatchedSwiper_nav mb-4 d-none d-md-flex flex-row-reverse">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="swiper WatchedSwiper">
                <div class="swiper-wrapper">
                    @foreach ($conferences as $conference)
                        @if ($conference->info->enabled)
                            <div class="swiper-slide">
                                <a href="{{ route('course.show', $conference->info->slug) }}"
                                    style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($conference->image) }});color: inherit"
                                    class="watched-bg br-12 mb-3 mb-lg-0 d-block">
                                    <div
                                        class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                        <div>
                                            <p class="f-700 text-uppercase fs-10 watched-text">{{ __('index.congress') }}
                                            </p>
                                            <h5 class="f-700">{{ $conference->info->title }}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                @foreach ($conference->getLectors()->take(3) as $k => $lector)
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"
                                                        style="height: 50px;width: 50px;object-fit: cover;border: 2.4px solid #FFFFFF;"
                                                        class="@if ($k > 0) m-25 @endif rounded-circle"
                                                        alt="personPic">
                                                @endforeach

                                                @if ($conference->getLectors()->count() == 1)
                                                    <p class="m-0 ms-2 f-500 fs-16">
                                                        {{ $conference->getLectors()->first()->userInfo->fullName }}</p>
                                                @else
                                                    <p class="m-0 ms-2 f-500 fs-16">
                                                        {{ \App\Helpers\TEXT::lectorCount($conference->getLectors()->count()) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!--Webinars-->
    @if ($webinars->count() > 0)
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ff">
                <div>
                    <h3 class="f-700 m-0">{{ __('index.lectia') }}</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{ route('webinar.index') }}" class="text-info text-decoration-underline">
                        <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                        </p>
                    </a>
                </div>
            </div>
            <div class="slider_navigation AdditionsSwiper_nav mb-4 d-none d-md-flex flex-row-reverse">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper AdditionsSwiper">
            <div class="swiper-wrapper">
                @foreach ($webinars as $webinar)
                    @if ($webinar->info->enabled)
                        <div class="swiper-slide">
                            <a href="{{ route('webinar.show', $webinar->info->slug) }}" style="color: inherit"
                                class="d-block bg-white br-12">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}"
                                    alt="addPic" style="width: 386px; height: 214px; object-fit: cover "
                                    class="img-swip">
                                <div class="p-3">
                                    @if ($webinar->directions->first())
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">
                                            {{ $webinar->directions->first()->title }}</p>
                                    @endif
                                    <p class="f-700 fs-16 min-h-75 courseTxt-index">{{ $webinar->info->title }}</p>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                                            <span>
                                                <i class="far fa-clock me-1"></i>
                                                <span class="me-2 fs-14 f-500">{{ $webinar->getDuration() }}</span>
                                            </span>
                                            <span>
                                                <i class="fas fa-tasks me-1"></i>
                                                <span class="fs-14 f-500">{{ $webinar->webinars_count }}
                                                    {{ __('index.video') }}</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                        @if ($webinar->getLectors()->count() == 1)
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle border-white me-3 img_r_42"
                                                    src="{{ \Illuminate\Support\Facades\Storage::url($webinar->getLectors()->first()->lector->photo) }}"
                                                    alt="videoPic">
                                                <p class="m-0 f-500 fs-15 d-none d-sm-block">
                                                    {{ $webinar->getLectors()->first()->userInfo->fullName }}</p>
                                            </div>
                                        @else
                                            <div>
                                                @foreach ($webinar->getLectors() as $k => $user)
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image) }}"
                                                        class="@if ($k > 0) m-25 @endif me-1 rounded-circle img_r_42"
                                                        alt="videoPic">
                                                @endforeach

                                            </div>
                                        @endif
                                        <span class="price_box d-flex flex-column" style="min-height: 50px">

                                            @if ($webinar->sale)
                                                <span
                                                    class="f-700 text-primary fs-16 me-2 me-xl-0">{{ $webinar->sale->html() }}</span>
                                                <span
                                                    class="f-700 text-secondary del fs-16">{{ $webinar->price->html() }}</span>
                                            @else
                                                <span
                                                    class="f-700 text-primary fs-16 me-1">{{ $webinar->price->html() }}</span>
                                            @endif
                                        </span>
                                    </div>
                                    <form method="POST" action="{{ route('addToCart') }}" class="buy_form">
                                        @csrf
                                        <input type="hidden" value="{{ $webinar->id }}" name="id">
                                        <input type="hidden" value="webinar" name="type">
                                        <button
                                            class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __('index.buy_webinar') }}</button>
                                    </form>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
        {{-- <div class="container mt-4 mt-lg-6 useful_articles overflow-auto">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ">
                    <div>
                        <h3 class="f-700 m-0">{{ __('index.lectia') }}</h3>
                    </div>
                    <div class="ms-lg-4 mt-2 mt-lg-0">
                        <a href="{{ route('webinar.index') }}" class="text-info text-decoration-underline">
                            <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                            </p>
                        </a>
                    </div>
                </div>
                <div class="slider_navigation  OnlineSwiper_nav mb-3 d-none d-md-flex flex-row-reverse">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

            <div class="swiper OnlineSwiper">
                <div class="swiper-wrapper">
                    @foreach ($webinars as $webinar)
                        @if ($webinar->info->enabled)
                            <div class="swiper-slide">
                                <a href="{{ route('webinar.show', $webinar['info']->slug) }}" style="color: inherit"
                                    class="br-12 d-block  bg-white">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}"
                                        alt="addPic" style="width: 100%; height: 214px; object-fit: cover "
                                        class="img-swip">
                                    <div class="p-3">
                                        @if ($webinar->directions->first())
                                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">
                                                {{ $webinar->directions->first()->title }}</p>
                                        @endif
                                        <p class="f-700 fs-16 min-h-75 courseTxt-index">{{ $webinar->info->title }}</p>
                                        <div class="mt-2 d-flex justify-content-between">
                                            <div class="d-flex flex-column flex-sm-row justify-content-between w-100">
                                                <span>
                                                    <i class="far fa-clock me-1"></i>
                                                    <span class="me-2 fs-14 f-500">{{ $webinar->getDuration() }}</span>
                                                </span>
                                                <span>
                                                    <i class="fas fa-tasks me-1"></i>
                                                    <span class="fs-14 f-500">{{ $webinar->webinars_count }}
                                                        {{ __('index.video') }}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                            <div class="d-flex align-items-center  min-h-42">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->userinfo->image) }}"
                                                    class="me-2 rounded-circle" alt="customerPic"
                                                    style="width: 30px;height: 30px;object-fit: cover">
                                                <p class="m-0 fs-14 f-500">{{ $webinar->user->userinfo->fname }}
                                                    {{ $webinar->user->userinfo->lname }}</p>
                                            </div>
                                            <div>
                                                <span class="_box d-flex flex-column" style="min-height: 50px">

                                                    @if ($webinar->sale)
                                                        <span
                                                            class="f-700 text-primary fs-16 me-2 me-xl-0">{{ $webinar->sale->html() }}</span>
                                                        <span
                                                            class="f-700 text-secondary del fs-16">{{ $webinar->price->html() }}</span>
                                                    @else
                                                        <span
                                                            class="f-700 text-primary fs-16 me-1">{{ $webinar->price->html() }}</span>
                                                    @endif
                                                </span>
                                            </div>

                                        </div>
                                        <form method="POST" action="{{ route('addToCart') }}" class="buy_form">
                                            @csrf
                                            <input type="hidden" value="{{ $webinar->id }}" name="id">
                                            <input type="hidden" value="webinar" name="type">
                                            <button
                                                class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __('index.buy_webinar') }}</button>
                                        </form>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div> --}}
    @endif

    {{--    NEW VIDEOS GRID --}}
    <div class="w-100 text-white pb-5 pb-lg-6 bg-gray video_blog mt-4 mt-lg-6">
        <div class="container">
            <div class="grid-big-div">
                <div class="grid-container">
                    <div class="grid-item grid-item-1">
                        <div class="position-relative video_block h-100">
                            <iframe style="z-index: 1;" class="d-none position-absolute" width="100%" height="100%"
                                src="{{ $videos[0]->url }}" title="Walter Devoto about Stom Academy." frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($videos[0]->image) }}" alt="videoPic"
                                class="big">
                            <div
                                class="video_play cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                    </div>
                    @foreach ($videos as $k => $video)
                        @continue($k == 0)
                        <div class="grid-item">
                            <div class="position-relative video_block h-100">
                                <iframe style="z-index: 1;" class="d-none position-absolute" width="100%"
                                    height="100%" src="{{ $video->url }}" title="Walter Devoto about Stom Academy."
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($video->image) }}" alt="videoPic"
                                    class="h-100">
                                <div
                                    class="video_play cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <!--partners-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ">
            <div>
                <h3 class="f-700 m-0">{{ __('index.partners') }}</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="{{ route('about') }}" class="text-info text-decoration-underline">
                    <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                    </p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner1.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner2.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner3.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner4.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner5.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner6.png" alt="partnerPic">
                </div>
            </div>
            <div class="col mt-3">
                <div class="h-100 bg-white p-0 py-2 px-4 d-flex align-items-center justify-content-center br-12">
                    <img src="/dist/image/partner7.png" alt="partnerPic">
                </div>
            </div>
        </div>
    </div>

    <!--Blog-->

    {{-- @if ($blogs->count() > 0)
        <div class="container mt-4 mt-lg-6 useful_articles">
            <div class="d-flex align-items-lg-end mb-4 flex-column flex-lg-row ">
                <div>
                    <h3 class="f-700 m-0">{{ __('index.blogs') }}</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{ route('blog.index') }}" class="text-info text-decoration-underline">
                        <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i></p>
                    </a>
                </div>
            </div>
            <div>
                <div class="mt-4 d-flex useful_article_row">
                    @foreach ($blogs as $blog)
                        @if ($blog->info->enabled)
                            <a href="{{ route('blog.show', $blog->info->slug) }}" style="color: inherit"
                                class="d-flex flex-column useful_article_item @if ($blog->id % 2 != 0) flex-lg-column-reverse @endif">
                                <div>
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->info->image) }}"
                                        alt="articlePic">
                                </div>
                                <div class="p-3 p-lg-4 d-flex flex-column align-items-start justify-content-between">
                                    <p class="text-primary text-uppercase f-700 fs-10 m-0">
                                        {{ $blog->directions->title }}
                                    </p>
                                    <h5 class="f-700 mt-2 m-0 text-black fs-16">
                                        {{ $blog->info->title }}
                                    </h5>
                                    <p class="fs-14 f-500 m-0">
                                        <i
                                            class="far fa-calendar me-2"></i>{{ date('d-m-Y', strtotime($blog->created_at)) }}
                                    </p>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif --}}

    <!--lectors-->
    @if ($lectors->count() > 0)
        <div class="container mt-5">
            <div class="d-flex align-items-lg-end flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">{{ __('index.lectors') }}</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{ route('lectors.index') }}" class="text-info text-decoration-underline">
                        <p class="m-0 f-700 fs-16">{{ __('index.show_all') }}<i class="far fa-angle-right ms-2"></i>
                        </p>
                    </a>
                </div>
            </div>
            <div class="row">
                @foreach ($lectors as $lector)
                    @if ($lector->lector->info->enabled)
                        <a href="{{ route('lectors.show', $lector->userInfo->slug) }}"
                            class="d-block col-6 col-sm-4 col-lg-2 mt-3 mt-lg-4" style="color:inherit">
                            <div class="bg-white br-12">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->userinfo->image) }}"
                                    style="width: 100%; height: 203px; object-fit: cover; object-position: top center;"
                                    alt="lecturerPic">
                                <div class="text-black p-3">
                                    <p class="fs-20 f-700 min-h-90">{{ $lector->userinfo->fname }}
                                        {{ $lector->userinfo->lname }}</p>
                                    @if ($lector->directions->first())
                                        <p class="text-secondary fs-14 f-500">{{ $lector->directions->first()->title }}
                                        </p>
                                    @endif
                                    <i class="fal fa-layer-group"></i><span
                                        class="ms-2 fs-14 f-500">{{ \App\Helpers\TEXT::lectionCount($lector->webinars_count) }}</span>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    <!--Last part-->
    <div class="container mt-4 mt-lg-5 mb-4 mb-lg-6">
        <div class="row d-flex flex-column flex-lg-row">
            <div class="col mt-4">
                <div class="bg-white br-12 p-2 p-md-3 p-lg-5 d-flex h-100">
                    <div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 93px; height: 93px;background-color: rgba(25, 31, 112, 0.1)">
                            <i class="fal fa-chalkboard-teacher text-primary fs-25"></i>
                        </div>
                    </div>
                    <div class="ms-4 mt-2">
                        <h4 class="f-700">{{ __('index.to_by_lector.title') }}</h4>
                        <p class="fs-16 mb-4">{{ __('index.to_by_lector.text') }}</p>
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12 white-space" data-bs-toggle="modal"
                            data-bs-target="#lectorModal">{{ __('index.to_by_lector.button') }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="col mt-4">
                <div class="bg-white br-12 p-2 p-md-3 p-lg-5 d-flex h-100">
                    <div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 93px; height: 93px;background-color: rgba(25, 31, 112, 0.1)">
                            <i class="fab fa-telegram-plane text-primary fs-25"></i>
                        </div>
                    </div>
                    <div class="ms-4 mt-2">
                        <h4 class="f-700">{{ __('index.subscribe.title') }}</h4>
                        <p class="fs-16 mb-4">{{ __('index.subscribe.text') }}</p>
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12" data-bs-toggle="modal"
                            data-bs-target="#lectorFollowModal">{{ __('index.subscribe.button') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
