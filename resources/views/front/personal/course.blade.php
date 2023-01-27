@extends("layouts.app")

@section("content")

<section style="overflow: hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                <div class="account_left_aside_bg profile_left"></div>
                <x-profile></x-profile>
{{--                <div class="mb-6 my-4 my-lg-6 pt-6" style="z-index: 1">--}}
{{--                    <img src="dist/image/jane.png" alt="profilePic">--}}
{{--                    <h5 class="f-700 mt-3 m-0">Jane Cooper</h5>--}}
{{--                    <div class="d-flex mt-3">--}}
{{--                        <i class="fal fa-pencil"></i>--}}
{{--                        <a href="#" class="text-decoration-none m-0 fs-14 f-500 text-secondary ms-2">Настройки профиля</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <div class="d-flex mb-4 text-primary mt-2">--}}
{{--                        <i class="fal fa-user me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-primary fs-14 f-500">Мой профиль</a>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4 mt-4">--}}
{{--                        <i class="fal fa-play-circle me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-black fs-14 f-500">Мои курсы</a>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4 mt-4">--}}
{{--                        <i class="fal fa-box-alt me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-black fs-14 f-500">Сертификаты</a>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4 mt-4">--}}
{{--                        <i class="fal fa-file-certificate me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-black fs-14 f-500">История покупок</a>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4 mt-4">--}}
{{--                        <i class="far fa-cart-arrow-down me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-black fs-14 f-500">Корзина</a>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4 mt-4">--}}
{{--                        <i class="fal fa-comment me-2"></i>--}}
{{--                        <a href="#" class="text-decoration-none text-black fs-14 f-500">Поддержка</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="col-lg-8">
                <div class="py-5 px-5 mt-4 mt-lg-5">
                    <p class="m-0 f-500 fs-14 cursor"><i class="fal fa-arrow-left me-3"></i>Назад</p>
                    <div class="mt-4">
                        <div class="bg d-flex justify-content-center align-items-center position-relative br-12">
                            <img src="dist/image/onliechat3.png" alt="pic" class="br-12 w-100">
                            <div class="rounded-circle d-flex align-items-center justify-content-center icon-style4 border-0 bg-primary position-absolute"
                                 style="background: rgba(255, 255, 255, 0.3);">
                                <i class="fas fa-play text-white fs-22"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div>
                            <p class="m-0 text-primary fs-10 f-700">Терапия</p>
                            <p class="m-0 fs-24 f-700 mt-2">Экспертный курс по имплантации</p>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <img src="dist/image/onlinechat4.png" alt="pic">
                            </div>
                            <div>
                                <p class="fs-16 f-500 m-0 ms-3">Камила Хабиев</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="m-0 fs-16 f-500">Популярность концепции DSD обусловлена тем, что у нее есть преимущества как для <br class="d-none d-xxl-block">
                                пациента, так и для врача. Концепция DSD позволяет ускорить процесс эстетической реставрации зубов</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3 mt-lg-4 px-5 mb-3">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-lg-center mb-4 flex-column flex-lg-row">
                            <div>
                                <h3 class="f-700 m-0">Eще курсы с этой категории</h3>
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
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="bg-white br-12">
                                    <img src="dist/image/addition1.png" class="w-100" alt="addPic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">Терапия</p>
                                        <p class="f-700 fs-16">Экспертный курс по имплантации</p>
                                        <div class="mt-2 d-flex flex-column flex-sm-row">
                                            <div>
                                                <i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">42 мин</span>
                                            </div>
                                            <div class="mt-2 mt-sm-0">
                                                <i class="far fa-tasks me-1"></i> <span class="fs-14 f-500">3 видео</span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mt-4">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                            <div class="mt-3">
                                                <span class="f-700 text-primary fs-16">3000 ₽</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary w-100 f-600 br-12 mt-3 py-2 fs-14 white-space">Купить лекцию</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-12 position-relative">
                <div class="aside d-none d-lg-block">
                    <div class="p-4 d-flex flex-column justify-content-between mt-4 mt-lg-5" style="height: 65vh">
                        <div>
                            <p class="m-0 fs-20 f-700">Онлайн чат</p>
                            <div class="mt-4">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="dist/image/onlinecchat1.png" alt="pic">
                                    </div>
                                    <div class="ms-2">
                                        <p class="m-0 fs-14 f-700">Estherа Howard</p>
                                        <p class="m-0 fs-14">Всем добрый вечер!</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-4">
                                    <div>
                                        <img src="dist/image/onlinechat2.png" alt="pic">
                                    </div>
                                    <div class="ms-2">
                                        <p class="m-0 fs-14 f-700">Robertа Fox</p>
                                        <p class="m-0 fs-14">Хорошая слышимость, <br>спасибо!</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mt-6 position-relative">
                            <input class="w-100 py-3 px-3 br-12 border-0 position-relative" placeholder="Добавить комментарий">
                            <div class="icon-style bg-primary br-12 d-flex justify-content-center align-items-center
                                    position-absolute top-0 bottom-0 end-0 me-2 mt-2">
                                <i class="far fa-paper-plane text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
