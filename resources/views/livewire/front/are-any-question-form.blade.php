<div>
    <form wire:submit.prevent="submit" class="pe-lg-5 pe-0">
        <div>
            <input type="text" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="{{ __("courses.contacts.form.name") }}"
                   wire:model="name">
        </div>
        @error('name')
        <span class="text-danger error">{{ $message }}</span>
        @enderror
        <div>
            <input type="email" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="{{ __("courses.contacts.form.email") }}"
                   wire:model="email">
        </div>
        @error('email')
        <span class="text-danger error">{{ $message }}</span>
        @enderror
        <div>
            <input type="tel" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="{{ __("courses.contacts.form.phone") }}" wire:model="phone">
        </div>
        @error('phone')
        <span class="text-danger error">{{ $message }}</span>
        @enderror
        <div>
            <input type="text" class="form-control mb-2"
                   aria-describedby="inputGroup-sizing-default"
                   placeholder="{{ __("courses.contacts.form.q") }}" wire:model="question">
        </div>
        @error('question')
        <span class="text-danger error">{{ $message }}</span>
        @enderror

        @if($success)
            <h5 class="text-center text-secondary my-3">{{ __("courses.contacts.form.email_sent") }}</h5>
        @endif
        <button type="submit"
            class="btn btn-primary d-flex mx-auto justify-content-center align-content-center w-100 fs-18 f-600 br-12 mb-5 py-3 lh-22 mt-5"
            style="max-width: 737px;">{{ __("courses.contacts.form.button_question") }}
        </button>

    </form>
</div>
