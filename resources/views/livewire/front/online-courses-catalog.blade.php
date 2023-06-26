<div class="row">
    <div class="col-lg-10 col-12 mb-4 mb-lg-6">
        <div class="d-flex mt-6 py-lg-2">
            <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary cursor">Главная</span></a>
            <a><span class="fs-12 f-500 ms-3 main cursor">Онлайн обучение</span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0">Онлайн обучение</h2>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row mt-4 align-items-lg-center">
            <div class="d-flex education_tags mb-3 mb-lg-0 ">
                <a class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    {{ __("courses.tabs.all") }}
                </a>
                <a href="{{route('course.index')}}" class="px-2 px-md-3 py-2 fs-14 f-600 br-12 bg-light-gray ms-2 text-black btn_text">
                    Онлайн-курсы
                </a>
                <a href="{{route('webinar.index')}}" class="fs-14 py-2 px-2 f-600 br-12 bg-light-gray text-black ms-2 btn_text">
                    Вебинары
                </a>
                <a href="{{route('conference')}}" class="px-2 px-md-3 py-2 fs-14 active bg-white f-600 br-12 bg-light-gray text-black btn_text ms-2">
                    Онлайн-конференции
                </a>
            </div>

            <div class="col-12 d-flex d-lg-none justify-content-between mt-2 filter_buttons_mobile mb-2">
                <button class="fs-12 f-600 py-2 w-50 bg-transparent weqe"><a href="filter.html" class="text-black">Фильтр</a></button>
                <button class="fs-12 f-600 py-2 w-50 bg-transparent text-black"><a href="sorting.html" class="text-black">Сортировка</a></button>
            </div>

            <div class="d-flex align-items-center d-none d-lg-block">
                <div class="dropdown">
                    <span class="text-secondary fs-14 f-500">Сортировать по:</span>
                    <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button"
                            id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">Релевантности
                    </button>
                    <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                        <input wire:model="price" type="radio" id="vehicle111" name="price" class="mt-2 cursor">
                        <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">Цена</label><br>
                        <input wire:model="name" type="radio" id="vehicle1112" name="name" class="mt-2 cursor">
                        <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">Названия</label><br>
                        <input wire:model="popular" type="radio" id="vehicle3333" name="popular" class="mt-2 cursor">
                        <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">По популярность</label><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($courses as $course)
                <a href="{{ route("conference.show",$course->id) }}" style="color: inherit" class="col-xxl-3 col-lg-4 col-sm-6 col-12 mb-3 md-sm-0">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}" class="w-100" alt="addPic" style="width: 250px; height: 150px; object-fit: cover">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$course->directions->first()->title}}</p>
                            <p class="f-700 fs-16 courseTxt-index">{{$course->info->title}}</p>
                            <div class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center" style="min-height: 63px;">
                                <div class="d-flex align-items-center me-2">
                                    <div class="d-flex align-items-center">
                                        @foreach($course->getLectors()->take(3) as $k => $lector)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}" style="width: 48px;height: 48px;object-fit: cover" class="@if ($k>0) m-25 @endif rounded-circle border" alt="personPic">
                                        @endforeach
                                            @if($course->getLectors()->count() == 1)
                                                <p class="m-0 ms-2 fs-14 f-500">{{$course->getLectors()[0]->userinfo->fname}} {{$course->getLectors()[0]->userinfo->lname}}</p>
                                            @endif
                                    </div>
                                    <div>
                                        @if($course->getLectors()->count() > 1)
                                            <span class="fs-14 f-500 ms-2 ">{{ \App\Helpers\TEXT::lectorCount($course->getLectors()->count()) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-3 mt-xl-0 d-flex flex-row flex-xl-column">
                                    @if($course->sale)
                                        <span class="f-700 text-primary fs-16 me-2 text-nowrap">{{ $course->sale->html() }}</span>
                                        <span class="f-700 del text-secondary fs-16  text-nowrap">{{$course->price->html()}}</span>
                                    @else
                                        <span class="f-700 text-primary fs-16 me-1  text-nowrap">{{ $course->price->html() }}</span>
                                    @endif
                                </div>
                            </div>
                            <form class="dublicat_form" method="POST" action="{{route('addToCart')}}">
                                @csrf
                                <input type="hidden" value="{{ $course->id }}" name="id">
                                <input type="hidden" value="webinar" name="type">
                                <button class="btn btn-outline-primary w-100 f-600 br-12 mt-3 py-2 fs-14">Купить лекцию</button>
                            </form>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <button wire:click="loadNext"
                class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще
        </button>

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
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span>Области</span><i
                            class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-1">
                        <div class="mt-2">
                            <ul class="list-unstyled m-0 p-0">
                                @foreach($directions as $direction)
                                    <li>
                                        <input wire:model="selectedDirections" type="checkbox" id="dir-{{ $direction->id }}"
                                               value="{{ $direction->id }}" class="mt-2">
                                        <label for="dir-{{ $direction->id }}"
                                               class="f-500 fs-14">{{ $direction->title }}</label><br>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-3"><span>Оплата</span><i
                            class="fal fa-angle-right"></i></label>
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
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-2"><span>Преподаватели</span><i
                            class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-2">
                        <div class="mt-2">
                            @foreach($lectors as $user)
                                <input wire:model="selectedLectors" type="checkbox" id="lec-{{ $user->id }}"
                                       value="{{ $user->id }}" class="mt-2 cursor">
                                <label for="lec-{{ $user->id }}" class="f-500 fs-14 cursor">{{$user->name}}</label><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

