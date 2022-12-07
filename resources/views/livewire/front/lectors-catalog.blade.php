<div class="row">
    <div class="col-lg-10 col-12 mb-5 mb-lg-6">
        <div class="d-flex mt-6 py-2">
            <a><span class="fs-12 f-500 text-secondary">Главная</span></a>
            <a><span class="fs-12 f-500 ms-4 main">Лекторы</span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0">Лекторы</h2>
        </div>
        <div class="row mt-4">
            @foreach($lectors as $lector)
                <div class="col-xxl-55 col-lg-3 col-md-4 col-6 mb-3">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->lector->photo) }}" class="lector_card_photo w-100" alt="lecturerPic">
                        <div class="p-3">
                            <p class="fs-20 f-700">{{ $lector->name }}</p>
                            <p class="fs-14 f-500 text-secondary">{{ $lector->lector->specialization }}</p>
                            <i class="fal fa-layer-group"></i><span class="ms-2 fs-14 f-500">{{ $lector->webinars_count }} лекции</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 d-lg-none show_more_btn text-black bg-transparent">Показать еще</button>

        <div class="mt-4 d-flex justify-content-center d-lg-block">
            <nav>
                {{ $lectors->links() }}
            </nav>
        </div>
    </div>
    <div class="col-lg-2 col-12 position-relative" style="z-index: 100">
        <div class="aside d-none d-lg-block">
            <div class="position-fixed">
                <div class="mt-4 ms-3 pt-5">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span>Направление</span><i class="fal fa-angle-right"></i></label>
                    <div class="mt-2 collapse show" id="fg-1">
                        <ul class="list-unstyled m-0 p-0">
                            @foreach($directions as $direction)
                                <li>
                                    <input wire:model="selectedDirections" type="checkbox" id="dir-{{ $direction->id }}" value="{{ $direction->id }}" class="mt-2">
                                    <label for="dir-{{ $direction->id }}" class="f-500 fs-14">{{ $direction->title }}</label><br>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
