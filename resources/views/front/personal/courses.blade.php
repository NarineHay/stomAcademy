@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block pt-4 pt-lg-6" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <x-profile></x-profile>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9 pt-6">
                    <div class="py-lg-6">
                        <div class="d-flex justify-content-between">
                            <h3 class="f-700 m-0">Мои курсы</h3>
                            <div class="position-relative d-none d-lg-block">
                                <input type="search" class="form-control br-12" placeholder="Поиск">
                                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex">
                                <p class="fs-14 f-700 m-0 purchaseActive py-2 py-lg-3">Онлайн-конференции</p>
                                <p class="fs-14 f-500 m-0 ms-3 ms-lg-5 py-2 py-lg-3" style="padding-bottom: 20px">Онлайн курсы</p>
                            </div>
                            <div class="py-2 py-lg-3">
                                <div class="d-flex align-items-center d-none d-lg-block">
                                    <div class="dropdown">
                                        <span class="text-secondary fs-14 f-500">Сортировать по:</span>
                                        <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">Направлению
                                        </button>
                                        <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                                            <input type="checkbox" id="vehicle1" name="vehicle1" class="mt-2">
                                            <label for="vehicle1" class="f-500 fs-14 ms-2">Ортодонтия</label><br>
                                            <input type="checkbox" id="vehicle2" name="vehicle2" class="mt-2">
                                            <label for="vehicle2" class="f-500 fs-14 ms-2">Протезирование</label><br>
                                            <input type="checkbox" id="vehicle3" name="vehicle3" class="mt-2">
                                            <label for="vehicle3" class="f-500 fs-14 ms-2">Цифровая стоматология</label><br>
                                            <input checked type="checkbox" id="vehicle4" name="vehicle3" class="mt-2">
                                            <label for="vehicle4" class="f-500 fs-14 ms-2">Имплантология</label><br>
                                            <input type="checkbox" id="vehicle5" name="vehicle1" class="mt-2">
                                            <label for="vehicle5" class="f-500 fs-14 ms-2">Цифровая стоматология</label><br>
                                            <input type="checkbox" id="vehicle6" name="vehicle2" class="mt-2">
                                            <label for="vehicle6" class="f-500 fs-14 ms-2">Протезирование</label><br>
                                            <input type="checkbox" id="vehicle7" name="vehicle3" class="mt-2">
                                            <label for="vehicle7" class="f-500 fs-14 ms-2">Цифровая стоматология</label><br>
                                            <input type="checkbox" id="vehicle8" name="vehicle3" class="mt-2">
                                            <label for="vehicle8" class="f-500 fs-14 ms-2">Имплантология</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <i class="fal fa-search"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mt-3">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mt-3 ">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mt-2 mt-lg-3">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mt-2 mt-lg-3">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mt-2 mt-lg-3">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mt-2 mt-lg-3">
                                <div class="bg-white br-12">
                                    <img src="/dist/image/purchase.png" class="w-100" alt="pic">
                                    <div class="p-3">
                                        <p class="text-primary text-uppercase f-700 fs-10 m-0">Терапия</p>
                                        <p class="f-700 fs-16 m-0 mt-2">Экспертный курс по имплантации</p>
                                        <div class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                            <div class="d-flex align-items-center">
                                                <img src="/dist/image/kamil.png" class="me-2" alt="customerPic">
                                                <p class="m-0 fs-14 f-500">Камиль Хабиев</p>
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
    </section>
@endsection
