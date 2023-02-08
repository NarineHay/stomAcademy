<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Stom Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/dist/font/font.css">
    <link rel="stylesheet" type="text/css" href="/dist/5.12.0/all.css">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" href="/dist/image/aboutLogo.png">
    @vite(['resources/sass/lib.scss', 'resources/js/script.js'])
    @livewireStyles
</head>
<body>
@if(\Illuminate\Support\Facades\Route::currentRouteName() == "home")
    <header class="position-relative headerBorder">
        <div class="container d-flex justify-content-between p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            @include('front.components.header_menu')
            <x-header-user></x-header-user>
        </div>
    </header>
    <section class="section_top" style="background-image: url('/dist/image/headerBackground1.jpg'); background-size: cover">
        <div class="bg">
            <div class="container d-flex justify-content-between align-items-center text-white">
                <div class="mt-6 d-flex justify-content-between align-items-center w-100 p-2 p-md-0">
                    <div class="d-flex flex-column">
                        <div>
                            <h1 class="mt-3 f-600 m-0 header_text">Stom academy<br>
                                dental education</h1>
                            <p class="fs-18 f-500 m-0 pt-3 pb-4">stom-academy — это сервис обучения врачей-стоматологов, который <br class="d-none d-lg-block">проводит
                                вебинары, семинары,
                                практические курсы конгрессы.</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn d-flex d-lg-none text-white border-white  br-12 bg-transparent fs-14 f-500" style="padding: 10px 50px">Войти</button>
                            <button class="btn btn-primary d-flex d-lg-none text-white border-white br-12 border-0 fs-14 f-500" style="padding: 10px 27px">Регистрация</button>
                        </div>
                    </div>
                    <livewire:front.home-login />
                </div>
            </div>
        </div>
    </section>
@elseif(\Illuminate\Support\Facades\Route::currentRouteName() == "about")
    <header class="position-relative bg-primary ">
        <div class="container d-flex justify-content-between p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            @include('front.components.header_menu')
            <x-header-user></x-header-user>
        </div>
    </header>
    <section class="section_top" style="background-image: url('/dist/image/headerBackground1.jpg');background-repeat: no-repeat; background-size: cover;">
        <div class="container d-flex justify-content-between align-items-center text-white">
            <div class="mt-6 w-100">
                <div class="d-flex mt-3 mt-lg-4">
                    <a><span class="fs-12 f-500 text-white">Главная</span></a>
                    <a><span class="fs-12 f-500 ms-3 text-white main">О нас</span></a>
                </div>
                <div class="py-md-5 py-lg-6">
                    <h1 class="mt-3 f-600 m-0">STOM-ACADEMY - Cервис <br class="d-none d-sm-block">обучения врачей-стоматологов.</h1>
                    <p class="fs-20 f-500 mt-2 m-0">Никаких ограничений по опыту и специальности. Огромный<br class="d-none d-sm-block">
                        выбор лекторов и тем. Online-обучение, практический курс,<br class="d-none d-sm-block"> семинары или конгрессы – выбор за вами.</p>
                </div>
            </div>
        </div>
    </section>`
@else
    <header class="position-fixed bg-primary w-100" style="z-index: 111">
        <div class="container d-flex justify-content-between p-3 align-items-center">
            <div>
                <a href="/"><img src="/dist/image/logo.png" alt="logoPic"></a>
            </div>
            @include('front.components.header_menu')
            <x-header-user></x-header-user>
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
                <p class="mt-3 fs-12">Республика Беларусь:
                    <br><br>
                    ООО «Стоматологическое образование»<br>
                    УНП 193237965<br>
                    220002, Республика Беларусь, г. Минск, ул.<br>В.Хоружей, 31А, каб. 313
                    <br><br>
                    Управление регистрации и лицензирования главного<br>управления юстиции Мингорисполкома от<br>10.04.20219г.
                    №193237965</p>
            </div>
            <div class="col-12 col-lg-2 mt-lg-6 mb-2 mb-md-4 fs-20 f-600">
                <a href="{{route('course.index')}}"><p>Наши курсы</p></a>
                <a href="{{route('lectors.index')}}"><p>Лектора</p></a>
                <a href="{{route('about')}}"><p>О нас</p></a>
                <a href="{{route('blog.index')}}"><p>Статьи</p></a>
                <a href="{{route('contacts')}}"><p>Контакты</p></a>
            </div>
            <div class="col-12 col-lg-2 mt-2 mt-lg-6 mb-4 fs-20 f-600 d-none d-lg-block">
                <a href="education.html"><p>Наши курсы</p></a>
                <a href="lecturers.html"><p>Лектора</p></a>
                <a href="about.html"><p>О нас</p></a>
                <a href="state.html"><p>Статьи</p></a>
                <a href="contact.html"><p>Контакты</p></a>
            </div>
            <div class="col-12 col-lg-5 mt-2 mt-lg-6 mb-4">
                <div class="d-flex flex-wrap flex-md-nowrap">
                    <div class="me-3 text-white">
                        <p class="opacity-50 fs-14 f-500">Россия</p>
                        <a href="tel:+7(499)113-19-28"><p class="fs-16 f-600">+7(499)113-19-28</p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500">Украина</p>
                        <a href="tel:+7(499)113-19-28"><p class="fs-16 f-600">+7(499)113-19-28</p></a>
                    </div>
                    <div class="ms-md-6 text-white">
                        <p class="opacity-50 fs-14 f-500">Литва</p>
                        <a href="tel:+7(499)113-19-28"><p class="fs-16 f-600">+7(499)113-19-28</p></a>
                        <p class="opacity-50 mt-4 fs-14 f-500">Беларусь</p>
                        <a href="tel:+375(44)775-54-20"><p class="fs-16 f-600">+375 (44) 775-54-20 <br class="d-block d-md-none">(Viber/WatsApp/Telegram)</p></a>
                    </div>
                </div>
                <div class="mt-4 mt-lg-5 d-flex mb-0 mb-lg-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-gray icon-style">
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube text-white fs-16"></i></a>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="https://web.telegram.org/k/"><i class="fab fa-telegram-plane text-white fs-16"></i></a>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="https://twitter.com/"><i class="fab fa-twitter text-white fs-16"></i></a>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f text-white fs-16"></i></a>
                    </div>
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-gray ms-2 icon-style">
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram text-white fs-16"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex flex-column-reverse flex-lg-row justify-content-between align-items-lg-center py-3">
            <div class="col-md-7">
                <div>
                    <p class="fs-12 f-500 m-0">© Сервис обучения врачей<br class="d-block d-lg-none">стоматологов Stom-Academy - сайт<br class="d-block d-lg-none">для стоматологов,
                        2016 – 2021</p>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-content-between align-items-center mb-3 mb-md-0 flex-wrap flex-md-nowrap">
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
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
@livewireScripts
<script>
    $(function () {
        $('.summernote').summernote()
        $('.select2').select2({
            theme: 'bootstrap4',
            tags:true,
        });
    })
</script>
</body>
</html>
