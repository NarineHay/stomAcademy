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
                        <div class="d-flex justify-content-between">
                            <h3 class="f-700 m-0">Профиль</h3>
                        </div>
                        <div class="mt-3 bg-white br-12 p-4">
                            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">
                                <p class="m-0 f-600 fs-20">Добавить основную информацию</p>
                                <i class="fal fa-angle-down fs-24"></i>
                            </label>
                            <div class="collapse" id="profile-1">
                                <div>
                                    <div class="mt-4 d-flex flex-column flex-md-row">
                                        <div class="mt-4 d-flex flex-column w-100">
                                            <div class="d-flex flex-column">
                                                <label for="fio">ФИО (для сертификата)</label>
                                                <input type="text" id="fio" class="form-control mt-1">
                                            </div>
                                            <div class="d-flex mt-3 flex-column flex-md-row">
                                                <div class="w-100">
                                                    <label for="name">Имя</label>
                                                    <input type="text" id="name" class="form-control mt-1" value="Алексей">
                                                </div>
                                                <div class="w-100 ms-md-2 mt-3 mt-md-0">
                                                    <label for="lname">Фамилия</label>
                                                    <input type="text" id="lname" class="form-control mt-1">
                                                </div>
                                            </div>
                                            <div class="d-flex mt-3 flex-column flex-md-row">
                                                <div class="w-100">
                                                    <label for="name">Дата рождения</label>
                                                    <input type="date" id="date" name="birth_date" class="form-control mt-1" value="{{$user->userinfo->birth_date}}">
                                                </div>
                                                <div class="w-100 ms-md-2 mt-3 mt-md-0">
                                                    <label for="num">Ваш телефон</label>
                                                    <input type="number" id="num" name="phone" class="form-control mt-1">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mt-3">
                                                <label for="clinic">Ваша клиника</label>
                                                <input type="text" id="clinic" class="form-control mt-1">
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn btn-secondary text-white br-12 p-2">Изменить аватар</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 bg-white br-12 p-4">
                            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-2">
                                <p class="m-0 f-600 fs-20">Добавить pабочий стаж</p>
                                <i class="fal fa-angle-down fs-24"></i>
                            </label>
                            <div class="collapse" id="profile-2">
                                <div class="mt-4">
                                    <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 bg-white br-12 p-4">
                            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-3">
                                <p class="m-0 f-600 fs-20">Добавить oбразование</p>
                                <i class="fal fa-angle-down fs-24"></i>
                            </label>
                            <div class="collapse" id="profile-3">
                                <div class="mt-4">
                                    <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 bg-white br-12 p-4">
                            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
                                <p class="m-0 f-600 fs-20">Добавить интересы</p>
                                <i class="fal fa-angle-down fs-24"></i>
                            </label>
                            <div class="collapse" id="profile-4">
                                <div class="mt-4 d-flex flex-column flex-xl-row justify-content-between">
                                    <div>
                                        <div>
                                            <input type="checkbox" id="vehicle1" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle1" class="f-500 fs-16 ms-2 cursor">Терапия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle2" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle2" class="f-500 fs-16 ms-2 cursor">Ортопедия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle3" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle3" class="f-500 fs-16 ms-2 cursor">Ортодонтия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle4" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle4" class="f-500 fs-16 ms-2 cursor">Хирургия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle6" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle6" class="f-500 fs-16 ms-2 cursor">Детская стоматология</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle7" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle7" class="f-500 fs-16 ms-2 cursor">Общая стоматология</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <input type="checkbox" id="vehicle9" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle9" class="f-500 fs-16 ms-2 cursor">Эндодонтия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle10" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle10" class="f-500 fs-16 ms-2 cursor">Эстетика и реставрация</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle11" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle11" class="f-500 fs-16 ms-2 cursor">Пародонтология</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle12" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle12" class="f-500 fs-16 ms-2 cursor">Функциональная стоматология</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle13" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle13" class="f-500 fs-16 ms-2 cursor">Имплантология</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <input type="checkbox" id="vehicle14" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle14" class="f-500 fs-16 ms-2 cursor">Протезирование на имплантах</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle15" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle15" class="f-500 fs-16 ms-2 cursor">Виниры</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle16" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle16" class="f-500 fs-16 ms-2 cursor">Остеопатия</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle17" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle17" class="f-500 fs-16 ms-2 cursor">Зубной техник</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="vehicle18" name="vehicle1" class="mt-2 cursor">
                                            <label for="vehicle18" class="f-500 fs-16 ms-2 cursor">Маркетинг и управление</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
