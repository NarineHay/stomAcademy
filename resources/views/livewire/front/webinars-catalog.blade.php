<div>
    <div class="row mt-4">
        @foreach($data['webinar'] as $webinar)
            <div class="col-xxl-55 col-lg-3 col-md-4 col-sm-6 col-12 mb-3 md-sm-0">
                <div class="bg-white br-12">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}" class="w-100" alt="addPic">
                    <div class="p-3">
                        <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$webinar->directions->title}}</p>
                        <p class="f-700 fs-16">{{$webinar->info->title}}</p>
                        <div class="mt-2 d-flex flex-lg-column flex-xl-row">
                            <div>
                                <i class="far fa-clock me-1"></i>
                                <span class="me-2 fs-14 f-500">{{$webinar->duration}} мин</span>
                            </div>
                        <div class="mt-lg-2 mt-xl-0">
                            <i class="far fa-tasks me-1"></i>
                            <span class="fs-14 f-500">3 видео</span>
                        </div>
                        </div>
                        <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->userinfo->image) }}" class="me-2 rounded-circle" alt="customerPic" style="height: 40px; width: 40px">
                                <p class="m-0 fs-14 f-500">{{$webinar->user->name}}</p>
                            </div>
                            <div class="mt-3 mt-xl-0">
                                <span class="f-700 text-primary fs-16 white-space">{{$webinar->price->rub}} ₽</span>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще</button>

    <div class="mt-4 d-flex justify-content-center d-lg-block">
        <nav>
            {{ $data['webinar']->links() }}
        </nav>
    </div>
</div>


{{--<div class="mt-4 d-flex justify-content-center d-lg-block">--}}
{{--    <nav>--}}
{{--        <ul class="pagination d-flex align-items-center">--}}
{{--            <li class="page-item"><a href="#" class="text-black"><i class="fal fa-angle-left"></i></a></li>--}}
{{--            <li class="page-item ms-5"><a class="btn btn-outline-primary rounded-circle bg-light-gray text-dark"--}}
{{--                                          style="border: none" href="#">1</a></li>--}}
{{--            <li class="page-item ms-3"><a class="btn btn-outline-primary rounded-circle text-white bg-primary"--}}
{{--                                          style="border: none" href="#">2</a></li>--}}
{{--            <li class="page-item ms-3"><a class="btn btn-outline-primary rounded-circle bg-light-gray text-dark"--}}
{{--                                          style="border: none" href="#">3</a></li>--}}
{{--            <li class="page-item ms-5"><a href="#" class="text-black"><i class="fal fa-angle-right"></i></a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--</div>--}}
