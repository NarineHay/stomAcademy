@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="courses-show-div">
            <div class="div-menu-2" style="background-image: url('/dist/image/bg-courses1.png');">
                <div class="container">
                    <div class="menu">
                        <a href="#">Главная</a>
                        <span>|</span>
                        <a href="#">Онлайн обучение</a>
                    </div>
                </div>
            </div>

            <div class="main2 ">
                <div class="eng-doctors-txt  ">
                    <div class="container">
                        <div class="row">
                            <div class="col-7 d-none d-xl-block">
                                <h1 class="text-primary fw-bolder">Английский язык для врачей-стоматологов!</h1>
                                <p>15 занятий с домашними заданиями.</p>
                                <div class="d-flex flex-row">
                                    <div class="images">
                                        <img src="/dist/image/avatar1.png" alt="avatar1.png">
                                        <img src="/dist/image/avatar2.png" alt="avatar2.png">
                                        <img src="/dist/image/avatar3.png" alt="avatar3.png">
                                    </div>
                                    <div class="txts d-flex flex-row">
                                        <div class="txts1">
                                            <p class="txts-1-title">Преподаватели</p>
                                            <div class="d-flex flex-row align-items-center">
                                                <p class="p-name">Cameron Williamson</p>
                                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M0.292893 0.292893C0.683417 -0.0976311 1.31658 -0.0976311 1.70711 0.292893L7 5.58579L12.2929 0.292893C12.6834 -0.0976311 13.3166 -0.0976311 13.7071 0.292893C14.0976 0.683417 14.0976 1.31658 13.7071 1.70711L7.70711 7.70711C7.31658 8.09763 6.68342 8.09763 6.29289 7.70711L0.292893 1.70711C-0.0976311 1.31658 -0.0976311 0.683417 0.292893 0.292893Z"
                                                          fill="#232323"/>
                                                </svg>
                                            </div>
                                        </div>

                                        <div class="txts1">
                                            <p class="txts-1-title">Старт</p>
                                            <p>29 июня</p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-div col-lg-5 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="img_video">
                                            <img  src="/dist/image/video1.png" alt="img_video">
                                        </div>
                                        <div class="card-txts">
                                            <p class="fs-32 card-title-txt fw-bolder">Английский язык для
                                                врачей-стоматологов!</p>
                                            <p class="m-0 text-secondary fs-14 f-500 card-price-txt">Цена за весь курс</p>
                                            <h3 class="f-700 mt-0 text-primary">3000 ₽/<span class="text-decoration-line-through">4000 ₽</span></h3>

                                        </div>

                                        <div class="mt-3 d-flex justify-content-between flex-column flex-lg-row">
                                            <div class="d-flex align-items-center">
                                                <input type="checkbox" id="lecture" name="lecture" value="lecture">
                                                <label for="lecture" class="fs-14 f-500 ms-2">1 лекция ( бесплатно)</label><br>
                                            </div>
                                            <div class="ms-0 ms-lg-4 ms-xl-5 d-flex align-items-center mt-2 mt-lg-0">
                                                <input type="checkbox" checked id="course" name="course" value="course">
                                                <label for="course" class="fs-14 f-500 ms-2">Весь курс (3000 ₽)</label><br>
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
    </div>
@endsection
