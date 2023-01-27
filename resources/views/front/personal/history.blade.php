@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <x-profile></x-profile>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
                        <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-5">
                            <h3 class="f-700 m-0">История покупок</h3>
                            <div class="position-relative d-none d-lg-block">
                                <input class="form-control br-12" placeholder="Поиск">
                                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between d-none d-lg-block">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="m-0 text-secondary fs-14 f-500">Название</p>
                                </div>
                            </div>


                            <div class="p-2 bg-white br-12 d-flex align-items-xxl-center mt-2 justify-content-between flex-column flex-xxl-row">
                                <div class="d-flex align-items-center purchase_border_bottom">
                                    <div>
                                        <img src="/dist/image/basket1.png" alt="pic">
                                    </div>
                                    <div class="ms-3">
                                        <p class="m-0 fs-14 f-500">Полость рта и зубы. Анатомия <br class="purchase_text">зуба. Типы зубов.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-2">
                                    <div class="me-xxl-5">
                                        <p class="m-0 fs-14 f-500 white-space">28.06.2021</p>
                                    </div>
                                    <div class="ms-0 ms-xxl-4 me-xxl-5">
                                        <p class="m-0 fs-14 f-500 white-space">2300 ₽</p>
                                    </div>
                                    <div class="me-xxl-5 ms-xxl-4">
                                        <ul style="color: #32C475;" class="fs-14 f-500 m-0 white-space">
                                            <li>Оплачено</li>
                                        </ul>
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
