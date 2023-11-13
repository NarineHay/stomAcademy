<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Stom Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css" href="/dist/font/font.css">
    <link rel="stylesheet" type="text/css" href="/dist/5.12.0/all.css">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="icon" href="/dist/image/aboutLogo.png">
    <link rel="stylesheet" href="/dist/icon-moon.css">
    <link rel="stylesheet" href="/dist_plyr/plyr.css">
    @vite(['resources/sass/lib.scss', 'resources/js/script.js'])
    @livewireStyles
</head>
<body >
{{--oncontextmenu="return false;"--}}
@if(\Illuminate\Support\Facades\Route::currentRouteName() == "home")
    <header class="position-relative headerBorder">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between flex-row-reverse flex-lg-row">
                @include('front.components.header_menu')
                <x-header-user></x-header-user>
            </div>
        </div>
    </header>

    <section class="section_top"
             style="background-image: url('/dist/image/headerBackground1.jpg'); background-size: cover;">
        <div class="bg">
            <div class="container d-flex justify-content-between align-items-center text-white">
                <div class="mt-6 d-flex justify-content-between align-items-center w-100 p-2 p-md-0">
                    <div class="d-flex flex-column header_text_block"
                         style="padding-top: 143px ;padding-bottom: 167px;">

                        <div>
                            <h1 class="mt-3 f-600 m-0 header_text">{!! __("header.h1") !!}</h1>
                            <p class="fs-18 f-500 m-0 pt-3 pb-4">{!! __("header.under_title") !!}</p>
                        </div>
                        <div class="d-block d-lg-none">
                            @if(!\Illuminate\Support\Facades\Auth::check())
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#header_login_modal">
                                    {{ __("header.form.title") }}
                                </button>
                            @endif
                        </div>
                    </div>
                    <div class="header-login">
                        @if(!\Illuminate\Support\Facades\Auth::check())
                            <div class="d-none d-lg-block  mt-4">
                                <livewire:front.home-login/>
                            </div>

                            <div class="modal fade" id="header_login_modal" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            <livewire:front.home-login/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@elseif(\Illuminate\Support\Facades\Route::currentRouteName() == "about")
    <header class="position-relative bg-primary ">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between  flex-row-reverse flex-lg-row">
                @include('front.components.header_menu')
                <x-header-user></x-header-user>
            </div>
        </div>
    </header>
    <section class="section_top"
             style="background-image: url('/dist/image/headerBackground1.jpg');background-repeat: no-repeat; background-size: cover;">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <div class="mt-6 w-100">
                <div class="d-flex mt-3 mt-lg-4">
                    <a href="{{route('home')}}"><span class="fs-12 f-500 text-white">{{ __("header.menu.home") }}</span></a>
                    <a><span class="fs-12 f-500 ms-3 text-white main">{{ __("header.menu.about") }}</span></a>
                </div>
                <div class="py-md-5 py-lg-6">
                    <h1 class="mt-3 f-600 m-0">{!! __("about.header.h1") !!}</h1>
                    <p class="fs-20 f-500 mt-2 m-0">{!! __("about.header.under_title") !!}</p>
                </div>
            </div>
        </div>
    </section>
@else
    <!-- <header class="position-fixed bg-primary w-100" style="z-index: 111">
                    <div class="container d-flex justify-content-between p-3 align-items-center">
                        <div>
                            <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            @include('front.components.header_menu')
        <x-header-user></x-header-user>
    </div>

</div>
</header> -->
    <header class="position-relative bg-primary ">
        <div class="container d-flex justify-content-between pt-lg-3 pt-2 p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            <div class="d-flex align-items-center justify-content-between  flex-row-reverse flex-lg-row">
                @include('front.components.header_menu')
                <x-header-user></x-header-user>
            </div>
        </div>
    </header>

@endif


@yield("content")

<!--Footer-->

