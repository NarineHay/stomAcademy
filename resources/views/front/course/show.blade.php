@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden ">
        <div class="courses-show-div">
            <div class="div-menu-2"
                 style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($course->bg_image) }});">
                <div class="container position-relative">
                    <div class="menu">
                        <a href="{{route('home')}}">{{ __("header.menu.home") }}</a>
                        <span>|</span>
                        <a href="{{route('course.index')}}">{{ __("header.menu.courses") }}</a>
                        <span>|</span>
                        <a><span class="fs-12 f-500 m-0">{{ $course->info->title}}</span></a>
                    </div>
                    <div class="d-block d-lg-none pt-4">
                        <div class="about-course1">
                            <h1 class="text-white fw-bolder fs-24 lh-30">{{ $course->info->title }}</h1>
                            @if($course->webinars)
                                <p class="text-white fs-13">{{ $course->webinars->count() }} {{ __("courses.under_title") }}</p>
                            @endif
                            <div class="d-flex flex-row">
                                <div class="images">
                                    @foreach($course->getLectors() as $lector)
                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}"
                                            alt="avatar3.png">
                                    @endforeach
                                </div>
                                <div class="txts d-flex flex-row">
                                    <div class="txts1">
                                        <p class="txts-1-title text-white mb-1">{{ __("courses.filters.lector") }}</p>
                                        <a href="#lectors">
                                            <div class="d-flex flex-row align-items-center">
                                                <p class="p-name mb-0 me-1">{{ $course->getLectors()->first()->userInfo->fullName }}</p>
                                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
                                                          fill="#FFFFFF"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="txts1 d-xxl-block d-none">
                                        <p class="txts-1-title">{{ __("courses.start") }}</p>
                                        <p>{{ \Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y") }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="txts1 d-xxl-none d-flex flex-row mt-3 align-items-center mb-2 text-white pb-3">
                                <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500 text-white">{{ __("courses.start") }}</p>
                                <p class="mb-0 fs-14 lh-17 f-700 text-white">{{ \Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main2">
                <div class="backgraund-wite"
                     style="width: 100%; background: white; height: 311px; position: absolute;"></div>
                <div class="container eng-doctors-txt sss">
                    <div class="row">
                        <div class="d-none d-lg-block col-12 col-lg-8">
                            <div class="about-course1">
                                <h1 class="text-primary fw-bolder fs-30 lh-40">{{ $course->info->title }}</h1>
                                @if($course->webinars)
                                    <p>{{ __("courses.under_title",['count' => $course->webinars->count()]) }}</p>
                                @else
                                    <p>{{ __("courses.under_title_web") }}</p>
                                @endif
                                <div class="d-flex flex-row">
                                    <div class="images">
                                        @foreach($course->getLectors() as $lector)
                                            <img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}"
                                                alt="avatar3.png">
                                        @endforeach
                                    </div>
                                    <div class="txts d-flex flex-row">
                                        <div class="txts1">
                                            <p class="txts-1-title">{{ __("courses.filters.lector") }}</p>
                                            <a href="#lectors">
                                                <div class="d-flex flex-row align-items-center">
                                                    <p class="p-name">{{ $course->getLectors()->first()->userInfo->fullName }}</p>
                                                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
                                                              fill="#232323"/>
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="txts1 d-xxl-block d-none">
                                            <p class="txts-1-title">{{ __("courses.start") }}</p>
                                            @if(\Illuminate\Support\Carbon::make($course->start_date)->getTimestamp() < \Illuminate\Support\Carbon::now()->getTimestamp())
                                                <p>Доступно к просмотру после покупки</p>
                                            @else
                                                <p>{{ \Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y") }}</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="txts1 d-xxl-none d-flex flex-row mt-3 align-items-center">
                                    <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500">{{ __("courses.start") }}</p>
                                    @if(\Illuminate\Support\Carbon::make($course->start_date)->getTimestamp() < \Illuminate\Support\Carbon::now()->getTimestamp())
                                        <p class="mb-0 fs-14 lh-17 f-700">Доступно к просмотру после покупки</p>
                                    @else
                                        <p class="mb-0 fs-14 lh-17 f-700">{{ \Illuminate\Support\Carbon::make($course->start_date)->translatedFormat("M d, Y") }}</p>
                                    @endif
                                </div>
                            </div>


                            <div class="about-course-txt d-lg-block d-none">
                                <h2 class="f-700 fs-32 lh-40">{{ __("courses.desc_title") }}</h2>
                                <p class="fs-16 lh-27 f-500 mb-0">
                                    {!! $course->info->description !!}
                                </p>
                            </div>


                        <!-- <div id="course-program" class="main3">
                    <div class="container">
                        <div class="row">
{{--                            <div class="col-xl-7 col-12">--}}
                            <div class="col-12">
                                <div class="mt-4 mt-lg-0">
                                    <h3 class="f-700 m-0 lh-40 pb-2">{{ __("courses.menu.program") }}</h3>
                                    <div class="mt-2">
{{--                                        @foreach($course->webinars_object as $k => $webinar)--}}
                        {{--                            <div class="accordion accordion-flush">--}}
                        {{--                                <div class="accordion-item br-12">--}}
                        {{--                                    <h2 class="accordion-header">--}}
                        {{--                                        <button class="accordion-button collapsed" type="button"--}}
                        {{--                                                data-bs-toggle="collapse"--}}
                        {{--                                                data-bs-target="#flush-collapseOne-{{ $webinar->id }}"--}}
                        {{--                                                                aria-expanded="false"--}}
                        {{--                                                                aria-controls="flush-collapseOne">--}}
                        {{--                                                            <div class="d-flex align-items-md-center flex-column flex-md-row w-100">--}}
                        {{--                                                                <div class="d-flex" style="flex:0 0 30%">--}}
                        {{--                                                                    <p class="fs-16 f-500 m-0 color-23">{{ $k + 1 }}</p>--}}
                        {{--                                                                    <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap">{!! $webinar->directions->map(function ($d){ return $d->title; })->join(",<br>")  !!}</p>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="d-flex align-items-center mt-3 mt-md-0" style="flex:0 0 30%">--}}
                        {{--                                                                    <img--}}
                        {{--                                                                        src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo) }}"--}}
                        {{--                                                                        class="me-2 videoPic img_r_42 rounded-5"--}}
                        {{--                                                                        alt="videoPic">--}}
                        {{--                                                                    <p class="m-0 f-500 fs-14 color-23 lh-17">{{ $webinar->user->userInfo->fullName }}</p>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="d-flex d-none d-lg-block" style="flex:0 0 20%">--}}
                        {{--                                                                    <i class="far fa-clock me-1"></i>--}}
                        {{--                                                                    <span--}}
                        {{--                                                                        class="me-2 f-500 f-14">{{ $webinar->getDuration() }}</span>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="d-flex align-items-center mt-4 mt-md-0 justify-content-between" style="flex:0 0 10%">--}}
                        {{--                                                                    <p class="m-0 f-700 fs-16 text-primary pe-3">{{ $webinar->price->html() }}</p>--}}
                        {{--                                                                    <div--}}
                        {{--                                                                        class="btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">--}}
                        {{--                                                                        {{ __("courses.by") }}--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </button>--}}
                        {{--                </h2>--}}
                        {{--                <div id="flush-collapseOne-{{ $webinar->id }}"--}}
                        {{--                                                         class="accordion-collapse collapse @if($k == 0) show @endif"--}}
                        {{--                                                         aria-labelledby="flush-headingOne"--}}
                        {{--                                                         data-bs-parent="#accordionFlushExample">--}}
                        {{--                                                        <div class="accordion-body">--}}
                        {{--                                                            <div class="p-2 py-lg-3 px-lg-5">--}}
                        {{--                                                                {!! $webinar->info->description !!}--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        {{--@endforeach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card course_card_static">
                                <div class="card-body">
                                    <div class="img_video video_block position-relative">
                                        {{--                                        @php--}}
                                        {{--                                            $x = explode("/",$course->video);--}}
                                        {{--                                            $preview = 'https://img.youtube.com/vi/'.array_pop($x).'/hqdefault.jpg';--}}
                                        {{--                                        @endphp--}}


                                        @if($course->info->video_invitation || $course->video)
                                            <div id="player"
                                                 class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">
                                                <iframe style="z-index: 1;left: 0" class="position-absolute d-none"
                                                        width="100%"
                                                        height="100%" src="{{ $course->info->video_invitation ?? $course->video}}"
                                                        title="Walter Devoto about Stom Academy." frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                        allowfullscreen></iframe>
                                            </div>

                                        @else
                                            {{--                                            <img class="img_preview" src="{{ $preview }}">--}}
                                            @if($course->bg_image)
                                                <img class="img_preview"
                                                     src="{{ \Illuminate\Support\Facades\Storage::url($course->bg_image) }}">
                                            @else
                                                {{--                                                <img class="img_preview" src="#">--}}
                                                <div class="img_preview_gray_bg w-100 "
                                                     style="height: 233px; background-color: rgba(0,0,0,0.4)"></div>
                                            @endif
                                        @endif
                                        {{--                                        <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY" class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls"></div>--}}


                                        {{--                                        <div--}}
                                        {{--                                            class="video_play cursor position-absolute ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3" style="left: 50%;top: 50%;transform: translate(-50%,-50%)">--}}
                                        {{--                                            <i class="fas fa-play"></i>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <div class="card-txts">
                                        {{--                                    <p class="fs-25 card-title-txt fw-bolder">{{ $course->info->title }}</p>--}}
                                        <p class="m-0 text-secondary fs-14 f-500 card-price-txt">{{ __("courses.price_all") }}</p>
                                        <h3 class="f-700 mt-0 text-primary">
                                            @if($course->sale)
                                                <span>{{ $course->sale->html() }}</span>
                                                <span>/</span>
                                                <span
                                                    class="del">{{ $course->price->html() }}</span>
                                            @else
                                                <span>{{ $course->price->html() }}</span>
                                            @endif
                                        </h3>
                                    <!-- <p class="f-500 fs-14 lh-17 mb-2">
                                            @if($course->webinars)
                                        {{ $course->webinars->count() }} {{ __("courses.under_title") }}
                                            <span class="text-primary">1 {{ __("courses.free") }}</span></p>
                                        <p class="f-500 fs-14 lh-17 mb-3">{{ __("courses.dop") }}</p>
                                        @endif -->
                                        <p class="f-500 fs-14 lh-17 mb-2">
                                            7-дневная гарантия замены или возврата дене
                                        </p>

                                    </div>

                                    <form method="POST" action="{{route('addToCart')}}" class="course-card-form">
                                        @csrf
                                        <input type="hidden" value="{{ $course->id }}" name="id">
                                        <input type="hidden" value="webinar" name="type">
                                        @if($course->webinars)
                                            <div
                                                class="course-card-form-div d-flex justify-content-between flex-column flex-lg-row mb-3 ff">
                                                <div class="form-check">
                                                    <input type="checkbox" class="mr-1 form-check-input ">
                                                    <label
                                                        class="form-check-label fs-14">1 {{ __("courses.free") }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" checked=""
                                                           class="mr-1 form-check-input">
                                                    <label
                                                        class="form-check-label  fs-14">{{ __("courses.all_course") }}
                                                        ({{ $course->sale->rub ?? $course->price->html() }})</label>
                                                </div>
                                            </div>
                                            <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#webinarSelectModal"
                                                    class="btn btn-outline-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                {{ __("courses.select_webinar") }}
                                            </button>
                                        @endif

                                        <button class="btn btn-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                            {{ __("courses.by_course") }}
                                        </button>

                                    </form>

                                    <div class="d-flex flex-row flex-wrap justify-content-between div-icons">
                                        <div class="mb-2">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.99992 2.50004C5.85778 2.50004 2.49992 5.8579 2.49992 10C2.49992 14.1422 5.85778 17.5 9.99992 17.5C14.1421 17.5 17.4999 14.1422 17.4999 10C17.4999 5.8579 14.1421 2.50004 9.99992 2.50004ZM0.833252 10C0.833252 4.93743 4.93731 0.833374 9.99992 0.833374C15.0625 0.833374 19.1666 4.93743 19.1666 10C19.1666 15.0626 15.0625 19.1667 9.99992 19.1667C4.93731 19.1667 0.833252 15.0626 0.833252 10Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.99992 4.16671C10.4602 4.16671 10.8333 4.5398 10.8333 5.00004V9.48501L13.7059 10.9214C14.1176 11.1272 14.2844 11.6277 14.0786 12.0394C13.8728 12.451 13.3722 12.6179 12.9606 12.4121L9.62724 10.7454C9.34492 10.6042 9.16658 10.3157 9.16658 10V5.00004C9.16658 4.5398 9.53968 4.16671 9.99992 4.16671Z"
                                                      fill="#191F70"/>
                                            </svg>
                                            <span
                                                class="ms-2 f-500 fs-14 lh-20">{{ $course->getDuration() }}</span>
                                        </div>

                                        <div class="mb-2">
                                            <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1.23223 1.56561C1.70107 1.09677 2.33696 0.833374 3 0.833374H9.66667C9.88768 0.833374 10.0996 0.921171 10.2559 1.07745L15.2559 6.07745C15.4122 6.23373 15.5 6.44569 15.5 6.66671V16.6667C15.5 17.3297 15.2366 17.9656 14.7678 18.4345C14.2989 18.9033 13.663 19.1667 13 19.1667H3C2.33696 19.1667 1.70107 18.9033 1.23223 18.4345C0.763392 17.9656 0.5 17.3297 0.5 16.6667V3.33337C0.5 2.67033 0.763392 2.03445 1.23223 1.56561ZM3 2.50004C2.77899 2.50004 2.56702 2.58784 2.41074 2.74412C2.25446 2.9004 2.16667 3.11236 2.16667 3.33337V16.6667C2.16667 16.8877 2.25446 17.0997 2.41074 17.256C2.56702 17.4122 2.77899 17.5 3 17.5H13C13.221 17.5 13.433 17.4122 13.5893 17.256C13.7455 17.0997 13.8333 16.8877 13.8333 16.6667V7.01188L9.32149 2.50004H3Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M9.66667 0.833374C10.1269 0.833374 10.5 1.20647 10.5 1.66671V5.83337H14.6667C15.1269 5.83337 15.5 6.20647 15.5 6.66671C15.5 7.12694 15.1269 7.50004 14.6667 7.50004H9.66667C9.20643 7.50004 8.83333 7.12694 8.83333 6.66671V1.66671C8.83333 1.20647 9.20643 0.833374 9.66667 0.833374Z"
                                                      fill="#191F70"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M4.66667 12.5C4.66667 12.0398 5.03976 11.6667 5.5 11.6667H10.5C10.9602 11.6667 11.3333 12.0398 11.3333 12.5C11.3333 12.9603 10.9602 13.3334 10.5 13.3334H5.5C5.03976 13.3334 4.66667 12.9603 4.66667 12.5Z"
                                                      fill="#191F70"/>
                                            </svg>
                                            <span class="ms-2 f-500 fs-14 lh-20">{{ __("courses.certificate") }}</span>
                                        </div>
                                        <div class="d-flex">
                                            <i class="fal fa-infinity" style="color: #191F70; font-size:20px;"></i>
                                            <p class="ms-2 f-500 fs-14 lh-20">Неограниченный просмотр</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="section-menu d-block d-lg-none mt-4">
                                <ul class="pb-3">
                                    <li><a href="#about-course-txt"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.about") }}</a>
                                    </li>
                                    <li><a href="#course-program"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.program") }}</a>
                                    </li>
                                    <li><a href="#lectors"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.lectors") }}</a></li>
                                    <li><a href="#registration"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.register") }}</a>
                                    </li>
                                    <li><a href="#faq"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.faq") }}</a>
                                    </li>
                                    <li><a href="#other-courses"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.other") }}</a>
                                    </li>
                                    <li><a href="#contacts"
                                           class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.contacts") }}</a></li>
                                </ul>

                            </div>
                            <div id="about-course-txt" class="about-course-txt d-block d-lg-none mt-4">
                                <h2 class="f-700 fs-32 lh-40">{{ __("courses.desc_title") }}</h2>
                                <p class="fs-16 lh-27 f-500">
                                    {!! $course->info->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($course->webinars)

                <div class="modal fade" id="webinarSelectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Выбрать уроки</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('addManyToCart') }}" method="POST">
                                    @csrf
                                    @foreach($course->webinars_object as $k => $webinar)
                                        <div
                                            class="d-flex justify-content-between align-items-md-center flex-column flex-md-row w-100 py-2 course_item">
                                            <div class="d-flex" style="flex:0 0 30%">
                                                <p class="fs-16 f-500 m-0 color-23">{{ $k + 1 }}</p>
                                                <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap">{!! $webinar->directions->map(function ($d){ return $d->title; })->join(",<br>")  !!}</p>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 mt-md-0" style="flex:0 0 30%">
                                                <img
                                                    src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo) }}"
                                                    class="me-2 videoPic img_r_42 rounded-5"
                                                    alt="videoPic">
                                                <p class="m-0 f-500 fs-14 color-23 lh-17">{{ $webinar->user->userInfo->fullName }}</p>
                                            </div>
                                            <div class="d-flex d-none d-lg-block" style="flex:0 0 20%">
                                                <i class="far fa-clock me-1"></i>
                                                <span
                                                    class="me-2 f-500 f-14">{{ $webinar->getDuration() }}</span>
                                            </div>
                                            <div class="d-flex align-items-center mt-4 mt-md-0 justify-content-between"
                                                 style="flex:0 0 10%">
                                                <p class="m-0 f-700 fs-16 text-primary pe-3">{{ $webinar->price->html() }}</p>
                                                <input name="item_id[]" value="{{ $webinar->id }}" type="checkbox"
                                                       data-price="{{ $webinar->price->pure() }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                            <div class="modal-footer d-none">
                                <h5><span class="me-2">Итого (<span class="co">0</span>)</span><span
                                        class="total"></span> <i class="icon-{{ \App\Helpers\TEXT::curHtml() }}"></i>
                                </h5>
                                <button class="btn btn-primary buyButton">{{ __("index.buy_webinar") }}</button>
                            </div>
                        </div>
                    </div>
                </div>



            <!-- <div class="container">
                  <div class="about-course-txt d-lg-block d-none">
                                <h2 class="f-700 fs-32 lh-40">{{ __("courses.desc_title") }}</h2>
                                <p class="fs-16 lh-27 f-500 mb-0">
                                    {!! $course->info->description !!}
                </p>
            </div>
            </div> -->
                <div id="course-program" class="main3">
                    <div class="container">
                        <div class="row">
                            {{--                            <div class="col-xl-7 col-12">--}}
                            <div class="col-12">
                                <div class="mt-4 mt-lg-0">
                                    <h3 class="f-700 m-0 lh-40 pb-2">{{ __("courses.menu.program") }}</h3>
                                    <div class="mt-2">

                                        @if($course->webinars_object)
                                            @foreach($course->webinars_object as $k => $webinar)
                                                <div class="accordion accordion-flush">
                                                    <div class="accordion-item br-12">
                                                        <h2 class="accordion-header position-relative">
                                                            <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne-{{ $webinar->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                <div
                                                                    class="d-flex align-items-md-center flex-column flex-md-row w-100">
                                                                    <div class="d-flex" style="flex:0 0 30%">
                                                                        <p class="fs-16 f-500 m-0 color-23">{{ $k + 1 }}</p>
                                                                        <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap webinar-name-p-mobile">{{ $webinar->info->title }}</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center mt-3 mt-md-0"
                                                                         style="flex:0 0 30%">
                                                                        <img
                                                                            src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo) }}"
                                                                            class="me-2 videoPic img_r_42 rounded-5"
                                                                            alt="videoPic">
                                                                        <p class="m-0 f-500 fs-14 color-23 lh-17">{{ $webinar->user->userInfo->fullName }}</p>
                                                                    </div>
                                                                    <div class="d-flex d-none d-lg-block"
                                                                         style="flex:0 0 20%">
                                                                        <i class="far fa-clock me-1"></i>
                                                                        <span
                                                                            class="me-2 f-500 f-14">{{ $webinar->getDuration() }}</span>
                                                                    </div>
                                                                    <div
                                                                        class="d-flex align-items-center mt-4 mt-md-0 justify-content-between"
                                                                        style="flex:0 0 10%">
                                                                        <p class="m-0 f-700 fs-16 text-primary pe-3">{{ $webinar->price->html() }}</p>


                                                                        <form class="dublicat_form" id="test123"
                                                                              method="POST"
                                                                              action="{{route('addToCart')}}">
                                                                            @csrf
                                                                            <input type="hidden"
                                                                                   value="{{ $webinar->id }}" name="id">
                                                                            <input type="hidden" value="webinar"
                                                                                   name="type">

                                                                            <a onclick="parentNode.submit()"
                                                                               style="z-index: 999"
                                                                               class="course-show-buy-btn-mobile position-absolute  mt-3  end-0 btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">
                                                                                {{ __("courses.by") }}
                                                                            </a>

                                                                        </form>

                                                                        {{--                                                                        <div--}}
                                                                        {{--                                                                            class="btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">--}}
                                                                        {{--                                                                            {{ __("courses.by") }}--}}
                                                                        {{--                                                                        </div>--}}


                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne-{{ $webinar->id }}"
                                                             class="accordion-collapse collapse @if($k == 0) show @endif"
                                                             aria-labelledby="flush-headingOne"
                                                             data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <div class="p-2 py-lg-3 px-lg-5">
                                                                    {!! $webinar->info->program !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div id="lectors" class="main4">
                <div class="container">
                    @if($course->getLectors()->count() == 1)
                        <div class="one-lector br-12 w-100 d-flex mb-3">
                            <div class="row">
                                <div class="col-lg-7 col-12 order-1 order-lg-0">
                                    <div class="txts me-0 me-xl-4">
                                        <h4 class="f-700 fs-32 lh-40 color-23 mt-4 mt-xl-0">{{ $course->getLectors()->first()->userInfo->fullName }}</h4>
                                        <p class="fs-16 f-500 lh-24 color-23">
                                            {{ $course->getLectors()->first()->directions->map(function ($d){
                                                return $d->direction->title;
                                            })->join(", ") }}
                                        </p>
                                        {!! $lector->lector->info->biography !!}
                                    </div>
                                </div>
                                <div class="col-lg-5 col-12 order-0 order-lg-1">
                                    <div class="image mt-2 br-12 w-100 h-100"
                                         style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }})">
                                    </div>
                                </div>
                            </div>


                        </div>
                    @else
                        <div class="many-lector">
                            <h3 class="fs-32 f-700 lh-40 color-23 mb-4">{{ __("courses.menu.lectors") }}</h3>
                            <div
                                class="lector-cards row">
                                @foreach($course->getLectors() as $lector)
                                    <div class="card1 col-12 col-lg-4">
                                        <a href="{{ route("lectors.show",$lector->id) }}"
                                           class="card br-12 mb-3 text-dark">
                                            <div class="row g-0">
                                                <div class="col-md-4">

                                                    <div class="image w-100"
                                                         style="height: 200px;background-image: url({{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }})">
                                                    </div>

                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body py-2 h-100">
                                                        <div class="d-flex flex-column justify-content-between h-100">
                                                            <div>
                                                                <h5 class="card-title f-700 fs-20 lh-24">{{ $lector->userInfo->fullName }}</h5>
                                                                <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">
                                                                    {{ $lector->directions->map(function ($d){
                                                                        return $d->direction->title;
                                                                    })->join(", ") }}
                                                                </p>
                                                            </div>
                                                            <div class="card-text d-flex align-items-center">
                                                                <svg width="16" height="15" viewBox="0 0 16 15"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M7.70186 0.237038C7.88954 0.143196 8.11046 0.143196 8.29814 0.237038L14.9648 3.57037C15.1907 3.6833 15.3333 3.91414 15.3333 4.16666C15.3333 4.41917 15.1907 4.65001 14.9648 4.76294L8.29814 8.09627C8.11046 8.19012 7.88954 8.19012 7.70186 8.09627L1.03519 4.76294C0.809333 4.65001 0.666665 4.41917 0.666665 4.16666C0.666665 3.91414 0.809333 3.6833 1.03519 3.57037L7.70186 0.237038ZM2.82404 4.16666L8 6.75463L13.176 4.16666L8 1.57868L2.82404 4.16666Z"
                                                                          fill="#232323"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M0.737047 10.5352C0.901707 10.2059 1.30216 10.0724 1.63147 10.237L8 13.4213L14.3685 10.237C14.6978 10.0724 15.0983 10.2059 15.2629 10.5352C15.4276 10.8645 15.2941 11.2649 14.9648 11.4296L8.29814 14.7629C8.11046 14.8568 7.88954 14.8568 7.70186 14.7629L1.03519 11.4296C0.70587 11.2649 0.572388 10.8645 0.737047 10.5352Z"
                                                                          fill="#232323"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                          d="M0.737047 7.20185C0.901707 6.87253 1.30216 6.73905 1.63147 6.9037L8 10.088L14.3685 6.9037C14.6978 6.73905 15.0983 6.87253 15.2629 7.20185C15.4276 7.53117 15.2941 7.93161 14.9648 8.09627L8.29814 11.4296C8.11046 11.5234 7.88954 11.5234 7.70186 11.4296L1.03519 8.09627C0.70587 7.93161 0.572388 7.53117 0.737047 7.20185Z"
                                                                          fill="#232323"/>
                                                                </svg>
                                                                <span
                                                                    class="ms-2">{{ $lector->webinars->count() }} {{ __("courses.lections") }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="container">
                <div id="registration" class="main5 br-12" style="background-color: #191F70;">
                    <div class="d-flex flex-column flex-lg-row justify-content-evenly">
                        <div class="main5-1 me-4">
                            <h3 class="text-white fw-bold mb-4 fs-24"
                                style="max-width: 370px;">{{ $course->info->title }}</h3>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">{{ __("courses.reg.title_1") }}</p>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">{{ __("courses.reg.title_2") }}</p>
                            @if($course->sale)
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span>{{ $course->sale->html() }}<i class="icon-usd"></i> </span>
                                    <sup
                                        class="fs-23 lh-23 fw-normal align-middle strikethrough">{{ $course->price->html() }}</sup>
                                </p>
                            @else
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span>{{ $course->price->html() }}</span>
                                </p>
                            @endif
                            <ul class="text-white ps-2 mb-4">
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.0") }}</li>
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.1") }}</li>
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.2") }}</li>
                            </ul>
                            <p class="text-white fw-normal fs-14 lh-23 mb-0"
                               style="max-width: 307px;">{{ __("courses.reg.short_info.3") }}</p>
                            <ul class="text-white ps-2 mb-5 mb-lg-0">
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.4") }}</li>
                            </ul>
                        </div>
                        <div class="main5-2">
                            <h3 class="text-white f-700 fs-32 lh-32">{{ __("courses.reg.form.title") }}</h3>
                            <livewire:front.reg-online-course-form/>
                        </div>
                    </div>

                </div>

                <div id="faq" class="main6">
                    <h3 class="f-700 mb-4 color-23">{{ __("courses.faq.title") }}</h3>
                    <div class="row">
                        {{--                        <div class="col-12 col-lg-6">--}}
                        {{--                            <div class="mb-1 courses-show-accordion-item">--}}
                        {{--                                <div class="bg-white br-12 p-3 collapse_text_color" data-bs-toggle="collapse"--}}
                        {{--                                     data-bs-target="#five">--}}
                        {{--                                    <div class="d-flex align-items-center">--}}
                        {{--                                        <i class="fal fa-minus d-none minus_icon"></i>--}}
                        {{--                                        <i class="far fa-plus plus_icon"></i>--}}

                        {{--                                        <p class="fs-16 m-0 f-700 ms-4 main_text">Как не ошибиться в выборе варианта--}}
                        {{--                                            подписки?</p>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="collapse show accordion-show" id="five">--}}
                        {{--                                        <div class="p-3">--}}
                        {{--                                        <span class="m-0">Самый простой способ - связаться с нашим--}}
                        {{--                                            менеджером и рассказать о--}}
                        {{--                                                <br class="d-none d-xxl-block">--}}
                        {{--                                            своих сомнениях. Менеджер поможет выбрать лучший тариф--}}
                        {{--                                            исходя из ваших пожеланий</span>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq1">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text">{{ __("courses.faq.faq1_question") }}</p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq1">
                                        <div class="p-3">
                                            <span class="m-0">{!! __("courses.faq.faq1_answer") !!}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq2">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text">{{ __("courses.faq.faq2_question") }}</p>
                                    </div>
                                    <div class="collapse accordion-show" id="faq2">
                                        <div class="p-3">
                                            <span class="m-0">{!! __("courses.faq.faq2_answer") !!}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq3">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text">{{ __("courses.faq.faq3_question") }}</p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq3">
                                        <div class="p-3">
                                            <span class="m-0">{!! __("courses.faq.faq3_answer") !!}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color collapsed" data-bs-toggle="collapse"
                                     data-bs-target="#faq4">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text">{{ __("courses.faq.faq4_question") }}</p>
                                    </div>
                                    <div class="collapse  accordion-show" id="faq4">
                                        <div class="p-3">
                                            <span class="m-0">{!! __("courses.faq.faq4_answer") !!}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="other-courses" class="main7">
                    <div class="d-flex justify-content-between">
                        <h3 class="f-700 mb-4">{{ __("courses.courses") }}</h3>
                        <div
                            class="slider_navigation videoPopularSwiper_nav  AdditionsSwiper_nav mb-4 d-none d-md-flex flex-row-reverse">
                        </div>
                    </div>
                    <div class="swiper AdditionsSwiper">
                        <div class="swiper-wrapper">
                            @foreach($courses as $course)
                                @if($course->info->enabled)
                                    <div class="swiper-slide">
                                        <a href="{{ route("course.show",$course->id) }}" style="color: inherit"
                                           class="d-block bg-white br-12">
                                            <img src="{{\Illuminate\Support\Facades\Storage::url($course->image)}}"
                                                 alt="addPic"
                                                 style="width: 386px; height: 214px; object-fit: cover">
                                            <div class="p-3">
                                                <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$course->directions->first()->title}}</p>
                                                <p class="f-700 fs-16 min-h-96">{{$course->info->title}}</p>
                                                <div class="mt-2 d-flex justify-content-between">
                                                    <div>
                                                        <i class="far fa-clock me-1"></i> <span
                                                            class="me-2 fs-14 f-500">{{$course->getDuration()}}</span>
                                                        <i class="fas fa-tasks me-1"></i> <span class="fs-14 f-500">{{$course->webinars_count}} видео</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                                    @if($course->getLectors()->count() == 1)
                                                        <div class="d-flex align-items-center">
                                                            <img class="rounded-circle border-white me-3 img_r_42"
                                                                 src="{{ \Illuminate\Support\Facades\Storage::url($course->getLectors()->first()->lector->photo) }}"
                                                                 alt="videoPic">
                                                            {{--                                                        <p class="m-0 f-500 fs-16">{{ $course->getLectors()->first()->userInfo->fullName }}</p>--}}
                                                        </div>
                                                    @else
                                                        <div>
                                                            @foreach($course->getLectors() as $k => $user)
                                                                <img
                                                                    src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image) }}"
                                                                    class="@if ($k>0) m-25 @endif me-1 rounded-circle img_r_42"
                                                                    alt="videoPic">
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <span class="price_box">

                                        @if($course->sale)
                                                            <span
                                                                class="f-700 text-primary fs-16 me-1">{{ $course->sale->html() }}</span>
                                                            <span
                                                                class="f-700 del text-secondary fs-16">{{$course->price->html()}}</span>
                                                        @else
                                                            <span
                                                                class="f-700 text-primary fs-16 me-1">{{ $course->price->html() }}</span>
                                                        @endif
                                    </span>
                                                </div>
                                                <form method="POST" action="{{route('addToCart')}}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $course->id }}" name="id">
                                                    <input type="hidden" value="course" name="type">
                                                    <button
                                                        class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __("courses.by_course") }}
                                                    </button>
                                                </form>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <x-contact-form></x-contact-form>

            </div>
        </div>


    </div>
@endsection
