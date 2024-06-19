<div>
    <form wire:submit.prevent="submit">

        <label
            class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.name") }} </label>
        <input type="text" class="form-control mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="{{ __("courses.reg.form.placeholder.name") }}"
               wire:model="name">
        <div>
            @error('name')
            <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>

        <label
            class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.email") }}</label>
        <input type="email" class="form-control mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="{{ __("courses.reg.form.placeholder.email") }}"
               wire:model="email">
        <div>
            @error('email')
            <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>

        <label
            class="text-white fs-14 lh-14 fw-normal">{{ __("courses.reg.form.label.phone") }}</label>
        <input type="tel"  class="form-control input_tel_registr mb-3 " aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"
               placeholder="{{ __("courses.reg.form.placeholder.phone") }}"
               wire:model="phone">
        <div>
            @error('phone')
            <span class="text-danger error">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" value="{{$item_id}}" name="course_id">
        <input type="hidden" value="{{$type}}" name="type">

        @if($success)
            <h5 class="text-center text-secondary my-3">{{ __("courses.contacts.form.email_sent") }}</h5>
        @endif
        <button type="submit"
            class="btn btn-outline-primary btn-reg w-100 fs-18 f-600 br-12 lh-23 text-white py-3 mt-3"
            style="background-color: #5CB0FF;">{{ __("courses.reg.form.button") }}
        </button>
    </form>
</div>
