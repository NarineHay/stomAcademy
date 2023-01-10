<div class="col-12 col-lg-6 mt-4 mt-lg-6">
    <div>
        <h5 class="f-600 m-0">У вас есть вопросы?</h5>
    </div>
    <form class="order_input" wire:submit.prevent="submit" method="post">
        <div class="d-flex flex-column flex-lg-row mt-4">
            <div class="d-flex flex-column w-100 @if(strlen($name) > 0) focus @endif">
                <label for="exampleInputName" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">ФИО</label>
                <input id="exampleInputName" class="br-12 inputStyle p-2" wire:model="name">
            </div>
            @error('name')
                <span class="text-danger error">{{ $message }}</span>
            @enderror

            <div class="d-flex flex-column ms-0 ms-lg-3 mt-3 mt-lg-0 w-100 @if(strlen($email) > 0) focus @endif">
                <label for="exampleInputEmail2" class="mt-2 mb-1 text-secondary f-500 fs-12 m-0">Электронная почта</label>
                <input id="exampleInputEmail2" class="br-12 inputStyle p-2" wire:model="email">
            </div>
            @error('email')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex flex-column mt-3 d-none d-lg-block @if(strlen($question) > 0) focus @endif">
            <textarea class="br-12 inputStyle w-100" rows="5" wire:model="question"></textarea>
        </div>
        @error('question')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
        @if($success)
            <h5 class="text-center text-secondary mb-3">Email sent successfully</h5>
        @endif
        <div>
            <button class="btn btn-primary mt-4 br-12 py-2 px-5 f-600 fs-14">Задать вопрос</button>
        </div>
    </form>
</div>

