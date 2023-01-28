<div class="mt-4">
    <div class="mt-3 bg-white br-12 p-4 ">
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">
            <p class="m-0 f-600 fs-20">Изменить личные данные</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-1">
            <div wire:ignore>
                <div class="mt-4">
                    <div class="d-flex">
                        <div>
                            <img src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image)}}" alt="pic" style="width: 67px; height: 67px;" class="rounded-circle">
                        </div>
                        <div class="ms-3 d-flex flex-column justify-content-center">
                            <p class="text-secondary fs-14 f-500 m-0">Изменить фото</p>
                            <p class="text-secondary fs-14 f-500 m-0 mt-2">Удалить</p>
                        </div>
                    </div>
                    <div class="d-flex mt-4 flex-column flex-md-row">
                        <div>
                            <div class="d-flex flex-column">
                                <label for="name" class="mt-2 mb-1 f-500 fs-12">Имя</label>
                                <input wire:model="fname" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="fname" name="fname" aria-describedby="nameHelp" value="{{$user->userinfo->fname}}">
                            </div>
                        </div>
                        <div>
                            <div class="d-flex flex-column ms-0 ms-md-3">
                                <label for="lname" class="mt-2 mb-1 f-500 fs-12">Фамилия</label>
                                <input wire:model="lname" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="lname" name="lname" aria-describedby="lnameHelp" value="{{$user->userinfo->lname}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button wire:click="changeName" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-2">
            <p class="m-0 f-600 fs-20">Изменить телефон</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse" id="profile-2">
            <div class="mt-3">
                <input wire:model="phone" name="phone" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="phone" aria-describedby="numberHelp" value={{$user->userinfo->phone}}>
            </div>
            <div class="mt-4">
                <button wire:click="changePhone" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-3">
            <p class="m-0 f-600 fs-20">Изменить email</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse" id="profile-3">
            <div class="mt-3">
                <input wire:model="email" name="email" type="email" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
            </div>
            <div class="mt-4">
                <button wire:click="changeEmail" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
            <p class="m-0 f-600 fs-20">Изменить пароль</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse" id="profile-4">
            <div class="mt-3">
                <input wire:model="password" name="password" type="password" class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="password" aria-describedby="passwordHelp">
            </div>
            <div class="mt-4">
                <button wire:click="changePassword" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-5">
            <p class="m-0 f-600 fs-20">Удалить учетную запись</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse" id="profile-5">
            <div class="mt-3">
                <h4>Вы уверены, что хотите удалить свой аккаунт?</h4>
            </div>
            <div class="mt-4">
                <a href="{{route('personal.deleteAccount',\Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-danger py-2 px-4 br-12 text-white">Удалить аккаунт</a>
            </div>
        </div>
    </div>
</div>
