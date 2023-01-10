@extends("layouts.app")

@section("content")
    <div class="container mt-4 mt-lg-5">
        <div class="d-flex justify-content-center flex-wrap gap-2">
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Все направления</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Программирование</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Дизайн</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Маркетинг</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Управление</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Игры</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Кино и музыка</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Психология</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Общее развитие</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Инженерия</button>
            <button class="btn btn-outline-primary rounded-5 fs-20 f-600 py-2 px-3">Другое</button>
        </div>
    </div>
    <!--Video menu part-->

    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">Популярные курсы</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="{{route('webinar.index')}}" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigatioin videoPopularSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper videoPopularSwiper br-12">
            <div class="swiper-wrapper">
                @foreach($courses as $course)
                    <div class="p-3 swiper-slide d-flex flex-column flex-xxl-row br-12">
                        <img src='{{\Illuminate\Support\Facades\Storage::url($course->image)}}' alt="videoPic">
                        <div class="d-flex flex-column ms-0 ms-xxl-4 mt-3 mt-xxl-0">
                            <p class="text-primary text-uppercase f-700 fs-10">{{$course->directions->title}}</p>
                            <h5 class="f-700">{{$course->info->title}}</h5>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 f-500 f-14">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="f-500 f-14">3 видео</span>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <img src="/dist/image/kamil.png" class="me-3" alt="videoPic">
                                <p class="m-0 f-500 fs-16">Камиль Хабиев</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!--Additions-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">Новые курсы</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigatioin AdditionsSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper AdditionsSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition2.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 py-2 mt-3 fs-14">Купить лекцию</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 py-2 fs-14 mt-5 mt-xl-3">Смотреть</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 py-2 mt-3 fs-14">Купить лекцию</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 mt-3 fs-14 py-2">Купить лекцию</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition2.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 py-2 fs-14 mt-5 mt-xl-3">Смотреть</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="bg-white br-12">
                        <img src="/dist/image/addition1.png" class="w-100" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                            <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                            <div class="mt-2">
                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                            </div>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                    <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                </div>
                                <div class="mt-3 mt-xl-0">
                                    <span class="f-700 text-primary fs-16">3000 ₽</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Watched-->
    <div class="container mt-4 mt-lg-6">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                <div>
                    <h3 class="f-700 m-0">Онлайн-конференции</h3>
                </div>
                <div class="ms-lg-4 mt-2 mt-lg-0">
                    <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
                </div>
            </div>
            <div class="slider_navigatioin WatchedSwiper_nav mb-4 d-none d-md-block">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="swiper WatchedSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png');" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4  mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched1.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div style="background-image: url('dist/image/watched2.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div style="background-image: url('dist/image/watched3.png')" class="watched-bg br-12">
                                <div class="br-12 watched-bg2 p-3 p-lg-4 text-white d-flex justify-content-between flex-column">
                                    <div>
                                        <p class="f-700 text-uppercase fs-10 watched-text">Онлан-конгресс</p>
                                        <h5 class="f-700">Экспертный курс по<br>имплантации</h5>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="/dist/image/person1.png" alt="personPic">
                                            <img src="/dist/image/person2.png" class="m-25" alt="personPic">
                                            <img src="/dist/image/person3.png" class="m-25" alt="personPic">
                                        </div>
                                        <div>
                                            <span class="fs-20 f-600 ms-2">23 +</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Notes-->
    <div class="container mt-4 mt-lg-6 useful_articles overflow-auto">
        <div class="d-flex align-items-lg-center flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Онлайн-лекции</h3>
            </div>
            <div class="ms-lg-4">
                <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
            </div>
        </div>
        <div class="row flex-nowrap flex-md-wrap">
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note1.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note2.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">4000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note3.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">2000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note4.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note1.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-4 col-xxl-2 mt-3">
                <div class="bg-white br-12">
                    <img src="/dist/image/note6.png" class="w-100" alt="notePic">
                    <div class="d-flex flex-column p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                        <p class="f-700 mt-1 fs-16">Экспертный курс <br class="d-none d-lg-block">по имплантации</p>
                        <div class="d-flex align-items-center mt-2">
                            <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                            <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                            <div class="mb-3 mb-md-0">
                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                            </div>
                            <button class="btn btn-outline-primary br-12 px-3 py-2 fs-14 f-600">
                                Купить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Videos-->
    <div class="w-100 text-white pb-5 pb-lg-6 bg-gray video_blog mt-4 mt-lg-6">
        <div class="container">
            <div class="row images py-6">
                <div class="col-12 col-lg-6">
                    <div class="position-relative">
                        <img src="/dist/image/video1.png" alt="videoPic" class="big">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="position-relative">
                        <img src="/dist/image/video2.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="position-relative mt-3">
                        <img src="/dist/image/video4.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="position-relative">
                        <img src="/dist/image/video3.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="position-relative mt-3">
                        <img src="/dist/image/video5.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="position-relative">
                        <img src="/dist/image/video2.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="position-relative mt-3">
                        <img src="/dist/image/video4.png" alt="videoPic">
                        <div class="cursor position-absolute bottom-0 start-0 ms-2 mb-2 rounded-circle d-flex align-items-center justify-content-center icon-style3">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
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
                <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
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

    <!--Useful articles-->
    <div class="container mt-4 mt-lg-6 useful_articles">
        <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Полесзные статьи</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
            </div>
        </div>
        <div>
            <div class="mt-4 d-flex useful_article_row">
                <div class="d-flex flex-column useful_article_item">
                    <div>
                        <img src="/dist/image/articles1.png" alt="articlePic">
                    </div>
                    <div class="p-3 p-lg-4">
                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                        <h5 class="f-700 mt-2 m-0">Экспертный курс по<br class="d-block d-md-none">имплантации</h5>
                        <p class="mt-2 mt-lg-6 fs-14 f-500 m-0 mt-3"><i class="far fa-calendar me-2"></i>16.06.2021</p>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-column-reverse useful_article_item">
                    <div>
                        <img src="/dist/image/articles2.png" alt="articlePic">
                    </div>
                    <div class="p-3 p-lg-4">
                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                        <h5 class="f-700 mt-2 m-0">Экспертный курс по<br class="d-block d-md-none">имплантации</h5>
                        <p class="mt-2 mt-lg-6 fs-14 f-500 fs-14 m-0 mt-3"><i class="far fa-calendar me-2"></i>16.06.2021</p>
                    </div>
                </div>
                <div class="d-flex flex-column useful_article_item">
                    <div>
                        <img src="/dist/image/articles3.png" alt="articlePic">
                    </div>
                    <div class="p-3 p-lg-4">
                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                        <h5 class="f-700 mt-2 m-0">Экспертный курс по<br class="d-block d-md-none">имплантации</h5>
                        <p class="mt-2 mt-lg-6 fs-14 f-500 m-0 mt-3"><i class="far fa-calendar me-2"></i>16.06.2021</p>
                    </div>
                </div>
                <div class="d-flex flex-column flex-lg-column-reverse useful_article_item">
                    <div>
                        <img src="/dist/image/articles4.png" alt="articlePic">
                    </div>
                    <div class="p-3 p-lg-4">
                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                        <h5 class="f-700 mt-2 m-0">Экспертный курс по<br class="d-block d-md-none">имплантации</h5>
                        <p class="mt-2 mt-lg-6 fs-14 f-500 fs-14 m-0 mt-3"><i class="far fa-calendar me-2"></i>16.06.2021</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--lecturers-->
    <div class="container mt-5">
        <div class="d-flex align-items-lg-center flex-column flex-lg-row">
            <div>
                <h3 class="f-700 m-0">Наши лекторы</h3>
            </div>
            <div class="ms-lg-4 mt-2 mt-lg-0">
                <a href="#" class="text-info text-decoration-underline"><p class="m-0 f-700 fs-16">Посмотреть все<i class="far fa-angle-right ms-2"></i></p></a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer1.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mt-3 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer2.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mt-2 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer3.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mt-2 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer4.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mt-2 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer1.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-lg-2 mt-2 mt-lg-4">
                <div class="bg-white br-12">
                    <img src="/dist/image/lecturer6.png" class="w-100" alt="lecturerPic">
                    <div class="text-black p-3">
                        <p class="fs-20 f-700">Дахер Рами Насер</p>
                        <p class="text-secondary fs-14 f-500">Врач-стоматолог общей<br class="d-none d-md-block"> практики</p>
                        <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">23 лекции</span>
                    </div>
                </div>
            </div>
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
                            <i class="far fa-chalkboard-teacher text-primary fs-25"></i>
                        </div>
                    </div>
                    <div class="ms-4 mt-2">
                        <h4 class="f-700">Хочешь стать лектором?</h4>
                        <p class="fs-16 mb-4">Отправьте заявку и мы свяжимся с вами в ближайшее время</p>
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12 white-space">Отправить завку</button>
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
                        <button class="btn btn-primary f-600 fs-14 px-4 py-2 br-12">Подписаться</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
