<div>
    <div class="bg-white d-flex justify-content-center flex-column align-items-center mt-6 br-12 d-none d-lg-block p-4">
        <p class="fs-20 f-600 text-center text-dark m-0">Авторизоваться</p>
        <div class="form-group">
            <label for="exampleInputEmail1" class="mt-4 mb-1 text-secondary f-500 fs-12 m-0">Электронная
                почта</label>
            <input type="email" wire:model="email" class="form-control text-secondary br-12" id="exampleInputEmail1"
                   aria-describedby="emailHelp">
        </div>
        <div class="form-group mt-3 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <label for="exampleInputPassword1"
                       class="mb-1 text-secondary f-500 fs-12 m-0">Пароль</label>
                <span class="text-primary fs-12 f-500 m-0">Забыли пароль?</span>
            </div>
            <div class="position-relative">
                <input wire:model="password" type="password" class="form-control br-12" id="exampleInputPassword1">
                <i class="fal fa-eye text-secondary position-absolute top-0 end-0 mt-2 me-2 cursor"></i>
            </div>
        </div>
        @if($error) <p class="p-0 mb-1 text-danger f-500 fs-12 m-0">{{ $error }}</p> @endif
        <button type="submit" wire:click="login" class="btn btn-primary mt-3 w-100 fs-14 f-600 py-2 br-12">Войти</button>
        <div class="mt-4 text-center">
            <span class="text-secondary me-1 fs-14 f-500 m-0">Впервые с нами?</span><span
                class="text-primary fs-14 f-500 m-0">Зарегистрироваться</span>
        </div>
    </div>
</div>
