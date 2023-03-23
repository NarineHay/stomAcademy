@extends("layouts.app")

@section("content")
    <div class="container mt-4 mt-lg-5">
        <div class="d-flex justify-content-center flex-wrap gap-2">
            <a href="{{route('course.index')}}" class="btn btn-outline-primary rounded-5 fs-15 f-600 py-2 px-3">
                Все направления
            </a>
            @foreach($directions as $direction)
                <a href="{{ route("course.index",['direction_id' => $direction->id]) }}"
                   class="btn btn-outline-primary rounded-5 fs-15 f-600 py-2 px-3">
                    {{$direction->title}}
                </a>
            @endforeach
        </div>
    </div>
    <!--Популярные курсы-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">{{ __("index.popular_courses") }}</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{route('webinar.index')}}" class="text-info text-decoration-underline"><p
                            class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigation videoPopularSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper videoPopularSwiper br-12">
            <div class="swiper-wrapper">
                @foreach($courses as $course)
                    <a href="{{ route("course.show",$course->id) }}" class="p-3 swiper-slide d-flex flex-column flex-xxl-row br-12" style="color: inherit">
                        <img src='{{\Illuminate\Support\Facades\Storage::url($course->image)}}' alt="videoPic"
                             style="width: 100%; height: 192px; object-fit: cover">
                        <div class="d-flex flex-column ms-0 ms-xxl-4 mt-3 mt-xxl-0">
                            <p class="text-primary text-uppercase f-700 fs-10">{{$course->directions->first()->title}}</p>
                            <h5 class="f-700">{{$course->info->title}}</h5>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span
                                    class="me-2 f-500 f-14">{{$course->getDuration()}}</span>
                                <i class="fas fa-tasks me-1"></i> <span class="f-500 f-14">{{$course->webinars_count}} видео</span>
                            </div>
                            {{--                            <div class="d-flex align-items-center mt-3">--}}
                            {{--                                <img src="/dist/image/kamil.png" class="me-3" alt="videoPic">--}}
                            {{--                                <p class="m-0 f-500 fs-16">Камиль Хабиев</p>--}}
                            {{--                            </div>--}}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!--Новые курсы-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">Новые курсы</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{route('course.index')}}" class="text-info text-decoration-underline"><p
                            class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigation AdditionsSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper AdditionsSwiper">
            <div class="swiper-wrapper">
                @foreach($courses as $course)
                    <div class="swiper-slide">
                        <a href="{{ route("course.show",$course->id) }}" style="color: inherit" class="d-block bg-white br-12">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($course->image)}}" alt="addPic"
                                 style="width: 386px; height: 214px; object-fit: cover">
                            <div class="p-3">
                                <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$course->directions->first()->title}}</p>
                                <p class="f-700 fs-16">{{$course->info->title}}</p>
                                <div class="mt-2 d-flex justify-content-between">
                                    <div>
                                        <i class="far fa-clock me-1"></i> <span
                                            class="me-2 fs-14 f-500">{{$course->getDuration()}}</span>
{{--                                        <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">{{$course->webinars_count}} видео</span>--}}
                                    </div>
                                    <div>
                                        <span class="f-700 text-primary fs-16">{{$course->price->rub}} ₽</span>
                                    </div>
                                </div>
                                <form method="POST" action="{{route('addToCart')}}">
                                    @csrf
                                    <input type="hidden" value="{{ $course->id }}" name="id">
                                    <input type="hidden" value="course" name="type">
                                    <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию
                                    </button>
                                </form>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Онлайн-конференции-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">Онлайн-конференции</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{route('conference')}}" class="text-info text-decoration-underline">
                        <p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigation WatchedSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper WatchedSwiper">
            <div class="swiper-wrapper">
                @foreach($conferences as $conference)
                    <div class="swiper-slide">
                        <a href="{{ route("conference.show",$conference->id) }}"
                            style="background-image: url({{\Illuminate\Support\Facades\Storage::url($conference->image)}});color: inherit"
                            class="watched-bg br-12 mb-3 mb-lg-0 d-block">
                            <div
                                class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                <div>
                                    <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                    <h5 class="f-700">{{$conference->info->title}}</h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div>
                                        @foreach($conference->getLectors()->take(3) as $k => $lector)
                                            <img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"
                                                style="height: 50px;width: 50px;object-fit: cover" class="@if ($k>0) m-25 @endif rounded-circle"
                                                alt="personPic">
                                        @endforeach
                                    </div>
                                    <div>
                                        @if($conference->getLectors()->count() > 3)
                                            <span
                                                class="fs-20 f-600 ms-2">{{ $conference->getLectors()->count()-3}}+</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Webinars-->
    <div class="container mt-4 mt-lg-6 useful_articles overflow-auto">
        <div class="d-flex align-items-lg-center flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Онлайн-лекции</h3>
            </div>
            <div class="ms-lg-4">
                <a href="{{route('webinar.index')}}" class="text-info text-decoration-underline"><p
                        class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
            </div>
        </div>
        <div class="row flex-nowrap flex-md-wrap">
            @foreach($webinars as $webinar)
                <a class="col-10 col-md-4 col-xxl-2 mt-3 d-block" style="color: inherit" href="{{ route("webinar.show",$webinar->id) }}">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}"
                             style="width: 100%; height: 150px; object-fit: cover" alt="notePic">
                        <div class="d-flex flex-column p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$webinar->directions->first()->title}}</p>
                            <p class="f-700 mt-1 fs-16">{{$webinar->info->title}}</p>
                            <div class="d-flex align-items-center mt-2">
                                <img
                                    src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->userinfo->image) }}"
                                    class="me-2 rounded-circle" alt="customerPic" style="width: 30px;height: 30px;object-fit: cover">
                                <p class="m-0 fs-14 f-500">{{$webinar->user->userinfo->fname}} {{$webinar->user->userinfo->lname}}</p>
                            </div>
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                                <div class="mb-3 mb-md-0">
                                    <span class="f-700 text-primary fs-16">{{$webinar->price->rub}} ₽</span>
                                </div>
                                <form method="POST" action="{{ route('addToCart') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $webinar->id }}" name="id">
                                    <input type="hidden" value="webinar" name="type">
                                    <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                        Купить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!--Videos-->
    <div class="w-100 text-white pb-5 pb-lg-6 bg-gray video_blog mt-4 mt-lg-6">
        <div class="container">
            <div class="row images py-6">
                <div class="col-12 col-lg-6">
                    <div class="position-relative video_block">
                        <iframe style="z-index: 1;" class="d-none position-absolute" width="100%" height="100%"
                                src="{{ $videos[0]->url }}" title="Walter Devoto about Stom Academy." frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        <img src="{{\Illuminate\Support\Facades\Storage::url($videos[0]->image)}}" alt="videoPic"
                             class="big">
                        <div
                            class="video_play cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>

                {{--                <div class="row">--}}
{{--                <div class="col-lg-4 col-6">--}}
                    <div class="d-flex flex-wrap">
                        @foreach($videos as $k => $video)
                            @continue($k == 0)
                            <div class="col-lg-3 col-6">
                                <div class="position-relative video_block h-100 me-4 mb-2">
                                    <iframe style="z-index: 1;" class="d-none position-absolute" width="100%"
                                            height="100%" src="{{ $video->url }}"
                                            title="Walter Devoto about Stom Academy." frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($video->image)}}"
                                         alt="videoPic" class="h-100 pb-1">
                                    <div
                                        class="video_play cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                {{--                </div>--}}


            </div>
        </div>
    </div>

    <!--partners-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Наши партнеры</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="{{route('about')}}" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">
                        Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
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
    <div class="container mt-4 mt-lg-6 useful_articles">
        <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Полезные статьи</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="{{route('blog.index')}}" class="text-info text-decoration-underline">
                    <p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p>
                </a>
            </div>
        </div>
        <div>
            <div class="mt-4 d-flex useful_article_row">
                @foreach($blogs as $blog)
                    <a
                        href="{{route('blog.show',$blog->id)}}"
                        style="color: inherit"
                        class="d-flex flex-column useful_article_item @if($blog->id%2!=0)flex-lg-column-reverse @endif">
                        <div>
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->info->image) }}"
                                 alt="articlePic">
                        </div>
                        <div class="p-3 p-lg-4">
                            <p class="text-primary text-uppercase f-700 fs-10 m-0">
                                {{$blog->directions->title}}
                            </p>
                            <h5 class="f-700 mt-2 m-0">
                                <span href="{{route('blog.show',$blog->id)}}" class="text-black">
                                    {{$blog->info->title}}
                                </span>
                            </h5>
                            <p class="mt-2 mt-lg-6 fs-14 f-500 m-0 mt-3">
                                <i class="far fa-calendar me-2"></i>{{date('d-m-Y', strtotime($blog->created_at))}}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!--lectors-->
    <div class="container mt-5">
        <div class="d-flex align-items-lg-center flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Наши Лектора</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="{{route('lectors.index')}}" class="text-info text-decoration-underline"><p
                        class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
            </div>
        </div>
        <div class="row">
            @foreach($lectors as $lector)
                <a href="{{ route("lectors.show",$lector->id) }}" class="d-block col-6 col-sm-4 col-lg-2 mt-3 mt-lg-4" style="color:inherit">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->userinfo->image) }}"
                             style="width: 251px; height: 203px; object-fit: cover" alt="lecturerPic">
                        <div class="text-black p-3">
                            <p class="fs-20 f-700">{{ $lector->userinfo->fname }} {{ $lector->userinfo->lname }}</p>
                            <p class="text-secondary fs-14 f-500">{{$lector->directions->first()->title}}</p>
                            <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">{{ $lector->webinars_count }} лекции</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

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
                        <h4 class="f-700">Хочешь стать лектором?</h4>
                        <p class="fs-16 mb-4">Отправьте заявку и мы свяжимся с вами в ближайшее время</p>
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12 white-space" data-bs-toggle="modal"
                                data-bs-target="#lectorModal">Отправить заявку
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
                        <h4 class="f-700">Оповестить о новых лекциях?</h4>
                        <p class="fs-16 mb-4">Никакого спама, все только по делу!</p>
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12" data-bs-toggle="modal"
                                data-bs-target="#lectorFollowModal">Подписаться
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