<footer class="text-white bg-gray">
    <div class="container">
        <div class="row footer-border-bottom">
            <div class="col-12 col-lg-3 mt-5 mt-lg-6 mb-2 mb-md-3 fs-12">
                <a href="/"><img src="/dist/image/logo.png" alt="footerLogoPic"></a>
                <p class="mt-3 fs-12">
                    {!! __("index.full-address") !!}
                </p>
            </div>
            <div class="col-12 col-lg-4 mt-lg-6 mb-2 mb-md-4 fs-20 f-600 ft-menu-a-div">
                <a href="/"><p>{{ __("header.menu.home") }}</p></a>
                <a href="{{route('lectors.index')}}"><p>{{ __("header.menu.lectors") }}</p></a>
                <a href="{{route('about')}}"><p>{{ __("header.menu.about") }}</p></a>
                <a href="{{route('blog.index')}}"><p>{{ __("header.menu.blog") }}</p></a>
                <a href="{{route('contacts')}}"><p>{{ __("header.menu.contact") }}</p></a>
            </div>
            <div class="col-12 col-lg-5 mt-2 mt-lg-6 mb-4">
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="me-3 text-white">
                        <p class="opacity-50 fs-14 f-500">{{ __("courses.contacts.info.country.ru") }}</p>
                        <a href="tel:{{ __("courses.contacts.info.phone.ru") }}"><p class="fs-16 f-600">{{ __("courses.contacts.info.phone.ru") }}</p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500">{{ __("courses.contacts.info.country.ua") }}</p>
                        <a href="tel:{{ __("courses.contacts.info.phone.ua") }}"><p class="fs-16 f-600">{{ __("courses.contacts.info.phone.ua") }}</p></a>
                    </div>
                    <div class="ms-md-6 text-white">
                        <p class="opacity-50 fs-14 f-500">{{ __("courses.contacts.info.country.le") }}</p>
                        <a href="tel:{{ __("courses.contacts.info.phone.le") }}"><p class="fs-16 f-600">{{ __("courses.contacts.info.phone.le") }}</p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500">{{ __("courses.contacts.info.country.be") }}</p>
                        <a href="tel:{{ __("courses.contacts.info.phone.be") }}"><p class="fs-16 f-600">{{ __("courses.contacts.info.phone.be") }}
{{--                                <br class="d-block d-md-none">(Viber/WatsApp/Telegram)</p>--}}
                        </a>
                    </div>
                </div>
                <div class="mt-4 mt-lg-5 d-flex mb-0 mb-lg-4">
                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray icon-style ">
                        <a href="{{ __("courses.contacts.info_for_footer.soc.yt_link") }}" target="_blank"><i
                                class="fab fa-youtube text-white fs-16"></i></a>
                    </div>
{{--                    <div--}}
{{--                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">--}}
{{--                        <a href="https://t.me/stomacademy" target="_blank"><i--}}
{{--                                class="fab fa-telegram-plane text-white fs-16"></i></a>--}}
{{--                    </div>--}}
                    {!! __("courses.contacts.info_for_footer.soc.tg_icon") !!}
                    {!! __("courses.contacts.info_for_footer.soc.tw_icon") !!}
{{--                    <div--}}
{{--                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">--}}
{{--                        <a href="https://twitter.com/" target="_blank"><i--}}
{{--                                class="fab fa-twitter text-white fs-16"></i></a>--}}
{{--                    </div>--}}
                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="{{ __("courses.contacts.info_for_footer.soc.fb_link") }}" target="_blank"><i
                                class="fab fa-facebook-f text-white fs-16"></i></a>
                    </div>

                    <div
                        class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="{{ __("courses.contacts.info_for_footer.soc.insta_link") }}" target="_blank"><i
                                class="fab fa-instagram text-white fs-16"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div
            class="row d-flex flex-column-reverse flex-lg-row justify-content-between align-items-lg-center py-3">
            <div class="col-md-7">
                <div>
                    <p class="fs-12 f-500 m-0">{{ __("index.cp") }}</p>
                </div>
            </div>
            <div
                class="col-md-5 d-flex justify-content-between align-items-center mb-3 mb-md-0 flex-wrap flex-md-nowrap">
                <a href="#"><img src="/dist/image/pay1.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay2.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay3.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay4.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay5.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay6.png" alt="payPic"></a>
                <a href="#"><img src="/dist/image/pay7.png" alt="payPic"></a>
            </div>
        </div>
    </div>
</footer>

{{-- MODAL Lector --}}

<div class="modal fade" id="lectorModal" tabindex="-1" aria-labelledby="lectorModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <livewire:front.become-lector/>
    </div>
</div>

{{-- END MODAL  --}}


{{-- MODAL Lector Follow --}}

<div class="modal fade" id="lectorFollowModal" tabindex="-1" aria-labelledby="lectorFollowModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <livewire:front.follow/>
    </div>
</div>

{{-- END MODAL  --}}

<script src="/admin/plugins/jquery/jquery.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    if (document.querySelector('.summernote')) {
        $(function () {
            $('.summernote').summernote()
        })
    }
</script>
<script src="/dist_plyr/plyr.js"></script>
<script>

    // const players = Plyr.setup('.js-player');
    const player = new Plyr('#player'
            , {
            settings: ['quality','speed'],
            quality: { default: 240, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] },
        }
    );
    const player1 = new Plyr('#player1');
    const player2 = new Plyr('#player2');
    const player3 = new Plyr('#player3');
    const player4 = new Plyr('#player4');
</script>
@livewireScripts
</section>
</body>
</html>
