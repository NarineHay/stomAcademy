{{--@extends("layouts.app")--}}

{{--@section("content")--}}
{{--    <section style="overflow: hidden">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">--}}
{{--                    <div class="account_left_aside_bg profile_left"></div>--}}
{{--                    <x-profile></x-profile>--}}
{{--                </div>--}}
{{--                <div class="col-lg-1"></div>--}}
{{--                <div class="col-lg-9">--}}
{{--                    <div class="py-4 py-lg-6 mt-5 mt-lg-6">--}}
{{--                        <div class="d-flex justify-content-between">--}}
{{--                            <h3 class="f-700 m-0">Настройки профиля</h3>--}}
{{--                        </div>--}}
{{--                        <div class="mt-4">--}}
{{--                            <div class="mt-3 bg-white br-12 p-4 ">--}}
{{--                                <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">--}}
{{--                                    <p class="m-0 f-600 fs-20">Изменить личные данные</p>--}}
{{--                                    <i class="fal fa-angle-down fs-24"></i>--}}
{{--                                </label>--}}
{{--                                <div class="collapse show" id="profile-1">--}}
{{--                                    <div>--}}
{{--                                        <div class="mt-4">--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <div>--}}
{{--                                                    <img src="/dist/image/profileSettings.png" alt="pic">--}}
{{--                                                </div>--}}
{{--                                                <div class="ms-3 d-flex flex-column justify-content-center">--}}
{{--                                                    <p class="text-secondary fs-14 f-500 m-0">Изменить фото</p>--}}
{{--                                                    <p class="text-secondary fs-14 f-500 m-0 mt-2">Удалить</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex mt-4 flex-column flex-md-row">--}}
{{--                                                <div>--}}
{{--                                                    <div class="d-flex flex-column">--}}
{{--                                                        <label for="name" class="mt-2 mb-1 f-500 fs-12">Имя</label>--}}
{{--                                                        <input type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="name" aria-describedby="nameHelp" value="Jane">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <div class="d-flex flex-column ms-0 ms-md-3">--}}
{{--                                                        <label for="lname" class="mt-2 mb-1 f-500 fs-12">Фамилия</label>--}}
{{--                                                        <input type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="lname" aria-describedby="lnameHelp" value="Cooper">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-4">--}}
{{--                                            <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-3 bg-white br-12 p-4">--}}
{{--                                <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-2">--}}
{{--                                    <p class="m-0 f-600 fs-20">Изменить телефон</p>--}}
{{--                                    <i class="fal fa-angle-down fs-24"></i>--}}
{{--                                </label>--}}
{{--                                <div class="collapse" id="profile-2">--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <input type="number" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="number" aria-describedby="numberHelp" value=123456>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-4">--}}
{{--                                        <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-3 bg-white br-12 p-4">--}}
{{--                                <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-3">--}}
{{--                                    <p class="m-0 f-600 fs-20">Изменить email</p>--}}
{{--                                    <i class="fal fa-angle-down fs-24"></i>--}}
{{--                                </label>--}}
{{--                                <div class="collapse" id="profile-3">--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <input type="email" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="email" aria-describedby="emailHelp" value="janecooper@gmail.com">--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-4">--}}
{{--                                        <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-3 bg-white br-12 p-4">--}}
{{--                                <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">--}}
{{--                                    <p class="m-0 f-600 fs-20">Изменить пароль</p>--}}
{{--                                    <i class="fal fa-angle-down fs-24"></i>--}}
{{--                                </label>--}}
{{--                                <div class="collapse" id="profile-4">--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <input type="password" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="password" aria-describedby="passwordHelp" value="janecooper">--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-4">--}}
{{--                                        <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mt-3 bg-white br-12 p-4">--}}
{{--                                <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-5">--}}
{{--                                    <p class="m-0 f-600 fs-20">Удалить учетную запись</p>--}}
{{--                                    <i class="fal fa-angle-down fs-24"></i>--}}
{{--                                </label>--}}
{{--                                <div class="collapse" id="profile-5">--}}
{{--                                    <div class="mt-3">--}}
{{--                                        <h4>Вы уверены, что хотите удалить свой аккаунт?</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-4">--}}
{{--                                        <button class="btn btn-danger py-2 px-4 br-12 text-white">Удалить аккаунт</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
