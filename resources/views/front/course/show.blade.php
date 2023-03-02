@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden ">
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

            <div class="main2">
                <div class="eng-doctors-txt">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-12">
                                <div class="about-course1">
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
                                                <a href="#lectors">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <p class="p-name">Cameron Williamson</p>
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
                                                <p class="txts-1-title">Старт</p>
                                                <p>29 июня</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txts1 d-xl-none d-flex flex-row mt-3 align-items-center">
                                        <p class="txts-1-title me-1 mb-0 fs-14 lh-17 f-500">Старт</p>
                                        <p class="mb-0 fs-14 lh-17 f-700">29 июня</p>
                                    </div>
                                </div>
                                <div class="about-course-txt d-xl-block d-none">
                                    <h2 class="f-700 fs-32 lh-40">Кратко об онлайн-курсе</h2>
                                    <p class="fs-16 lh-27 f-500 mb-0">Популярность концепции DSD обусловлена тем, что у
                                        нее есть преимущества как для
                                        пациента, так и для врача. Концепция DSD позволяет ускорить процесс эстетической
                                        реставрации зубов. Популярность концепции DSD обусловлена тем, что у нее есть
                                        преимущества как для пациента, так и для врача. Концепция DSD позволяет ускорить
                                        процесс эстетической реставрации зубов</p>
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
                                                <p class="fs-32 card-title-txt fw-bolder">Английский язык для
                                                    врачей-стоматологов!</p>
                                                <p class="m-0 text-secondary fs-14 f-500 card-price-txt">Цена за весь
                                                    курс</p>
                                                <h3 class="f-700 mt-0 text-primary">3000 ₽/<span
                                                        class="text-decoration-line-through">4000 ₽</span></h3>
                                                <p class="f-500 fs-14 lh-17 mb-2">15 занятий с домашними заданиями,
                                                    <span class="text-primary">1 лекция ( бесплатно)</span></p>
                                                <p class="f-500 fs-14 lh-17 mb-3">Дополнительные материалы для
                                                    обучения</p>
                                            </div>

                                            <form action="#" class="course-card-form">
                                                <div
                                                    class="course-card-form-div d-flex justify-content-between flex-column flex-lg-row mb-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="mr-1 form-check-input">
                                                        <label class="form-check-label">1 лекция ( бесплатно)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" checked="" class="mr-1 form-check-input">
                                                        <label class="form-check-label">Весь курс (3000 ₽)</label>
                                                    </div>
                                                </div>
                                                <button
                                                    class="btn btn-outline-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                    Выбрать уроки
                                                </button>
                                                <button class="btn btn-primary w-100 fs-16 f-600 br-12 mb-3 lh-20">
                                                    Купить курс
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
                                                    <span class="ms-2 f-500 fs-16 lh-20">Камиль Хабиев </span>
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
                                                    <span class="ms-2 f-500 fs-16 lh-20">168 часов</span>
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
                                                    <span class="ms-2 f-500 fs-16 lh-20">Сертификат</span>
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
                                <div class="about-course-txt d-block d-xl-none mt-4">
                                    <h2 class="f-700 fs-32 lh-40">Кратко об онлайн-курсе</h2>
                                    <p class="fs-16 lh-27 f-500">Популярность концепции DSD обусловлена тем, что у нее
                                        есть преимущества как для
                                        пациента, так и для врача. Концепция DSD позволяет ускорить процесс эстетической
                                        реставрации зубов. Популярность концепции DSD обусловлена тем, что у нее есть
                                        преимущества как для пациента, так и для врача. Концепция DSD позволяет ускорить
                                        процесс эстетической реставрации зубов</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>


            <div class="main3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-12">
                            <div class="mt-4 mt-lg-0">
                                <h3 class="f-700 m-0 lh-40 pb-2">Программа курса</h3>
                                <div class="mt-2">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item br-12">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                        aria-controls="flush-collapseOne">
                                                    <div
                                                        class="d-flex align-items-md-center flex-column flex-md-row justify-content-between w-100">
                                                        <div class="d-flex">
                                                            <p class="fs-16 f-500 m-0 color-23">1</p>
                                                            <p class="fs-16 f-700 ms-4 m-0 lh-20 color-23">Терапия</p>
                                                        </div>
                                                        <div class="d-flex align-items-center mt-3 mt-md-0">
                                                            <img src="/dist/image/avatar1.png" class="me-2 videoPic"
                                                                 alt="videoPic">
                                                            <p class="m-0 f-500 fs-14 color-23 lh-17">Камиль Хабиев</p>
                                                        </div>
                                                        <div class="d-flex d-none d-lg-block">
                                                            <i class="far fa-clock me-1"></i>
                                                            <span class="me-2 f-500 f-14">160 мин</span>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center mt-4 mt-md-0 justify-content-between">
                                                            <p class="m-0 f-700 fs-16 text-primary pe-3">3000 ₽</p>
                                                            <div
                                                                class="btn btn-outline-primary py-2 px-3 br-12 fs-14 f-600 me-3 btn-buy">
                                                                Купить
                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                 aria-labelledby="flush-headingOne"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="p-2 py-lg-3 px-lg-5">
                                                        <p class="m-0 f-600 fs-16 lh-20 color-23">Webinar program</p>
                                                        <ul class="mt-2 fs-16 f-500 lh-20">
                                                            <li class="mb-4">Treatment Protocol for impaction: lower
                                                                arch. Surgical and Orthodontic Approaches
                                                            </li>
                                                            <li class="mb-4">Types of impaction cases</li>
                                                            <li class="mb-4">Closure of space in the area of extracted
                                                                teeth
                                                            </li>
                                                            <li class="mb-4">Use of buccal shelf screws combined with
                                                                3-D lever arms as an ideal mechanical design
                                                            </li>
                                                            <li class="mb-4">Protocols for the treatment of complex
                                                                clinical cases of retained teeth
                                                            </li>
                                                            <li class="mb-4">Clinical cases.</li>
                                                        </ul>
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

            <div id="lectors" class="main4">
                <div class="container">
                    <div class="one-lector br-12 w-100 d-flex flex-column-reverse flex-xl-row mb-3">
                        <div class="txts me-0 me-xl-4">
                            <h4 class="f-700 fs-32 lh-40 color-23 mt-4 mt-xl-0">Эмма Погосова</h4>
                            <p class="fs-16 f-500 lh-24 color-23">Врач-стоматолог, ортодонт.</p>
                            <ul>
                                <li class="mb-xl-0 mb-3">Окончила Российский Университет Дружбы Народов с отличием.</li>
                                <li class="mb-xl-0 mb-3">Клиническая интернатура на базе кафедры Стоматологии детского
                                    возраста и ортодонтии РУДН.
                                </li>
                                <li class="mb-xl-0 mb-3">Клиническая ординатура по специальности «Ортодонтия» на кафедре
                                    Ортодонтии и детского протезирования МГМСУ.
                                </li>
                                <li class="mb-xl-0 mb-3">Опыт работы врачом-ортодонтом 12 лет.</li>
                                <li class="mb-xl-0 mb-3">Выступления на научных конференциях, печатные работы.</li>
                                <li class="mb-xl-0 mb-3">Членство в Ассоциации ортодонтов Армении (AOA).</li>
                                <li class="mb-xl-0 mb-3">Членство в Евразийской ортодонтической ассоциации (EOS).</li>
                            </ul>
                        </div>
                        <div class="image mt-2">
                            <img src="/dist/image/doctor.png" class="br-12" alt="doctor">
                        </div>
                    </div>

                    <div class="many-lector">
                        <h3 class="fs-32 f-700 lh-40 color-23 mb-4">Лекторы</h3>
                        <div
                            class="lector-cards d-flex flex-wrap flex-lg-nowrap justify-content-between align-items-center">
                            <div class="card1 me-2">
                                <div class="card br-12 mb-3" style="max-width: 522px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/dist/image/lector-card-img1.png" class="img-fluid rounded-start"
                                                 alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title f-700 fs-20 lh-24">Дахер Рами Насер</h5>
                                                <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">Врач-стоматолог
                                                    общей практики</p>
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
                                                    <span class="ms-2">23 лекции</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card1 me-2">
                                <div class="card br-12 mb-3" style="max-width: 522px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/dist/image/lector-card-img1.png" class="img-fluid rounded-start"
                                                 alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title f-700 fs-20 lh-24">Дахер Рами Насер</h5>
                                                <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">Врач-стоматолог
                                                    общей практики</p>
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
                                                    <span class="ms-2">23 лекции</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card1 me-2">
                                <div class="card br-12 mb-3" style="max-width: 522px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/dist/image/lector-card-img1.png" class="img-fluid rounded-start"
                                                 alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title f-700 fs-20 lh-24">Дахер Рами Насер</h5>
                                                <p class="card-text text-muted f-500 fs-14 lh-20 mb-4">Врач-стоматолог
                                                    общей практики</p>
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
                                                    <span class="ms-2">23 лекции</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main5" style="background-color: #191F70;">
                <div class="container">
                    <div class="d-flex">
                        <div class="main5-1 me-4">
                            <h3 class="text-white fw-bold mb-4" style="max-width: 370px;">Окклюзия. Концепции Р. Славичека</h3>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">Стоимость участия в онлайн-курсе 1 лекции:</p>
                            <p class="color-ad fs-14 f-500 lh-17 mb-13">При оплате до старта мероприятия</p>
                            <p class="fw-bold fs-43 lh-43 text-white">
                                40 EUR
                                <sup class="fs-23 lh-23 fw-normal align-middle strikethrough">80 EUR</sup>
                            </p>
                            <ul class="text-white ps-2 mb-4">
                                <li class="fw-normal fs-14 lh-23">Запись лекций</li>
                                <li class="fw-normal fs-14 lh-23">Cертификат</li>
                                <li class="fw-normal fs-14 lh-23">Ответы на вопросы</li>
                            </ul>
                            <p class="text-white fw-normal fs-14 lh-23 mb-0" style="max-width: 307px;">Также мы поддерживаем молодых специалистов и предоставляем скидку:</p>
                            <ul  class="text-white ps-2">
                                <li class="fw-normal fs-14 lh-23">25% для студентов, интернов и ординаторов</li>
                            </ul>
                        </div>
                        <div class="main5-2">
                            <h3 class="text-white f-700 fs-32 lh-32">Регистрация на онлайн-курс</h3>
                            <label class="text-white fs-14 lh-14 fw-normal">Ваше имя</label>
                            <input type="text" class="form-control mb-3 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Имя Фамилия">
                            <label class="text-white fs-14 lh-14 fw-normal">Ваш e-mail</label>
                            <input type="text" class="form-control mb-3 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="mail@example.com">
                            <label class="text-white fs-14 lh-14 fw-normal">Ваш номер телефона</label>
                            <input type="text" class="form-control mb-3 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ваш номер телефона">
                            <button class="btn btn-outline-primary w-100 fs-18 f-600 br-12 mb-3 lh-23 text-white py-3 mt-3" style="background-color: #5CB0FF;">Зарегистрироваться</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
