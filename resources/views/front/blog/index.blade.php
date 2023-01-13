@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-12 mb-5 mb-lg-6 pb-lg-4">
                <div class="d-flex mt-2 mt-md-6 pt-6 pt-md-2">
                    <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary">Главная</span></a>
                    <a><span class="fs-12 f-500 ms-3 main">Блог</span></a>
                </div>
                <div class="mt-3">
                    <h2 class="f-600">Блог</h2>
                </div>
                <div class="col d-flex d-lg-none mt-2 filter_buttons_mobile mb-2">
                    <button class="fs-12 f-600 py-2 w-50 bg-transparent w-100">Рубрики</button>
                </div>

                <livewire:front.blogs-catalog/>
            <div class="col-lg-2 col-12 position-relative" style="z-index: 100;">
                <div class="aside d-none d-lg-block">
                    <div class="position-fixed">
                        <div class="mt-4 ms-3 pt-5">
                            <h5 class="f-600 m-0">Рубрики</h5>
                            <div class="mt-4">
                                <label class="f-500 fs-16 d-flex align-items-center fg-label cursor"
                                       data-bs-toggle="collapse" data-bs-target="#fg-1"><i class="fal fa-angle-right"></i><span class="ms-4">Ортодонтия</span></label>
                                <div class="collapse" id="fg-1">
                                    <div class=" fs-14 f-500 mt-3 ms-4">
                                        <a href="#" class="text-black"><p>Детская стоматология</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                        <a href="#" class="text-black"><p>Маркетинг и менеджмент</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                    </div>

                                </div>
                                <label class="f-500 fs-16 d-flex align-items-center fg-label cursor mt-3"
                                       data-bs-toggle="collapse" data-bs-target="#fg-2"><i class="fal fa-angle-right"></i><span class="ms-4">Ортодонтия</span></label>
                                <div class="collapse" id="fg-2">
                                    <div class=" fs-14 f-500 mt-3 ms-4">
                                        <a href="#" class="text-black"><p>Детская стоматология</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                        <a href="#" class="text-black"><p>Маркетинг и менеджмент</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                    </div>
                                </div>
                                <label class="f-500 fs-16 d-flex align-items-center fg-label cursor mt-3"
                                       data-bs-toggle="collapse" data-bs-target="#fg-3"><i class="fal fa-angle-right"></i><span class="ms-4">Ортодонтия</span></label>
                                <div class="collapse" id="fg-3">
                                    <div class=" fs-14 f-500 mt-3 ms-4">
                                        <a href="#" class="text-black"><p>Детская стоматология</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                        <a href="#" class="text-black"><p>Маркетинг и менеджмент</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                    </div>
                                </div>
                                <label class="f-500 fs-16 d-flex align-items-center fg-label cursor mt-3"
                                       data-bs-toggle="collapse" data-bs-target="#fg-4"><i class="fal fa-angle-right"></i><span class="ms-4">Ортодонтия</span></label>
                                <div class="collapse show" id="fg-4">
                                    <div class=" fs-14 f-500 mt-3 ms-4">
                                        <a href="#" class="text-black"><p>Детская стоматология</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                        <a href="#" class="text-black"><p>Маркетинг и менеджмент</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                    </div>
                                </div>
                                <label class="f-500 fs-16 d-flex align-items-center fg-label cursor mt-3"
                                       data-bs-toggle="collapse" data-bs-target="#fg-5"><i class="fal fa-angle-right"></i><span class="ms-4">Ортодонтия</span></label>
                                <div class="collapse" id="fg-5">
                                    <div class=" fs-14 f-500 mt-3 ms-4">
                                        <a href="#" class="text-black"><p>Детская стоматология</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                        <a href="#" class="text-black"><p>Маркетинг и менеджмент</p></a>
                                        <a href="#" class="text-black"><p>Имплантология</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
