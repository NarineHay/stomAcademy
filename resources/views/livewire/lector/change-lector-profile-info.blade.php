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
                        <div class="d-flex flex-column w-100">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="w-100">
                                    <label for="name">Дата рождения</label>
                                    <input wire:model="birth_date" name="birth_date" type="date" id="date"
                                           class="form-control mt-1">
                                </div>
                            </div>
                            <div class="d-flex flex-column mt-3">
                                <label for="clinic">Ваша клиника</label>
                                <input wire:model="hospital" name="hospital" type="text" id="clinic"
                                       class="form-control mt-1">
                            </div>
                            <div class="d-flex flex-column flex-md-row mt-3">
                                <div class="w-100">
                                    <label for="per_cent">% От продаж</label>
                                    <input wire:model="per_of_sales" name="per_of_sales" type="text" id="per_cent"
                                           class="form-control mt-1">
                                </div>
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
                <p class="m-0 f-600 fs-20">Биография</p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-4">
                <div>
                    <div class="mt-4 d-flex flex-column flex-md-row">
                        <div class="d-flex flex-column w-100">
                            <div class="d-flex flex-column flex-md-row">
                                <div class="w-100">
                                    <textarea wire:model="biography" class="summernote w-100"
                                              name="biography"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button wire:click="saveBiography" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 bg-white br-12 p-4" wire:ignore>
            <label class="d-flex justify-content-between" data-bs-toggle="collapse" data-bs-target="#profile-5">
                <p class="m-0 f-600 fs-20">Добавить интересы</p>
                <i class="fal fa-angle-down fs-24"></i>
            </label>
            <div class="collapse" id="profile-5">
                <div class="mt-4 d-flex flex-column justify-content-between">
                    <div class="direction-list">
                        @foreach($directions as $direction)
                            <div class="form-check">
                                <input type="checkbox" wire:model="userDirections" value="{{ $direction->id }}"
                                       @if( $user->directions->where("direction_id",$direction->id)->count()) checked @endif
                                       class="mr-1 form-check-input">
                                <label class="form-check-label">{{$direction->title}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <button wire:click="directions" class="btn btn-primary py-2 px-4 br-12">Сохранить</button>
                    </div>
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
</div>

