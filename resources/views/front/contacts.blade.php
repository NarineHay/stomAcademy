@extends("layouts.app")

@section("content")
    <div class="container mb-5 mb-lg-6">
        <div class="py-5 py-lg-6">
            <div class="d-flex mt-4">
                <a><p class="fs-12 f-500 text-secondary m-0">Главная</p></a>
                <a><p class="fs-12 f-500 text-black ms-3 m-0 main">Контакты</p></a>
            </div>
            <div class="mt-3">
                <h2 class="f-600 m-0">Контакты</h2>
            </div>
            <div class="row">
                <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mt-3 mt-lg-4">
                    <p class="m-0 opacity-50 fs-14 f-500">Россия</p>
                    <a href="tel:+7(499)1131928"><p class="m-0 fs-20 f-600 mt-2 text-black">+7(499)113-19-28</p></a>
                </div>
                <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mt-4">
                    <p class="m-0 opacity-50 fs-14 f-500">Литва</p>
                    <a href="tel:+7(499)1131928"><p class="m-0 fs-20 f-600 mt-2 text-black">+7(499)113-19-28</p></a>
                </div>
                <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mt-4">
                    <p class="m-0 opacity-50 fs-14 f-500">Украина</p>
                    <a href="tel:+7(499)1131928"><p class="m-0 fs-20 f-600 mt-2 text-black">+7(499)113-19-28</p></a>
                </div>
                <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mt-4">
                    <p class="m-0 opacity-50 fs-14 f-500">Беларась (Viber/WatsApp/Telegram)</p>
                    <a href="tel:+374(44)7755420"><p class="m-0 fs-20 f-600 mt-2 text-black">+375 (44) 775-54-20 </p></a>
                </div>
                <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mt-4">
                    <p class="m-0 opacity-50 fs-14 f-500">Почта</p>
                    <a href="mailto:info@stom-academy.com"><p class="m-0 fs-20 f-600 mt-2 text-black">info@stom-academy.com</p></a>
                </div>
                <div class="col-12 mt-5">
                    <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9398.048037597298!2d27.54933336977539!3d53.92264700000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbd958c83609b8848!2sPriorbank!5e0!3m2!1sen!2s!4v1666610851344!5m2!1sen!2s"
                            height="564" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-12 col-lg-6 mt-2 mt-lg-6">
                    <div class="d-flex flex-column align-content-between">
                        <p class="m-0 fs-14 f-500">
                            Республика Беларусь:
                            <br><br>
                            ООО «Стоматологическое образование»<br>
                            УНП 193237965<br>
                            220002, Республика Беларусь, г. Минск, ул. В.Хоружей, 31А, каб. 313
                            <br><br>
                            Управление регистрации и лицензирования главного управления <br class="d-none d-md-block">юстиции Мингорисполкома от 10.04.20219г. №193237965
                        </p>
                    </div>
                    <div class="d-none d-lg-block">
                        <div class="d-flex mt-3 mt-lg-5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center icon-style2 me-2 cursor">
                                <a href="https://web.telegram.org/k/"><i class="fab fa-telegram-plane text-primary fs-16"></i></a>
                            </div>
                            <div class="rounded-circle d-flex align-items-center justify-content-center icon-style2 cursor">
                                <a href="https://twitter.com/"><i class="fab fa-twitter text-primary fs-16"></i></a>
                            </div>
                            <div class="rounded-circle d-flex align-items-center justify-content-center icon-style2 ms-2 cursor">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f text-primary fs-16"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-4 mt-lg-6">
                    <div>
                        <h5 class="f-600 m-0">У вас есть вопросы?</h5>
                    </div>
                    <div>
                        <div class="d-flex flex-column flex-lg-row mt-4">
                            <div class="d-flex flex-column w-100">
                                <label for="exampleInputName" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">ФИО</label>
                                <input id="exampleInputName" class="br-12 inputStyle p-2">
                            </div>
                            <div class="d-flex flex-column ms-0 ms-lg-3 mt-3 mt-lg-0 w-100">
                                <label for="exampleInputEmail2" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">Электронная почта</label>
                                <input id="exampleInputEmail2" class="br-12 inputStyle p-2">
                            </div>
                        </div>
                        <div class="d-flex flex-column mt-3 d-none d-lg-block">
                            <textarea class="br-12 inputStyle w-100" rows="5"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary mt-4 br-12 py-2 px-5 f-600 fs-14">Задать вопрос</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
