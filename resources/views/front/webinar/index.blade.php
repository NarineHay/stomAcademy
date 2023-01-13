@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <livewire:front.webinars-catalog />
{{--            <div class="row">--}}
{{--                <div class="col-lg-10 col-12 mb-4 mb-lg-6">--}}
{{--                    <div class="d-flex mt-6 py-lg-2">--}}
{{--                        <a><span class="fs-12 f-500 text-secondary cursor">Главная</span></a>--}}
{{--                        <a><span class="fs-12 f-500 ms-3 main cursor">Онлайн обучение</span></a>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3">--}}
{{--                        <h2 class="f-600 m-0">Онлайн обучение</h2>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-between flex-column flex-lg-row mt-4 align-items-lg-center">--}}
{{--                        <div class="d-flex education_tags mb-3 mb-lg-0">--}}
{{--                            <button class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black btn_text">Онлайн-курсы</button>--}}
{{--                            <button class="fs-14 py-2 px-2 f-600 br-12 active bg-white text-black ms-2 btn_text">Вебинары</button>--}}
{{--                            <button class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">Онлайн-конференции</button>--}}
{{--                        </div>--}}

{{--                        <div class="col-12 d-flex d-lg-none justify-content-between mt-2 filter_buttons_mobile mb-2">--}}
{{--                            <button class="fs-12 f-600 py-2 w-50 bg-transparent"><a href="filter.html" class="text-black">Фильтр</a></button>--}}
{{--                            <button class="fs-12 f-600 py-2 w-50 bg-transparent text-black"><a href="sorting.html" class="text-black">Сортировка</a></button>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-center d-none d-lg-block">--}}
{{--                            <div class="dropdown">--}}
{{--                                <span class="text-secondary fs-14 f-500">Сортировать по:</span>--}}
{{--                                <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button" id="dropdownMenuButton1"--}}
{{--                                        data-bs-toggle="dropdown" aria-expanded="false">Релевантности--}}
{{--                                </button>--}}
{{--                                <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">--}}
{{--                                    <input type="radio" id="vehicle111" name="vehicle" class="mt-2 cursor">--}}
{{--                                    <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">Цена</label><br>--}}
{{--                                    <input type="radio" id="vehicle1112" name="vehicle" class="mt-2 cursor">--}}
{{--                                    <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">Названия</label><br>--}}
{{--                                    <input type="radio" id="vehicle3333" name="vehicle" class="mt-2 cursor">--}}
{{--                                    <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">По популярность</label><br>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <livewire:front.webinars-catalog />--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-12 position-relative" style="z-index: 100;">--}}
{{--                    <div class="aside d-none d-lg-block">--}}
{{--                        <div class="position-fixed">--}}
{{--                            <div class="mt-4 ms-3 pt-5">--}}
{{--                                <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"--}}
{{--                                       data-bs-toggle="collapse" data-bs-target="#fg-1"><span>Области</span><i class="fal fa-angle-right"></i></label>--}}
{{--                                <div class="collapse show" id="fg-1">--}}
{{--                                    <div class="mt-2">--}}
{{--                                        <input type="checkbox" id="vehicle1" name="vehicle1" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle1" class="f-500 fs-14 cursor">Ортодонтия</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle2" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle2" class="f-500 fs-14 cursor">Протезирование</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle3" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle3" class="f-500 fs-14 cursor">Цифровая стоматология</label><br>--}}
{{--                                        <input checked type="checkbox" id="vehicle4" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle4" class="f-500 fs-14 cursor">Имплантология</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle5" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle5" class="f-500 fs-14 cursor">Эндодонтия</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle6" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle6" class="f-500 fs-14 cursor">Цифровая стоматология</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle7" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle7" class="f-500 fs-14 cursor">Имплантология</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle8" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle8" class="f-500 fs-14 cursor">Прямая реставрация</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle9" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle9" class="f-500 fs-14 cursor">Детская стоматология</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle10" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle10" class="f-500 fs-14 cursor">Имплантология</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle11" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle11" class="f-500 fs-14 cursor">Маркетинг и менеджмент</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle12" name="vehicle3" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle12" class="f-500 fs-14 cursor">Имплантология</label><br>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 ms-3">--}}
{{--                                <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-3"><span>Оплата</span><i class="fal fa-angle-right"></i></label>--}}
{{--                                <div class="collapse show" id="fg-3">--}}
{{--                                    <div class="mt-2">--}}
{{--                                        <input type="checkbox" id="vehicle13" name="vehicle1" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle13" class="f-500 fs-14 cursor">Оплаченный</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle14" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle14" class="f-500 fs-14 cursor">Бесплатно</label><br>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-4 ms-3">--}}
{{--                                <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-2"><span>Преподаватели</span><i class="fal fa-angle-right"></i></label>--}}
{{--                                <div class="collapse show" id="fg-2">--}}
{{--                                    <div class="mt-2">--}}
{{--                                        <input type="checkbox" id="vehicle15" name="vehicle1" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle15" class="f-500 fs-14 cursor">Крис Чанг</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle16" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle16" class="f-500 fs-14 cursor">Джеффри П. Окесон</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle17" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle17" class="f-500 fs-14 cursor">Садао Сато</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle18" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle18" class="f-500 fs-14 cursor">Вальтер Девото</label><br>--}}
{{--                                        <input type="checkbox" id="vehicle19" name="vehicle2" class="mt-2 cursor">--}}
{{--                                        <label for="vehicle19" class="f-500 fs-14 cursor">Анджело Путиньяно</label><br>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
