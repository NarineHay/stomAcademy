<div class="col-lg-9">
    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
        <div class="d-flex justify-content-between">
            <h3 class="f-700 m-0">Профиль</h3>
        </div>
        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
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
                                <input wire:model='name' name="name" type="text" id="fio" class="form-control mt-1" value="{{$user->name}}">
                            </div>
                            <div class="d-flex mt-3 flex-column flex-md-row">
                                <div class="w-100">
                                    <label for="fname">Имя</label>
                                    <input wire:model='fname' name="fname" type="text" id="fname" class="form-control mt-1" value="{{$user->userinfo->fname ?? ''}}">
                                </div>
                                <div class="w-100 ms-md-2 mt-3 mt-md-0">
                                    <label for="lname">Фамилия</label>
                                    <input wire:model='lname' name='lname' type="text" id="lname" class="form-control mt-1" value="{{$user->userinfo->lname ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex mt-3 flex-column flex-md-row">
                                <div class="w-100">
                                    <label for="name">Дата рождения</label>
                                    <input wire:model="birth_date" name="birth_date" type="date" id="date" class="form-control mt-1" value="{{$user->userinfo->birth_date ?? ''}}">
                                </div>
                                <div class="w-100 ms-md-2 mt-3 mt-md-0">
                                    <label for="num">Ваш телефон</label>
                                    <input wire:model="phone"  type="text" id="num"  class="form-control mt-1" value="{{$user->userinfo->phone ?? ''}}">
                                </div>
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="clinic">Ваша клиника</label>
                                <input wire:model="hospital" name="hospital" type="text" id="clinic" class="form-control mt-1">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-secondary text-white br-12 p-2">Изменить аватар</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button wire:click="savePersonalData" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-2">
                <p class="m-0 f-600 fs-20">Добавить рабочий стаж</p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-2">
                <div class="mt-4">
                    <button wire:click="experience" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                </div>
            </div>
        </div>

        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-3">
                <p class="m-0 f-600 fs-20">Добавить образование</p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-3">
                <div class="mt-4">
                    <button wire:click="education" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                </div>
            </div>
        </div>

        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
                <p class="m-0 f-600 fs-20">Добавить интересы</p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-4">
                <div class="mt-4 d-flex flex-column justify-content-between">
                    <div class="direction-list">
                        @foreach($directions as $direction)
                            <div>
                                <input type="checkbox" id="vehicle1" name="vehicle1" class="mt-2 cursor">
                                <label for="vehicle1" class="f-500 fs-16 ms-2 cursor">{{$direction->title}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <button wire:click="directions" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
