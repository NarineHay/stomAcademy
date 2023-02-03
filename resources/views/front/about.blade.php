@extends("layouts.app")

@section("content")
    <div class="container mt-4 mt-lg-6">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h2 class="f-700 m-0">О ПРОЕКТЕ<br> STOM-ACADEMY</h2>
                <p class="m-0 fs-16 f-500 mt-4">Никаких ограничений по опыту и специальности. Огромный<br class="d-none d-sm-block">
                    выбор лекторов и тем. Online-обучение, практический курс,<br class="d-none d-sm-block">
                    семинары или конгрессы – выбор за вами.</p>
            </div>
            <div class="col-12 col-lg-6 mb-3 mt-3 mt-lg-0 about_text">
                <div class="d-flex pb-3 align-items-center border-bottom justify-content-between">
                    <div>
                        <h1 class="text-primary f-700 m-0">100 000</h1>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0">Участников</h5>
                    </div>
                    <div>
                        <p class="m-0 fs-16 f-500">Наши лекции и <br class="d-block d-sm-none"> семинары<br class="d-none d-sm-block">
                            помогли <br class="d-block d-sm-none"> людям выйти на<br>
                            профессиональный <br class="d-block d-sm-none">уровень</p>
                    </div>
                </div>
                <div class="d-flex py-3 align-items-center border-bottom justify-content-between">
                    <div>
                        <h1 class="text-primary f-700 m-0">129</h1>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0">Лекторов</h5>
                    </div>
                    <div>
                        <p class="m-0 fs-16 f-500">Обучения проводят<br>
                            профессионалы <br class="d-block d-md-none"> своего<br class="d-none d-md-block">
                            дела</p>
                    </div>
                </div>
                <div class="d-flex py-3 align-items-center justify-content-between">
                    <div>
                        <h1 class="text-primary f-700 m-0">4.5</h1>
                        <h5 class="text-primary f-700 m-0 mt-2 mt-sm-0">Года успешной <br class="d-block d-sm-none">работы</h5>
                    </div>
                    <div>
                        <p class="m-0 fs-16 f-500">Успешно <br class="d-block d-sm-none">развиваемся и не<br>
                            стоим на месте.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Mission part-->
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4 mt-lg-6">
                <div class="position-relative d-flex justify-content-center align-items-center">
                    <img src="dist/image/aboutContent.png" alt="pic" class="br-12 w-100">
                    <div class="rounded-circle d-flex align-items-center justify-content-center icon-style4 border-0 bg-primary position-absolute cursor"
                         style="background: rgba(255, 255, 255, 0.3);">
                        <i class="fas fa-play text-white fs-22"></i>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4 mt-lg-6 mb-4 mb-lg-6">
                <div class="d-flex justify-content-center flex-column">
                    <h3 class="f-600 m-0 text-center">“Наша миссия - обеспечить любого<br class="d-none d-lg-block">врача-стоматолога
                        необходимыми знаниями, <br class="d-none d-lg-block">
                        передавая опыт от лучших специалистов в каждом<br class="d-none d-lg-block">
                        из направлений”</h3>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <img src="dist/image/aboutLogo.png" alt="pic">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <p class="fs-12 f-700 m-0">STOM-ACADEMY</p>
                </div>
            </div>
        </div>
    </div>



    <!--dentistry-->
    <div class="container mt-5 mt-lg-6">
        <h3 class="f-700 mb-3 mb-lg-5 m-0">Вас будут обучать лучшие<br>
            специалисты в области<br>
            стоматологии</h3>
        <div class="row lecturers pb-6">
            @foreach($lectors as $lector)
                <div class="col-6 col-lg-3">
                    <div class="bg-white br-12">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($lector->userinfo->image)}}" style="width: 385px; height: 318px; object-fit: cover" alt="lecturerPic">
                        <div class="text-black p-3">
                            <p class="fs-20 f-700">{{$lector->name}}</p>
                            <p class="text-secondary fs-14 f-500">{{$lector->lector->directions->title}}</p>
                            <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">{{ $lector->webinars_count }} лекции</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- LOOKING FOR GOOD SPECIALISTS -->
    <div class="container">
        <div class="row mt-5 mb-0 mb-lg-6 align-items-center flex-column flex-lg-row">
            <div class="col">
                <div>
                    <h2 class="m-0 f-700">ИЩЕМ ХОРОШИХ<br>
                        СПЕЦИАЛИСТОВ</h2>
                    <p class="m-0 fs-16 f-500 mt-2 mt-lg-3">Мы всегда готовы познакомиться с отличными<br class="d-none d-lg-block">
                        специалистами. Пришлите нам ваше резюме для<br class="d-none d-lg-block">
                        рассмотрения.</p>
                    <button class="btn btn-primary py-2 px-4 px-lg-5 br-12 fs-16 f-600 mt-3 mt-lg-5">Хочу стать лектором</button>
                </div>
            </div>
            <div class="col mt-4 mt-lg-0">
                <img src="dist/image/about5.png" class="w-100" alt="pic">
            </div>
        </div>
    </div>

    <!--What lecturers say about us-->
    <div class="container">
        <div class="row mt-4 mt-lg-0 mb-5 mb-lg-6">
            <h2 class="f-700 m-0">Что о нас<br> говорят лектора</h2>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <img src="dist/image/about6.png" class="w-100" alt="picture">
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/kamil.png" class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0">Дахер Рами Насер</p>
                        <p class="m-0 fs-14 text-secondary f-500">Врач-стоматолог общей практики</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <img src="dist/image/about7.png" class="w-100" alt="picture">
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/kamil.png" class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0">Дахер Рами Насер</p>
                        <p class="m-0 fs-14 text-secondary f-500">Врач-стоматолог общей практики</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <img src="dist/image/about8.png" class="w-100" alt="picture">
                </div>
                <div class=" d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/kamil.png" class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0">Дахер Рами Насер</p>
                        <p class="m-0 fs-14 text-secondary f-500">Врач-стоматолог общей практики</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 mt-4 mt-lg-5">
                <div>
                    <img src="dist/image/about9.png" class="w-100" alt="picture">
                </div>
                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <div class="position-relative">
                        <img src="dist/image/profileback.png" alt="userPic">
                        <img src="dist/image/kamil.png" class="position-absolute top-0 bottom-0 end-0 start-0 m-auto mb-2" alt="pic">
                    </div>
                    <div class="ms-3">
                        <p class="fs-200 f-700 m-0">Дахер Рами Насер</p>
                        <p class="m-0 fs-14 text-secondary f-500">Врач-стоматолог общей практики</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Do you have any questions?-->
    <div class="container">
        <div class="row mb-6">
            <div class="col-12 mt-0 mt-lg-6">
                <div class="d-flex justify-content-center flex-column text-center">
                    <h2 class="m-0 f-700">Остались вопросы?</h2>
                    <p class="m-0 fs-14 text-secondary f-500 mt-2 mt-4">Связавшись с нашими специалистами, вы получите подробную<br>
                        консультацию и ответы на все вопросы.</p>
                    <a href="tel:+375(29)5948888"><h3 class="f-500 mt-4 m-0 text-black">+375 (29) 594-88-88</h3></a>
                    <div class="mt-3 d-flex justify-content-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center icon-style2">
                            <a href="https://www.youtube.com/"><i class="fab fa-telegram-plane text-primary"></i></a>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center ms-2 icon-style2">
                            <a href="https://web.telegram.org/k/"><i class="fab fa-twitter text-primary"></i></a>
                        </div>
                        <div class="rounded-circle d-flex align-items-center justify-content-center ms-2 icon-style2">
                            <a href="https://twitter.com/"><i class="fab fa-facebook-f text-primary"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
