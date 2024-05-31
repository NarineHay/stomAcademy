<div class="modal-content">
    <form wire:submit.prevent="submit" method="post">
        <div class="w-100">
            <img class="w-100" src="{{asset('dist/image/letter.jpg')}}">
        </div>
        <div class="modal-header">
            <h1 class="modal-title fs-5 f-700" id="lectorFollowModalLabel">{{ __("modals.follow.h1") }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="fs-16 mb-3" style="margin-top: -30px;">{{ __("modals.follow.text") }}</p>
            <input wire:model="name" type="text" class=" form-control py-3 mb-4 @if(strlen($name) > 0) focus @endif" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" placeholder="{{ __("modals.name") }}">
            @error('name')
                <span class="text-danger error" style="position:relative; top: -25px">{{ $message }}</span>
            @enderror

            <input wire:model="email" type="email" class="form-control py-3 mb-0 @if(strlen($email) > 0) focus @endif" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-default" placeholder="{{ __("modals.email") }}">
            @error('email')
                <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>

        @if($success)
            <h5 class="text-center text-secondary mb-3 success_h5">{{ __("modals.to_by_lector.success") }}</h5>
        @endif
        <div class="modal-footer">
            <button class="btn btn-primary w-100 f-600 fs-14 px-4 py-3 br-12 white-space send_mail">{{ __("modals.to_by_lector.button") }}</button>
        </div>

    </form>
</div>
