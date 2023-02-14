<div class="col-lg-9 pt-6">
    <div class="py-lg-6">
        <div class="d-flex justify-content-between">
            <h3 class="f-700 m-0">Мои курсы</h3>
            <div class="position-relative d-none d-lg-block">
                <input wire:model="search" class="form-control br-12" placeholder="Поиск">
                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="d-flex">
                <a href="{{route('personal.conferences')}}" class="fs-14 f-700 m-0 py-2 py-lg-3 text-black purchaseActive">Онлайн-конференции</a>
                <a href="{{route('personal.courses')}}" class="fs-14 f-500 m-0 ms-3 ms-lg-5 py-2 py-lg-3  text-black"
                   style="padding-bottom: 20px">Онлайн курсы</a>
            </div>
            <div class="py-2 py-lg-3">
                <div class="d-flex align-items-center d-none d-lg-block">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0"
                                type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">Направление
                        </button>
                        <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                            @foreach($directions as $direction)
                                <div class="form-check">
                                    <input type="checkbox" wire:model="selectedDirections" value="{{ $direction->id }}"
                                           class="mr-1 form-check-input">
                                    <label class="form-check-label">{{$direction->title}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none">
                <i class="fal fa-search"></i>
            </div>
        </div>
        <div class="row">
            @foreach($courses as $course)
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="bg-white br-12">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($course->image)}}"
                             class="w-100" alt="pic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 fs-10 m-0">{{$course->directions->title}}</p>
                            <p class="f-700 fs-16 m-0 mt-2">{{$course->info->title}}</p>
                            <div
                                class="d-flex flex-column flex-xl-row mt-2 justify-content-between align-items-xl-center">
                                <div class="d-flex align-items-center">
                                    @foreach($course->getLectors()->take(1) as $k => $lector)
                                        <img
                                            src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"
                                            width="42px" height="42px" class="me-2 rounded-circle"
                                            alt="personPic">
                                        <p class="m-0 fs-14 f-500">{{$lector->userinfo->fname}} {{$lector->userinfo->lname}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще</button>

            <div class="mt-4 d-flex justify-content-center d-lg-block">
                <nav>{{ $courses->links() }}</nav>
            </div>
        </div>
    </div>
</div>
