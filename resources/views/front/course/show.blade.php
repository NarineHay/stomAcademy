@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden ">
        <div class="courses-show-div">
            <div class="div-menu-2"
                 style="background-image: url({{ \Illuminate\Support\Facades\Storage::url($course->bg_image) }});">
                <div class="container">
                    <div class="menu">
                        <a href="#">{{ __("header.menu.home") }}</a>
                        <span>|</span>
                        <a href="#">{{ __("header.menu.courses") }}</a>
                    </div>
                </div>
            </div>

            <div class="main2">
                <div class="eng-doctors-txt">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-12">
                                <div class="about-course1">
                                    <h1 class="text-primary fw-bolder">{{ $course->info->title }}</h1>
                                    @if($course->webinars)
                                        <p>{{ $course->webinars->count() }} {{ __("courses.under_title") }}</p>
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
                                            <div class="txts1 d-xl-block d-none">
                                                <p class="txts-1-title">{{ __("courses.start") }}</p>
                                                <p>{{ \Illuminate\Support\Carbon::make($course->start_date)->toFormattedDateString() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txts1 d-xl-none d-flex flex-row mt-3 align-items-center">
                                        <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500">{{ __("courses.start") }}</p>
                                        <p class="mb-0 fs-14 lh-17 f-700">{{ \Illuminate\Support\Carbon::make($course->start_date)->toFormattedDateString() }}</p>
                                    </div>
                                </div>
                                <div class="about-course-txt d-xl-block d-none">
                                    <h2 class="f-700 fs-32 lh-40">{{ __("courses.desc_title") }}</h2>
                                    <p class="fs-16 lh-27 f-500 mb-0">
                                        {!! $course->info->description !!}
                                    </p>
                                </div>
                            </div>

                            <div class="col-xl-5 col-12">
                                <div class="card-div">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="img_video">
                                                <img src="/dist/image/video1.png" alt="img_video">
                                            </div>
                                            <div class="card-txts">
                                                <p class="fs-32 card-title-txt fw-bolder">{{ $course->info->title }}</p>
                                                <p class="m-0 text-secondary fs-14 f-500 card-price-txt">{{ __("courses.price_all") }}</p>
                                                <h3 class="f-700 mt-0 text-primary">
                                                    @if($course->sale)
                                                        <span>{{ $course->sale->rub }}</span>
                                                        <span>/</span>
                                                        <span
                                                            class="text-decoration-line-through">{{ $course->price->rub }}</span>
                                                    @else
                                                        <span>{{ $course->price->rub }}</span>
                                                    @endif
                                                </h3>
                                                <p class="f-500 fs-14 lh-17 mb-2">
                                                    @if($course->webinars)
                                                        {{ $course->webinars->count() }} {{ __("courses.under_title") }}
                                                        <span class="text-primary">1 {{ __("courses.free") }}</span></p>
                                                <p class="f-500 fs-14 lh-17 mb-3">{{ __("courses.dop") }}</p>
                                                @endif
                                            </div>

                                            <form action="#" class="course-card-form">
                                                @if($course->webinars)
                                                    <div
                                                        class="course-card-form-div d-flex justify-content-between flex-column flex-lg-row mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="mr-1 form-check-input">
                                                            <label class="form-check-label">1 {{ __("courses.free") }}</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="checkbox" checked=""
                                                                   class="mr-1 form-check-input">
                                                            <label class="form-check-label">{{ __("courses.all_course") }}
                                                                ({{ $course->sale->rub ?? $course->price->rub }}
                                                                )</label>
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="btn btn-outline-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                        {{ __("courses.select_webinar") }}
                                                    </button>
                                                @endif

                                                <button class="btn btn-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                    {{ __("courses.by_course") }}
                                                </button>
                                            </form>

                                            <div class="d-flex flex-row flex-wrap justify-content-between div-icons">
                                                <div>
                                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M10.4584 2.20833C7.58193 2.20833 5.25008 4.54018 5.25008 7.41667V8.45833L5.25008 15.75H2.12508C0.974488 15.75 0.041748 14.8173 0.041748 13.6667V9.5C0.041748 8.34941 0.974488 7.41667 2.12508 7.41667L3.16675 7.41667C3.16675 3.38959 6.43134 0.125 10.4584 0.125H12.5417C16.5688 0.125 19.8334 3.38959 19.8334 7.41667L20.8751 7.41667C22.0257 7.41667 22.9584 8.34941 22.9584 9.5V13.6667C22.9584 14.8173 22.0257 15.75 20.8751 15.75H19.7021C19.2396 17.5471 17.6082 18.875 15.6667 18.875H14.3464C13.9862 19.4977 13.3129 19.9167 12.5417 19.9167C11.3912 19.9167 10.4584 18.9839 10.4584 17.8333C10.4584 16.6827 11.3912 15.75 12.5417 15.75C13.3129 15.75 13.9862 16.169 14.3464 16.7917H15.6667C16.8173 16.7917 17.7501 15.8589 17.7501 14.7083V8.45833V7.41667C17.7501 4.54018 15.4182 2.20833 12.5417 2.20833H10.4584ZM3.16675 9.5H2.12508V13.6667H3.16675V9.5ZM10.4584 9.76042C10.4584 10.4795 9.87545 11.0625 9.15633 11.0625C8.43721 11.0625 7.85425 10.4795 7.85425 9.76042C7.85425 9.0413 8.43721 8.45833 9.15633 8.45833C9.87545 8.45833 10.4584 9.0413 10.4584 9.76042ZM13.8438 11.0625C14.563 11.0625 15.1459 10.4795 15.1459 9.76042C15.1459 9.0413 14.563 8.45833 13.8438 8.45833C13.1247 8.45833 12.5417 9.0413 12.5417 9.76042C12.5417 10.4795 13.1247 11.0625 13.8438 11.0625ZM19.8334 9.5H20.8751V13.6667H19.8334V9.5Z"
                                                              fill="#191F70"/>
                                                    </svg>
                                                    <span
                                                        class="ms-2 f-500 fs-16 lh-20">{{ $course->getLectors()->first()->userInfo->fullName }}</span>
                                                </div>
                                                <div>
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
                                                        class="ms-2 f-500 fs-16 lh-20">{{ $course->getDuration() }}</span>
                                                </div>
                                                <div>
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
                                                    <span class="ms-2 f-500 fs-16 lh-20">{{ __("courses.certificate") }}</span>
                                                </div>
                                                <div>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                              d="M2.49992 10C2.49992 5.8579 5.85778 2.50004 9.99992 2.50004C14.1421 2.50004 17.4999 5.8579 17.4999 10C17.4999 14.1422 14.1421 17.5 9.99992 17.5C5.85778 17.5 2.49992 14.1422 2.49992 10ZM9.99992 0.833374C4.93731 0.833374 0.833252 4.93743 0.833252 10C0.833252 15.0626 4.93731 19.1667 9.99992 19.1667C15.0625 19.1667 19.1666 15.0626 19.1666 10C19.1666 4.93743 15.0625 0.833374 9.99992 0.833374ZM8.7955 5.97333C8.53979 5.80286 8.211 5.78696 7.94004 5.93198C7.66907 6.07699 7.49992 6.35938 7.49992 6.66671V13.3334C7.49992 13.6407 7.66907 13.9231 7.94004 14.0681C8.211 14.2131 8.53979 14.1972 8.7955 14.0267L13.7955 10.6934C14.0273 10.5389 14.1666 10.2787 14.1666 10C14.1666 9.72141 14.0273 9.46122 13.7955 9.30667L8.7955 5.97333ZM11.8309 10L9.16658 11.7763V8.22381L11.8309 10Z"
                                                              fill="#191F70"/>
                                                    </svg>
                                                    <span class="ms-2 f-500 fs-16 lh-20">15 минут</span>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-7 col-12">
                                <div class="section-menu d-block d-xl-none mt-4">
                                    <ul class="pb-3">
                                        <li><a href="#about-course-txt" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.about") }}</a>
                                        </li>
                                        <li><a href="#course-program" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.program") }}</a>
                                        </li>
                                        <li><a href="#lectors" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.lectors") }}</a></li>
                                        <li><a href="#registration" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.register") }}</a>
                                        </li>
                                        <li><a href="#faq" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.faq") }}</a></li>
                                        <li><a href="#other-courses" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.other") }}</a>
                                        </li>
                                        <li><a href="#contacts" class="fs-14 lh-17 color-23 f-500">{{ __("courses.menu.contacts") }}</a></li>
                                    </ul>

                                </div>
                            </div>

                            <div class="col-xl-7 col-12">
                                <div id="about-course-txt" class="about-course-txt d-block d-xl-none mt-4">
                                    <h2 class="f-700 fs-32 lh-40">{{ __("courses.desc_title") }}</h2>
                                    <p class="fs-16 lh-27 f-500">
                                        {{ $course->description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            @if($course->webinars)
                <div id="course-program" class="main3">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-12">
                                <div class="mt-4 mt-lg-0">
                                    <h3 class="f-700 m-0 lh-40 pb-2">{{ __("courses.menu.program") }}</h3>
                                    <div class="mt-2">
                                        @foreach($course->webinars_object as $k => $webinar)
                                            <div class="accordion accordion-flush">
                                                <div class="accordion-item br-12">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne-{{ $webinar->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="flush-collapseOne">
                                                            <div
                                                                class="d-flex align-items-md-center flex-column flex-md-row justify-content-between w-100">
                                                                <div class="d-flex">
                                                                    <p class="fs-16 f-500 m-0 color-23">{{ $k + 1 }}</p>
                                                                    <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23 d-flex flex-wrap">{!! $webinar->directions->map(function ($d){ return $d->title; })->join(",<br>")  !!}</p>
                                                                </div>
                                                                <div class="d-flex align-items-center mt-3 mt-md-0">
                                                                    <img
                                                                        src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->lector->photo) }}"
                                                                        class="me-2 videoPic img_r_42 rounded-5"
                                                                        alt="videoPic">
                                                                    <p class="m-0 f-500 fs-14 color-23 lh-17">{{ $webinar->user->userInfo->fullName }}</p>
                                                                </div>
                                                                <div class="d-flex d-none d-lg-block">
                                                                    <i class="far fa-clock me-1"></i>
                                                                    <span
                                                                        class="me-2 f-500 f-14">{{ $webinar->getDuration() }}</span>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-center mt-4 mt-md-0 justify-content-between">
                                                                    <p class="m-0 f-700 fs-16 text-primary pe-3">{{ $webinar->sale->rub ?? $webinar->price->rub }}</p>
                                                                    <div
                                                                        class="btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">
                                                                        {{ __("courses.by") }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne-{{ $webinar->id }}"
                                                         class="accordion-collapse collapse"
                                                         aria-labelledby="flush-headingOne"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="p-2 py-lg-3 px-lg-5">
                                                                {!! $webinar->info->description !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
                        <div class="one-lector br-12 w-100 d-flex flex-column-reverse flex-xl-row mb-3">
                            <div class="txts me-0 me-xl-4">
                                <h4 class="f-700 fs-32 lh-40 color-23 mt-4 mt-xl-0">{{ $course->getLectors()->first()->fullName }}</h4>
                                <p class="fs-16 f-500 lh-24 color-23">
                                    {{ $course->getLectors()->first()->directions->map(function ($d){
                                        return $d->direction->title;
                                    })->join(", ") }}
                                </p>
                                {!! $lector->lector->info->biography !!}
                            </div>
                            <div class="image mt-2">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}" class="br-12" alt="doctor">
                            </div>
                        </div>
                    @else
                        <div class="many-lector">
                            <h3 class="fs-32 f-700 lh-40 color-23 mb-4">{{ __("courses.menu.lectors") }}</h3>
                            <div
                                class="lector-cards d-flex flex-wrap flex-lg-nowrap justify-content-lg-start justify-content-center align-items-center">
                                @foreach($course->getLectors() as $lector)
                                    <div class="card1 me-2">
                                        <a href="{{ route("lectors.show",$lector->id) }}" class="card br-12 mb-3 text-dark" style="max-width: 522px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <div style="height: 200px">
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}"
                                                             class="img-fluid rounded-start h-100"
                                                             alt="...">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title f-700 fs-20 lh-24">{{ $lector->userInfo->fullName }}</h5>
                                                        <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">
                                                            {{ $lector->directions->map(function ($d){
                                                                return $d->direction->title;
                                                            })->join(", ") }}
                                                        </p>
                                                        <div class="card-text d-flex align-items-center">
                                                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
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
                                                            <span class="ms-2">{{ $lector->webinars->count() }} {{ __("courses.menu.lections") }}</span></div>
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
                            <h3 class="text-white fw-bold mb-4" style="max-width: 370px;">{{ $course->info->title }}</h3>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">{{ __("courses.reg.title_1") }}</p>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">{{ __("courses.reg.title_2") }}</p>
                            @if($course->sale)
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span>{{ $course->sale->rub }}</span>
                                    <sup class="fs-23 lh-23 fw-normal align-middle strikethrough">{{ $course->price->rub }}</sup>
                                </p>
                            @else
                                <p class="fw-bold fs-43 lh-43 text-white">
                                    <span>{{ $course->price->rub }}</span>
                                </p>
                            @endif
                            <ul class="text-white ps-2 mb-4">
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.0") }}</li>
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.1") }}</li>
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.2") }}</li>
                            </ul>
                            <p class="text-white fw-normal fs-14 lh-23 mb-0" style="max-width: 307px;">{{ __("courses.reg.short_info.3") }}</p>
                            <ul class="text-white ps-2 mb-5 mb-lg-0">
                                <li class="fw-normal fs-14 lh-23">{{ __("courses.reg.short_info.4") }}</li>
                            </ul>
                        </div>
                        <div class="main5-2">
                            <h3 class="text-white f-700 fs-32 lh-32">{{ __("courses.reg.form.title") }}</h3>
                            <form action="#">
                                <label class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.name") }}</label>
                                <input type="text" class="form-control mb-3 " aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="{{ __("courses.reg.form.placeholder.name") }}">
                                <label class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.email") }}</label>
                                <input type="text" class="form-control mb-3 " aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="{{ __("courses.reg.form.placeholder.email") }}">
                                <label class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.phone") }}</label>
                                <input type="text" class="form-control mb-3 " aria-label="Sizing example input"
                                       aria-describedby="inputGroup-sizing-default" placeholder="{{ __("courses.reg.form.placeholder.phone") }}Ваш номер телефона">
                                <button
                                    class="btn btn-outline-primary w-100 fs-18 f-600 br-12 lh-23 text-white py-3 mt-3"
                                    style="background-color: #5CB0FF;">{{ __("courses.reg.form.button") }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

                <div id="faq" class="main6">
                    <h3 class="f-700 mb-4 color-23">{{ __("courses.faq.title") }}</h3>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-1 courses-show-accordion-item">
                                <div class="bg-white br-12 p-3 collapse_text_color" data-bs-toggle="collapse"
                                     data-bs-target="#five">
                                    <div class="d-flex align-items-center">
                                        <i class="fal fa-minus d-none minus_icon"></i>
                                        <i class="far fa-plus plus_icon"></i>

                                        <p class="fs-16 m-0 f-700 ms-4 main_text">Как не ошибиться в выборе варианта
                                            подписки?</p>
                                    </div>
                                    <div class="collapse show accordion-show" id="five">
                                        <div class="p-3">
                                        <span class="m-0">Самый простой способ - связаться с нашим
                                            менеджером и рассказать о
                                                <br class="d-none d-xxl-block">
                                            своих сомнениях. Менеджер поможет выбрать лучший тариф
                                            исходя из ваших пожеланий</span>
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
                        <div class="slider_navigatioin AdditionsSwiper_nav mb-4 d-none d-md-block">
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
                                                    <i class="fas fa-tasks me-1"></i> <span class="fs-14 f-500">{{$course->webinars_count}} видео</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2 mb-1 align-items-center">
                                                @if($course->getLectors()->count() == 1)
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle border-white me-3 img_r_42" src="{{ \Illuminate\Support\Facades\Storage::url($course->getLectors()->first()->lector->photo) }}" alt="videoPic">
                                                        <p class="m-0 f-500 fs-16">{{ $course->getLectors()->first()->userInfo->fullName }}</p>
                                                    </div>
                                                @else
                                                    <div>
                                                        @foreach($course->getLectors() as $k => $user)
                                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo ?? $user->userInfo->image) }}" class="@if ($k>0) m-25 @endif me-1 rounded-circle img_r_42" alt="videoPic">
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <span class="price_box">

                                        @if($course->sale)
                                                        <span class="f-700 text-primary fs-16 me-1">{{ $course->sale->rub }} ₽</span>
                                                        <del class="f-700 text-secondary fs-16">{{$course->price->rub}} ₽</del>
                                                    @else
                                                        <span class="f-700 text-primary fs-16 me-1">{{ $course->price->rub }} ₽</span>
                                                    @endif
                                    </span>
                                            </div>
                                            <form method="POST" action="{{route('addToCart')}}">
                                                @csrf
                                                <input type="hidden" value="{{ $course->id }}" name="id">
                                                <input type="hidden" value="course" name="type">
                                                <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __("courses.by_course") }}
                                                </button>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div id="contacts" class="main8 br-12 bg-white">
                    <div class="d-flex flex-column flex-xl-row justify-content-between">
                        <div class="main8-1 are_any_questions_div">
                            <h3 class="f-700 mb-3 lh-40 color-23">{{ __("courses.contacts.form.title") }}</h3>
                            <p class="f-500 lh-20 color-23">{{ __("courses.contacts.form.under_title") }}</p>
                            <form action="#" class="pe-lg-5 pe-0">
                                <div class="d-flex flex-wrap" style="column-gap: 40px;">
                                    <input type="text" class="form-control mb-2"
                                           aria-describedby="inputGroup-sizing-default" placeholder="{{ __("courses.contacts.form.name") }}">
                                    <input type="email" class="form-control mb-2"
                                           aria-describedby="inputGroup-sizing-default" placeholder="{{ __("courses.contacts.form.name") }}">
                                    <input type="text" class="form-control mb-2"
                                           aria-describedby="inputGroup-sizing-default"
                                           placeholder="{{ __("courses.contacts.form.phone") }}">
                                    <input type="text" class="form-control mb-2"
                                           aria-describedby="inputGroup-sizing-default"
                                           placeholder="{{ __("courses.contacts.form.q") }}">
                                </div>
                                <button
                                    class="btn btn-primary d-flex mx-auto justify-content-center align-content-center w-100 fs-18 f-600 br-12 mb-5 py-3 lh-22 mt-5"
                                    style="max-width: 737px;">{{ __("courses.contacts.form.button") }}
                                </button>

                            </form>
                        </div>
                        <div class="main8-2 contacts-main-div mt-lg-0 mt-4">
                            <h3 class="f-700 mb-3 lh-40 color-23">{{ __("courses.contacts.info.title") }}</h3>
                            <p class="f-500 fs-16 lh-27 color-23 mb-4" style="max-width: 647px;">{{ __("courses.contacts.info.under_title") }}</p>
                            <div class="contacts d-flex flex-wrap">
                                <div class="contact1 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2">{{ __("courses.contacts.info.country.ru") }}</p>
                                    <a href="tel:+79584088828" class="color-23 f-600 fs-16 lh-20">{{ __("courses.contacts.info.phone.ru") }}</a>
                                </div>
                                <div class="contact2 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2">{{ __("courses.contacts.info.country.ua") }}</p>
                                    <a href="tel:+380443793165" class="color-23 f-600 fs-16 lh-20">{{ __("courses.contacts.info.phone.ua") }}</a>
                                </div>
                                <div class="contact3 mt-4 d-flex flex-row justify-content-between">
                                    <div>
                                        <p class="fs-14 f-500 lh-17 color-47 mb-2">{{ __("courses.contacts.info.country.be") }}</p>
                                        <a href="tel:+375447755420" class="color-23 f-600 fs-16 lh-20 me-2">
                                            <p style="max-width: 210px; width: 100%">{{ __("courses.contacts.info.phone.be") }}</p>
                                        </a>
                                    </div>
                                    <div class="icons pt-4 gap-2">
                                        <a href="https://www.whatsapp.com/" class="wp me-2">
                                            <svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5031 0.15625H12.4969C5.60469 0.15625 0 5.7625 0 12.6562C0 15.3906 0.88125 17.925 2.37969 19.9828L0.821875 24.6266L5.62656 23.0906C7.60313 24.4 9.96094 25.1562 12.5031 25.1562C19.3953 25.1562 25 19.5484 25 12.6562C25 5.76406 19.3953 0.15625 12.5031 0.15625Z"
                                                    fill="#4CAF50"/>
                                                <path
                                                    d="M19.7766 17.8078C19.475 18.6594 18.2782 19.3656 17.3235 19.5719C16.6704 19.7109 15.8172 19.8219 12.9454 18.6312C9.27192 17.1094 6.9063 13.3765 6.72192 13.1344C6.54536 12.8922 5.23755 11.1578 5.23755 9.36404C5.23755 7.57029 6.14849 6.69685 6.51567 6.32185C6.81724 6.01404 7.31567 5.87341 7.7938 5.87341C7.94849 5.87341 8.08755 5.88123 8.21255 5.88748C8.57974 5.9031 8.76411 5.92498 9.0063 6.50466C9.30786 7.23123 10.0422 9.02498 10.1297 9.20935C10.2188 9.39373 10.3079 9.64373 10.1829 9.88591C10.0657 10.1359 9.96255 10.2469 9.77817 10.4594C9.5938 10.6719 9.4188 10.8344 9.23442 11.0625C9.06567 11.2609 8.87505 11.4734 9.08755 11.8406C9.30005 12.2 10.0344 13.3984 11.1157 14.3609C12.511 15.6031 13.6422 16 14.0469 16.1687C14.3485 16.2937 14.7079 16.264 14.9282 16.0297C15.2079 15.7281 15.5532 15.2281 15.9047 14.7359C16.1547 14.3828 16.4704 14.339 16.8016 14.464C17.1391 14.5812 18.925 15.464 19.2922 15.6468C19.6594 15.8312 19.9016 15.9187 19.9907 16.0734C20.0782 16.2281 20.0782 16.9547 19.7766 17.8078Z"
                                                    fill="#FAFAFA"/>
                                            </svg>
                                        </a>
                                        <a href="https://www.viber.com/en/" class="viber me-2">
                                            <svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5 25.1562C19.4036 25.1562 25 19.5598 25 12.6562C25 5.75269 19.4036 0.15625 12.5 0.15625C5.59644 0.15625 0 5.75269 0 12.6562C0 19.5598 5.59644 25.1562 12.5 25.1562Z"
                                                    fill="#6F3FAA"/>
                                                <path
                                                    d="M17.9229 7.01386C14.8803 6.279 11.8323 5.41943 8.71212 6.51152C6.6919 7.26909 6.6919 9.45766 6.77608 11.3095C6.77608 11.8145 6.18687 12.488 6.43936 13.0772C6.94439 14.7607 7.36529 16.4442 9.13297 17.2859C9.38551 17.4543 9.13297 17.791 9.30133 18.0435C9.21715 18.0435 9.04879 18.1277 9.04879 18.2119C9.04879 18.6153 9.22984 19.2325 9.10958 19.6303L14.481 24.9995C20.0029 24.1201 24.3188 19.625 24.926 14.017L17.9229 7.01386Z"
                                                    fill="#6F3FAA"/>
                                                <path
                                                    d="M19.1127 8.94155L19.1086 8.92505C18.7746 7.5748 17.2688 6.12598 15.886 5.82456L15.8705 5.82134C13.6338 5.39468 11.366 5.39468 9.12988 5.82134L9.11382 5.82456C7.73149 6.12598 6.22568 7.5749 5.89126 8.92505L5.88755 8.94155C5.47466 10.8271 5.47466 12.7395 5.88755 14.625L5.89126 14.6416C6.21147 15.9341 7.60508 17.3165 8.93628 17.6966V19.2038C8.93628 19.7494 9.60107 20.0173 9.9791 19.6236L11.5062 18.0362C11.8375 18.0547 12.1688 18.0651 12.5001 18.0651C13.626 18.0651 14.7523 17.9586 15.8704 17.7453L15.886 17.7421C17.2688 17.4407 18.7746 15.9917 19.1085 14.6416L19.1126 14.6251C19.5255 12.7395 19.5255 10.8272 19.1127 8.94155ZM17.9042 14.3517C17.6812 15.2326 16.5379 16.3277 15.6295 16.53C14.4403 16.7562 13.2416 16.8528 12.0441 16.8197C12.0203 16.819 11.9974 16.8283 11.9809 16.8454C11.8109 17.0198 10.8659 17.99 10.8659 17.99L9.67993 19.2072C9.59321 19.2976 9.44087 19.236 9.44087 19.1113V16.6144C9.44087 16.5731 9.41143 16.5381 9.3709 16.5301C9.37065 16.53 9.37046 16.53 9.37022 16.53C8.46182 16.3276 7.31895 15.2325 7.09556 14.3516C6.72393 12.6472 6.72393 10.9194 7.09556 9.21499C7.31895 8.33408 8.46182 7.23896 9.37022 7.03662C11.4472 6.6416 13.553 6.6416 15.6295 7.03662C16.5384 7.23896 17.6812 8.33408 17.9042 9.21499C18.2762 10.9194 18.2762 12.6473 17.9042 14.3517Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.4761 15.5042C14.3364 15.4617 14.2034 15.4333 14.0797 15.382C12.7989 14.8507 11.6202 14.1651 10.6865 13.1143C10.1556 12.5167 9.73999 11.8421 9.38872 11.1281C9.22212 10.7895 9.08174 10.4377 8.93862 10.0881C8.80815 9.76935 9.00034 9.44006 9.20268 9.19982C9.39258 8.97438 9.63696 8.80192 9.90161 8.67472C10.1082 8.57551 10.3119 8.63273 10.4627 8.80778C10.7888 9.1863 11.0884 9.58415 11.3309 10.0229C11.4801 10.2928 11.4392 10.6227 11.1688 10.8063C11.1031 10.8509 11.0432 10.9034 10.982 10.9538C10.9283 10.998 10.8778 11.0426 10.841 11.1024C10.7738 11.2118 10.7706 11.341 10.8138 11.46C11.1472 12.376 11.709 13.0884 12.6312 13.4722C12.7787 13.5336 12.9269 13.605 13.0969 13.5852C13.3815 13.552 13.4737 13.2397 13.6732 13.0765C13.8682 12.9171 14.1174 12.915 14.3274 13.0479C14.5375 13.1809 14.7412 13.3236 14.9436 13.4679C15.1423 13.6095 15.3401 13.7479 15.5234 13.9094C15.6997 14.0646 15.7604 14.2682 15.6611 14.4788C15.4794 14.8646 15.215 15.1855 14.8337 15.3903C14.7261 15.4481 14.5975 15.4668 14.4761 15.5042C14.5975 15.4668 14.3364 15.4617 14.4761 15.5042Z"
                                                    fill="white"/>
                                                <path
                                                    d="M12.5036 8.23369C14.1788 8.28067 15.5548 9.39243 15.8497 11.0487C15.9 11.3309 15.9178 11.6194 15.9402 11.9059C15.9496 12.0263 15.8814 12.1408 15.7514 12.1424C15.6171 12.144 15.5567 12.0316 15.5479 11.9112C15.5307 11.6729 15.5187 11.4334 15.4858 11.197C15.3125 9.94903 14.3173 8.91656 13.0752 8.69502C12.8882 8.66167 12.697 8.65293 12.5076 8.63306C12.3879 8.62051 12.2312 8.61328 12.2046 8.46446C12.1824 8.3397 12.2877 8.24038 12.4065 8.23399C12.4387 8.23208 12.4711 8.2336 12.5036 8.23369C12.4711 8.2336 14.1789 8.28067 12.5036 8.23369Z"
                                                    fill="white"/>
                                                <path
                                                    d="M15.0495 11.5341C15.0467 11.5551 15.0453 11.6042 15.033 11.6505C14.9886 11.8187 14.7335 11.8397 14.6749 11.6701C14.6574 11.6197 14.6548 11.5624 14.6547 11.5082C14.6542 11.1534 14.5771 10.7989 14.3981 10.4902C14.2142 10.1728 13.9331 9.90619 13.6036 9.74471C13.4043 9.64716 13.1888 9.58646 12.9703 9.55038C12.8749 9.53456 12.7784 9.52504 12.6824 9.51166C12.5662 9.4955 12.5041 9.42142 12.5096 9.30687C12.5147 9.19955 12.5932 9.12225 12.7102 9.12894C13.0946 9.15072 13.466 9.23392 13.8079 9.41488C14.5029 9.783 14.9 10.364 15.0159 11.1398C15.0211 11.175 15.0295 11.2098 15.0322 11.245C15.0387 11.332 15.0429 11.4192 15.0495 11.5341C15.0429 11.4192 15.0467 11.555 15.0495 11.5341Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.0075 11.4935C13.8674 11.496 13.7924 11.4184 13.7779 11.2899C13.7679 11.2004 13.7599 11.1096 13.7385 11.0224C13.6964 10.8506 13.6051 10.6915 13.4607 10.5863C13.3925 10.5367 13.3152 10.5005 13.2343 10.477C13.1315 10.4473 13.0247 10.4555 12.9222 10.4304C12.8108 10.4031 12.7492 10.3129 12.7667 10.2084C12.7827 10.1133 12.8751 10.0391 12.9791 10.0467C13.6286 10.0935 14.0928 10.4293 14.1591 11.194C14.1638 11.2479 14.1693 11.3049 14.1573 11.3566C14.1367 11.4449 14.0713 11.4892 14.0075 11.4935C14.0713 11.4892 13.8673 11.4959 14.0075 11.4935Z"
                                                    fill="white"/>
                                                <path
                                                    d="M19.1126 8.9416L19.1085 8.9251C18.9213 8.16821 18.3658 7.38042 17.6702 6.78101L16.7298 7.6144C17.289 8.05996 17.7681 8.6772 17.9042 9.21499C18.2763 10.9194 18.2763 12.6472 17.9042 14.3517C17.6812 15.2326 16.5379 16.3277 15.6295 16.5301C14.4403 16.7562 13.2417 16.8529 12.0442 16.8197C12.0204 16.819 11.9975 16.8283 11.9809 16.8454C11.8109 17.0198 10.8659 17.99 10.8659 17.99L9.67998 19.2072C9.59326 19.2977 9.44092 19.2362 9.44092 19.1113V16.6145C9.44092 16.5732 9.41147 16.5382 9.37095 16.5302C9.3707 16.5302 9.37051 16.5301 9.37026 16.5301C8.854 16.4151 8.26226 16.0116 7.8064 15.5232L6.8772 16.3466C7.45752 16.9779 8.20601 17.4882 8.93618 17.6967V19.204C8.93618 19.7495 9.60098 20.0174 9.979 19.6237L11.5061 18.0364C11.8374 18.0549 12.1687 18.0652 12.5 18.0652C13.6259 18.0652 14.7522 17.9587 15.8703 17.7455L15.8859 17.7423C17.2687 17.4409 18.7745 15.992 19.1084 14.6418L19.1125 14.6253C19.5255 12.7395 19.5255 10.8273 19.1126 8.9416Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.476 15.5042C14.3364 15.4618 14.5974 15.4668 14.476 15.5042Z"
                                                    fill="white"/>
                                                <path
                                                    d="M15.5235 13.9093C15.3402 13.7479 15.1423 13.6094 14.9437 13.4678C14.7413 13.3235 14.5376 13.1809 14.3275 13.0479C14.1175 12.9149 13.8684 12.917 13.6733 13.0765C13.4738 13.2396 13.3817 13.5519 13.097 13.5852C12.927 13.6049 12.7788 13.5334 12.6312 13.4721C12.0639 13.2361 11.6334 12.8751 11.3081 12.4194L10.6167 13.0322C10.6402 13.0594 10.6626 13.0874 10.6865 13.1142C11.6202 14.165 12.7989 14.8506 14.0796 15.382C14.2032 15.4333 14.3364 15.4618 14.476 15.5041C14.5975 15.4667 14.3364 15.4617 14.476 15.5041C14.5975 15.4667 14.726 15.4479 14.8338 15.3902C15.2152 15.1854 15.4795 14.8645 15.6611 14.4787C15.7604 14.2682 15.6998 14.0646 15.5235 13.9093Z"
                                                    fill="white"/>
                                                <path
                                                    d="M12.5077 8.23383C12.5063 8.23383 12.5049 8.23368 12.5035 8.23368C12.5021 8.23358 12.5039 8.23368 12.5077 8.23383Z"
                                                    fill="white"/>
                                                <path
                                                    d="M12.5034 8.23364C12.5048 8.23364 12.5062 8.23379 12.5076 8.23379C12.6006 8.23711 14.1127 8.27876 12.5034 8.23364Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.9065 9.23035L14.6117 9.49163C15.0749 9.94231 15.3944 10.5396 15.4857 11.1969C15.5185 11.4334 15.5305 11.6728 15.5478 11.9112C15.5565 12.0316 15.6169 12.144 15.7512 12.1424C15.8813 12.1408 15.9495 12.0264 15.9401 11.9059C15.9177 11.6195 15.8998 11.3309 15.8496 11.0487C15.7205 10.3237 15.3843 9.70305 14.9065 9.23035Z"
                                                    fill="white"/>
                                                <path
                                                    d="M15.0156 11.1396C14.9312 10.5743 14.6967 10.1129 14.3071 9.76147L14.0132 10.022C14.1652 10.1569 14.2967 10.3153 14.3979 10.4901C14.5769 10.7988 14.654 11.1533 14.6546 11.5081C14.6547 11.5623 14.6573 11.6196 14.6747 11.6701C14.7334 11.8398 14.9884 11.8188 15.0329 11.6505C15.0452 11.6042 15.0466 11.555 15.0494 11.5341C15.0426 11.4192 15.0466 11.5551 15.0494 11.5341C15.0426 11.4192 15.0385 11.332 15.0319 11.2449C15.0293 11.2095 15.0209 11.1748 15.0156 11.1396Z"
                                                    fill="white"/>
                                                <path
                                                    d="M15.0494 11.5342C15.0467 11.555 15.0428 11.4192 15.0494 11.5342Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.0074 11.4936C14.0096 11.4934 14.0117 11.4923 14.0138 11.4921C14.0079 11.4921 13.9988 11.4922 13.9895 11.4926C13.9956 11.4927 14.0011 11.4936 14.0074 11.4936Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.0075 11.4936C14.0012 11.4937 13.9956 11.4927 13.9895 11.4926C13.9592 11.4934 13.9279 11.495 14.0075 11.4936Z"
                                                    fill="white"/>
                                                <path
                                                    d="M14.0138 11.4921C14.0116 11.4923 14.0095 11.4934 14.0074 11.4936C14.0239 11.4925 14.0224 11.4921 14.0138 11.4921Z"
                                                    fill="white"/>
                                                <path
                                                    d="M13.7116 10.2893L13.4124 10.5545C13.4289 10.5646 13.445 10.575 13.4607 10.5864C13.6051 10.6916 13.6964 10.8507 13.7385 11.0224C13.7599 11.1096 13.7678 11.2003 13.7779 11.29C13.7917 11.4127 13.8614 11.4881 13.9896 11.4925C13.9989 11.4923 14.0081 11.4921 14.0139 11.492C14.0756 11.4852 14.1375 11.4419 14.1573 11.3566C14.1692 11.305 14.1638 11.2479 14.159 11.1939C14.1218 10.7665 13.9602 10.4731 13.7116 10.2893Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="https://web.telegram.org/z/" class="telegram me-2">
                                            <svg width="25" height="26" viewBox="0 0 25 26" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5 25.1562C19.4036 25.1562 25 19.5598 25 12.6562C25 5.75269 19.4036 0.15625 12.5 0.15625C5.59644 0.15625 0 5.75269 0 12.6562C0 19.5598 5.59644 25.1562 12.5 25.1562Z"
                                                    fill="#039BE5"/>
                                                <path
                                                    d="M5.7197 12.3854L17.7718 7.73851C18.3312 7.53643 18.8197 7.87497 18.6384 8.72081L18.6395 8.71976L16.5874 18.3875C16.4353 19.0729 16.028 19.2396 15.4582 18.9166L12.3332 16.6135L10.8259 18.0656C10.6593 18.2323 10.5187 18.3729 10.1957 18.3729L10.4176 15.1927L16.2093 9.96039C16.4614 9.73851 16.153 9.61351 15.8207 9.83435L8.66345 14.3406L5.57803 13.3781C4.90824 13.1656 4.89366 12.7083 5.7197 12.3854Z"
                                                    fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap ">
                                <div class="contact4 me-4 mb-3">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2">{{ __("courses.contacts.info.country.le") }}</p>
                                    <a href="tel:+37052080969" class="color-23 f-600 fs-16 lh-20">{{ __("courses.contacts.info.phone.le") }}</a>
                                </div>
                                <div class="contact5 me-4">
                                    <p class="fs-14 f-500 lh-17 color-47 mb-2">E-mail</p>
                                    <a href="mailto:info@stom-academy.com" class="color-23 f-600 fs-16 lh-20">info@stom-academy.com</a>
                                </div>
                            </div>
                            <h3 class="color-23 f-700 lh-40 mb-4">{{ __("courses.contacts.info.soc") }}</h3>
                            <div class="social-icons">
                                <a href="https://www.facebook.com/" class="facebook me-2">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="Facebook">
                                            <g id="Facebook_2">
                                                <rect id="Rectangle" width="30" height="30" rx="15" fill="#4267B2"/>
                                                <path id="Vector"
                                                      d="M16.0016 24.9999V15.8769H19.0638L19.5223 12.3216H16.0016V10.0516C16.0016 9.02223 16.2875 8.32068 17.7637 8.32068L19.6464 8.31981V5.13994C19.3206 5.09677 18.2031 5 16.903 5C14.1885 5 12.3302 6.65682 12.3302 9.69964V12.3217H9.26001V15.877H12.3301V25L16.0016 24.9999Z"
                                                      fill="white"/>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/" class="instagram me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                         viewBox="0 0 333333 333333" shape-rendering="geometricPrecision"
                                         text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                         fill-rule="evenodd" clip-rule="evenodd">
                                        <defs>
                                            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="250181"
                                                            y1="308196" x2="83152.4" y2="25137">
                                                <stop offset="0" stop-color="#f58529"/>
                                                <stop offset=".169" stop-color="#feda77"/>
                                                <stop offset=".478" stop-color="#dd2a7b"/>
                                                <stop offset=".78" stop-color="#8134af"/>
                                                <stop offset="1" stop-color="#515bd4"/>
                                            </linearGradient>
                                        </defs>
                                        <path
                                            d="M166667 0c92048 0 166667 74619 166667 166667s-74619 166667-166667 166667S0 258715 0 166667 74619 0 166667 0zm-40642 71361h81288c30526 0 55489 24654 55489 54772v81069c0 30125-24963 54771-55488 54771l-81289-1c-30526 0-55492-24646-55492-54771v-81069c0-30117 24966-54771 55492-54771zm40125 43843c29663 0 53734 24072 53734 53735 0 29667-24071 53735-53734 53735-29672 0-53739-24068-53739-53735 0-29663 24068-53735 53739-53735zm0 18150c19643 0 35586 15939 35586 35585 0 19647-15943 35589-35586 35589-19650 0-35590-15943-35590-35589s15940-35585 35590-35585zm51986-25598c4819 0 8726 3907 8726 8721 0 4819-3907 8726-8726 8726-4815 0-8721-3907-8721-8726 0-4815 3907-8721 8721-8721zm-85468-20825h68009c25537 0 46422 20782 46422 46178v68350c0 25395-20885 46174-46422 46174l-68009 1c-25537 0-46426-20778-46426-46174v-68352c0-25395 20889-46177 46426-46177z"
                                            fill="url(#a)"/>
                                    </svg>
                                </a>
                                <a href="https://web.telegram.org/z/" class="telegram me-2">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="30" height="30" rx="15" fill="#179EE0"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.53084 14.0732C12.556 12.1915 15.2401 10.951 16.5831 10.3517C20.4176 8.64047 21.2144 8.34319 21.7337 8.33335C21.8479 8.33121 22.1033 8.3616 22.2687 8.50564C22.5141 8.71929 22.5155 9.18307 22.4883 9.49001C22.2805 11.8326 21.3814 17.5174 20.9239 20.1411C20.7304 21.2513 20.3493 21.6236 19.9803 21.66C19.1785 21.7391 18.5696 21.0914 17.793 20.5452C16.5778 19.6905 15.8913 19.1584 14.7116 18.3244C13.3484 17.3605 14.2321 16.8308 15.009 15.965C15.2124 15.7384 18.7452 12.2905 18.8136 11.9777C18.8222 11.9386 18.8301 11.7928 18.7494 11.7158C18.6686 11.6389 18.5495 11.6651 18.4635 11.6861C18.3416 11.7158 16.4002 13.0926 12.6394 15.8164C12.0883 16.2224 11.5892 16.4202 11.142 16.4099C10.649 16.3985 9.70071 16.1108 8.99572 15.8649C8.13102 15.5633 7.44377 15.4038 7.50364 14.8917C7.53481 14.6248 7.8772 14.352 8.53084 14.0732V14.0732Z"
                                              fill="white"/>
                                    </svg>
                                </a>
                                <a href="https://vk.com/" class="wk me-2">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="30" height="30" rx="15" fill="#1976D2"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.9064 9.71362H7.0955C6.5781 9.71362 6.47461 9.95109 6.47461 10.2129C6.47461 10.6805 7.08855 12.9996 9.33321 16.0668C10.8297 18.1615 12.938 19.297 14.8565 19.297C16.0076 19.297 16.1501 19.0448 16.1501 18.6104V17.0272C16.1501 16.5228 16.2591 16.4222 16.6236 16.4222C16.8922 16.4222 17.3526 16.5531 18.427 17.563C19.6549 18.76 19.8573 19.297 20.5479 19.297H22.3588C22.8763 19.297 23.135 19.0448 22.9857 18.5471C22.8224 18.0511 22.2362 17.3314 21.4583 16.4783C21.0362 15.992 20.4031 15.4684 20.2112 15.2065C19.9427 14.8699 20.0194 14.7202 20.2112 14.421C20.2112 14.421 22.4175 11.3912 22.6478 10.3626C22.7629 9.98846 22.6478 9.71362 22.1001 9.71362H20.2892C19.8288 9.71362 19.6165 9.95109 19.5014 10.2129C19.5014 10.2129 18.5805 12.4011 17.2759 13.8225C16.8538 14.2339 16.662 14.3649 16.4317 14.3649C16.3166 14.3649 16.15 14.2339 16.15 13.8599V10.3626C16.15 9.91366 16.0164 9.71362 15.6326 9.71362H12.7869C12.4992 9.71362 12.3261 9.92193 12.3261 10.1194C12.3261 10.5449 12.9784 10.6431 13.0456 11.84V14.4397C13.0456 15.0097 12.94 15.113 12.7098 15.113C12.0959 15.113 10.6026 12.915 9.71688 10.3999C9.54333 9.91109 9.36922 9.71362 8.9064 9.71362V9.71362Z"
                                              fill="white"/>
                                    </svg>
                                </a>
                                <a href="https://www.youtube.com/" class="youtube me-2">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <rect width="30" height="30" rx="15" fill="#FF0100"/>
                                        <g clip-path="url(#clip0_514_498)">
                                            <path
                                                d="M22.449 10.4801C22.0073 9.69427 21.5279 9.54973 20.5518 9.49477C19.5766 9.42861 17.1246 9.40112 15.0004 9.40112C12.872 9.40112 10.419 9.42861 9.4449 9.49375C8.47081 9.54973 7.99038 9.69325 7.54456 10.4801C7.08958 11.2648 6.85547 12.6165 6.85547 14.9963C6.85547 14.9983 6.85547 14.9993 6.85547 14.9993C6.85547 15.0014 6.85547 15.0024 6.85547 15.0024V15.0044C6.85547 17.374 7.08958 18.7359 7.54456 19.5125C7.99038 20.2983 8.46979 20.4408 9.44388 20.507C10.419 20.564 12.872 20.5976 15.0004 20.5976C17.1246 20.5976 19.5766 20.564 20.5528 20.508C21.5289 20.4418 22.0083 20.2993 22.4501 19.5135C22.9091 18.7369 23.1412 17.375 23.1412 15.0054C23.1412 15.0054 23.1412 15.0024 23.1412 15.0004C23.1412 15.0004 23.1412 14.9983 23.1412 14.9973C23.1412 12.6165 22.9091 11.2648 22.449 10.4801ZM12.9626 18.0529V11.9458L18.0519 14.9993L12.9626 18.0529Z"
                                                fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_514_498">
                                                <rect width="16.2857" height="16.2857" fill="white"
                                                      transform="translate(6.85547 6.85718)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
