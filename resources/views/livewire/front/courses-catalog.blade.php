<div class="row">
    <div class="col-lg-10 col-12 mb-4 mb-lg-6">
        <div class="d-flex mt-6 py-lg-2">
            <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary cursor">{{ __("header.menu.home") }}</span></a>
            <a><span class="fs-12 f-500 ms-3 main cursor">{{ __("header.menu.courses") }}</span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0">{{ __("courses.h1") }}</h2>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row mt-4 align-items-lg-center">
            <div class="d-flex education_tags mb-3 mb-lg-0">
                <button class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    <a href="#" class="text-black">{{ __("courses.tabs.all") }}</a>
                </button>
                <button class="fs-14 py-2 px-2 f-600 br-12 active bg-white text-black ms-2 btn_text">
                    <a href="{{route('course.index')}}" class="text-black">{{ __("courses.tabs.courses") }}</a>
                </button>
                <button class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    <a href="{{route('webinar.index')}}" class="text-black">{{ __("courses.tabs.webinars") }}</a>
                </button>
                <button class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    <a href="{{route('conference')}}" class="text-black">{{ __("courses.tabs.online") }}</a>
                </button>
            </div>

            <div class="col-12 d-flex d-lg-none justify-content-between mt-2 filter_buttons_mobile mb-2">
                <button class="fs-12 f-600 py-2 w-50 bg-transparent"><a href="filter.html" class="text-black">Фильтр</a></button>
                <button class="fs-12 f-600 py-2 w-50 bg-transparent text-black"><a href="sorting.html" class="text-black">Сортировка</a></button>
            </div>

            <div class="d-flex align-items-center d-none d-lg-block">
                <div class="dropdown">
                    <span class="text-secondary fs-14 f-500">{{ __("courses.sort.title") }}</span>
                    <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">Релевантности
                    </button>
                    <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                        <input type="radio" id="vehicle111" name="vehicle" class="mt-2 cursor">
                        <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.price") }}</label><br>
                        <input type="radio" id="vehicle1112" name="vehicle" class="mt-2 cursor">
                        <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.name") }}</label><br>
                        <input type="radio" id="vehicle3333" name="vehicle" class="mt-2 cursor">
                        <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.pop") }}</label><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($courses as $course)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3 md-sm-0">
                    <a class="bg-white br-12 d-block" style="color: inherit" href="{{ route("course.show",$course->id) }}">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}" style="width: 100%; height: 175px; object-fit: cover" alt="addPic">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$course->directions->first()->title}}</p>
                            <span><p style="min-height: 96px;" href="{{route('course.show',$course->id)}}" class="text-black f-700 fs-16">{{$course->info->title}}</p></span>

                            <div class="mt-2 d-flex justify-content-between">
                                <div class="d-flex justify-content-between w-100">
                                    <span><i class="far fa-clock me-1"></i> <span class="me-2 fs-14 f-500">{{$course->getDuration()}}</span></span>
{{--                                    <span><i class="fa-solid fa-video"></i> <span class="ms-1 fs-14 f-500">{{$course->webinars_count}} </span></span>--}}
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">
                                    <div class="mb-3 mb-md-0">
                                        @if($course->sale)
                                            <span class="f-700 text-primary fs-16 me-1">{{ $course->sale->rub }} ₽</span>
                                            <del class="f-700 text-secondary fs-16">{{$course->price->rub}} ₽</del>
                                        @else
                                            <span class="f-700 text-primary fs-16 me-1">{{ $course->price->rub }} ₽</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
{{--                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mt-3">--}}
{{--                                <div class="mb-3 mb-md-0">--}}
{{--                                    @if($course->sale)--}}
{{--                                        <span class="f-700 text-primary fs-16 me-1">{{ $course->sale->rub }} ₽</span>--}}
{{--                                        <del class="f-700 text-secondary fs-16">{{$course->price->rub}} ₽</del>--}}
{{--                                    @else--}}
{{--                                        <span class="f-700 text-primary fs-16 me-1">{{ $course->price->rub }} ₽</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <form method="POST" class="dublicat_form" action="{{ route('addToCart') }}">
                                @csrf
                                <input type="hidden" value="{{ $course->id }}" name="id">
                                <input type="hidden" value="course" name="type">
                                <button class="btn btn-outline-primary w-100 br-12 px-3 py-2 fs-14 f-600">
                                    {{ __("index.buy") }}
                                </button>
                            </form>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <button wire:click="loadNext" class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">{{ __("index.show_more") }}</button>

        <div class="mt-4 d-flex justify-content-center d-lg-block">
            <nav>
                {{ $courses->links() }}
            </nav>
        </div>
    </div>
    <div wire:ignore class="col-lg-2 col-12 position-relative" style="z-index: 100;">
        <div class="aside d-none d-lg-block">
            <div >
                <div class="mt-4 ms-3 pt-5">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span>{{ __("courses.filters.directions") }}</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-1">
                        <div class="mt-2">
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
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-3"><span>{{ __("courses.filters.price") }}</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-3">
                        <div class="mt-2">
                            <input type="checkbox" id="vehicle13" name="vehicle1" class="mt-2 cursor">
                            <label for="vehicle13" class="f-500 fs-14 cursor">Оплаченный</label><br>
                            <input type="checkbox" id="vehicle14" name="vehicle2" class="mt-2 cursor">
                            <label for="vehicle14" class="f-500 fs-14 cursor">Бесплатно</label><br>
                        </div>

                    </div>
                </div>
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor" data-bs-toggle="collapse" data-bs-target="#fg-2"><span>{{ __("courses.filters.lector") }}</span><i class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-2">
                        <div class="mt-2">
                            @foreach($lectors as $user)
                                <input wire:model="selectedLectors" type="checkbox" id="lec-{{ $user->id }}" value="{{ $user->id }}" class="mt-2 cursor">
                                <label for="lec-{{ $user->id }}" class="f-500 fs-14 cursor">{{$user->name}}</label><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


