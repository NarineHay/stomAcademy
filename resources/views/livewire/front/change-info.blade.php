<div class="mt-4">
    <div class="mt-3 bg-white br-12 p-4 ">
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">
            <p class="m-0 f-600 fs-20">{{ __("profile.info.page_title") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-1">
            <div>
                <div class="mt-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ $avatar }}" alt="pic" style="width: 67px; height: 67px;"
                             class="rounded-circle image_update_img">

                        <form wire:submit.prevent="changeImage" class="image_update_form d-flex flex-column gap-1 ms-3">
                            <label class="text-secondary fs-14 f-500 m-0 text-sm-start" for="inputTag"
                                   style="cursor: pointer">{{ __("profile.info.change_photo") }}
                                <input wire:model="file" name="image" id="inputTag" type="file"
                                       class="image_update_input" hidden/>
                            </label>

                            <label wire:click='deleteImage' class="text-secondary fs-14 f-500 m-0 text-sm-start"
                                   style="cursor: pointer">{{ __("profile.info.delete") }}
                            </label>

                        <button type="submit" class="d-none">Upload</button>
                        </form>
                    </div>

                    <div class="d-flex mt-4 flex-column flex-md-row">
                        <div>
                            <div class="d-flex flex-column">
                                <label for="name" class="mt-2 mb-1 f-500 fs-12">{{ __("profile.info.f_name") }}</label>
                                <input wire:model="fname" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600"
                                       id="fname" name="fname" aria-describedby="nameHelp">
                            </div>
                        </div>
                        <div>
                            <div class="d-flex flex-column ms-0 ms-md-3">
                                <label for="lname" class="mt-2 mb-1 f-500 fs-12">{{ __("profile.info.l_name") }}</label>
                                <input wire:model="lname" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600"
                                       id="lname" name="lname" aria-describedby="lnameHelp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button wire:click="changeName" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.info.save") }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-1">
            <p class="m-0 f-600 fs-20">{{ __("profile.profile.main_info") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-1">
            <div>
                <div class="mt-4 d-flex flex-column flex-md-row">
                    <div class="d-flex flex-column w-100">
                        <div class="d-flex flex-column">
                            <label for="fio">{{ __("profile.profile.fio") }}</label>
                            <input wire:model='name' name="name" type="text" id="fio" class="form-control mt-1" >
                        </div>
                        <div class="d-flex mt-3 flex-column flex-md-row">
                            <div class="w-100">
                                <label for="name">{{ __("profile.profile.bday") }}</label>
                                <input wire:model="birth_date" name="birth_date" type="date" id="date" class="form-control mt-1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <button wire:click="savePersonalData" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.save") }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
            <p class="m-0 f-600 fs-20">{{ __("profile.profile.directions") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-4">
            <div class="mt-4 d-flex flex-column justify-content-between">
                <div class="direction-list">
                    @foreach($directions as $direction)
                        <div class="form-check">
                            <input type="checkbox" wire:model="userDirections" value="{{ $direction->id }}"
                                   @if( $user->directions->where("direction_id",$direction->id)->count()) checked @endif
                                   class="mr-1 form-check-input"><label class="form-check-label">{{$direction->title}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3">
                    <button wire:click="directions" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.save") }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-2">
            <p class="m-0 f-600 fs-20">{{ __("profile.info.change_phone") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-2">
            <div class="mt-3">
                <input wire:model="phone" name="phone" type="text" class="br-12 inputStyle px-3 py-2 fs-14 f-600"
                       id="phone" aria-describedby="numberHelp">
            </div>
            <div class="mt-4">
                <button wire:click="changePhone" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.info.save") }}</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-3">
            <p class="m-0 f-600 fs-20">{{ __("profile.info.change_email") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-3">
            <div class="mt-3">
                <input wire:model="email" name="email" type="email" class="br-12 inputStyle px-3 py-2 fs-14 f-600"
                       id="email" aria-describedby="emailHelp">
            </div>
            <div class="mt-4">
                <button wire:click="changeEmail" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.info.save") }}</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-4">
            <p class="m-0 f-600 fs-20">{{ __("profile.info.change_password") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-4">
            <div class="mt-3">
                <input wire:model="password" name="password" type="password"
                       class="br-12 inputStyle px-3 py-2 fs-14 f-600" id="password" aria-describedby="passwordHelp">
            </div>
            <div class="mt-4">
                <button wire:click="changePassword" class="btn btn-primary py-2 px-4 br-12">{{ __("profile.info.save") }}</button>
            </div>
        </div>
    </div>

    <div class="mt-3 bg-white br-12 p-4" wire:ignore>
        <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-5">
            <p class="m-0 f-600 fs-20">{{ __("profile.info.delete_account") }}</p>
            <i class="fal fa-angle-down fs-24"></i>
        </label>
        <div class="collapse show" id="profile-5">
            <div class="mt-3">
                <h4>{{ __("profile.info.delete_account_text") }}</h4>
            </div>
            <div class="mt-4">
                <a href="{{route('personal.deleteAccount',\Illuminate\Support\Facades\Auth::user()->id)}}"
                   class="btn btn-danger py-2 px-4 br-12 text-white">{{ __("profile.info.delete") }}</a>
            </div>
        </div>
    </div>
    @if($success)
        <div data-mdb-delay="5000" data-mdb-autohide="true"
             class="alert alert-success alert-dismissible fade show mt-3 profile_alert" role="alert">
            <strong>{{ $success }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
