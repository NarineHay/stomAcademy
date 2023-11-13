<div class="row">
    <div class="col-lg-10 col-12 mb-4 mb-lg-6">
        <div class="d-flex mt-2 mt-md-3 py-2">
            <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary cursor">{{ __("header.menu.home") }}</span></a>
            <a><span class="fs-12 f-500 ms-3 main cursor">{{ __("courses.h1") }}</span></a>
        </div>
        <div class="mt-3">
            <h2 class="f-600 m-0">{{ __("courses.h1") }}</h2>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row mt-4 mb-4 align-items-lg-center">
            <div class="d-flex education_tags mb-3 mb-lg-0 e-learning-menu flex-wrap-wrap sdad">
                <a href="{{ route("catalog") }}"
                   class="d-flex justify-content-center align-items-center px-2 px-md-3 py-2 fs-14 f-600 br-12 @if($type == "catalog") active bg-white @else bg-light-gray @endif text-black ms-0 btn_text">
                    {{ __("courses.tabs.all") }}
                </a>
                <a href="{{route('course.index')}}"
                   class=" d-flex justify-content-center align-items-center px-2 px-md-3 py-2 fs-14 f-600 br-12 @if($type == "courses") active bg-white @else bg-light-gray @endif ms-2 text-black btn_text">
                    {{ __("courses.tabs.courses") }}
                </a>
                <a href="{{route('webinar.index')}}"
                   class="d-flex justify-content-center align-items-center fs-14 py-2 px-2 f-600 br-12 @if($type == "webinars") active bg-white @else bg-light-gray @endif text-black ms-2 btn_text">
                    {{ __("courses.tabs.webinars") }}
                </a>
                <a href="{{route('conference')}}"
                   class="d-flex justify-content-center align-items-center px-2 px-md-3 py-2 fs-14 f-600 br-12 @if($type == "conferences") active bg-white @else bg-light-gray @endif text-black btn_text ms-2">
                    {{ __("courses.tabs.online") }}
                </a>
            </div>

            <div class="col-12 d-flex d-lg-none justify-content-between mt-2 filter_buttons_mobile mb-2">


                <button class="fs-12 f-600 py-2 w-50 bg-transparent" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><a
                        href="filter.html" class="text-black">Фильтр</a></button>

                <button class="fs-12 f-600 py-2 w-50 bg-transparent text-black dropdown-toggle" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><a href="sorting.html" class="text-black">Сортировка</a>
                </button>
                <ul class="dropdown-menu p-3">
                    <input wire:model="sortBy" value="price" type="radio" id="vehicle111" name="sort"
                           class="mt-2 cursor">
                    <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">Цена</label><br>
                    <input wire:model="sortBy" value="title" type="radio" id="vehicle1112" name="sort"
                           class="mt-2 cursor">
                    <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">Названия</label><br>
                    <input wire:model="sortBy" value="popularity" type="radio" id="vehicle3333" name="sort"
                           class="mt-2 cursor">
                    <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">По популярность</label><br>
                </ul>
            </div>
            <div class="collapse" id="collapseExample">

                <div>
                    <div class="mt-4 ms-3 ">
                        <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                               data-bs-toggle="collapse" data-bs-target="#fg-1"><span>{{ __("courses.filters.directions") }}</span><i
                                class="fal fa-angle-right"></i></label>
                        <div class="collapse " id="fg-1">
                            <div class="mt-2">
                                <ul class="list-unstyled m-0 p-0">
                                    @foreach($directions as $direction)
                                        <li>
                                            <input wire:model="selectedDirections" type="checkbox"
                                                   id="dir-{{ $direction->id }}" value="{{ $direction->id }}"
                                                   class="mt-2">
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
                               data-bs-toggle="collapse" data-bs-target="#fg-3"><span>{{ __("courses.filters.price") }}</span><i
                                class="fal fa-angle-right"></i></label>
                        <div class="collapse" id="fg-3">
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
                               data-bs-toggle="collapse" data-bs-target="#fg-2"><span>{{ __("courses.menu.lectors") }}</span><i
                                class="fal fa-angle-right"></i></label>
                        <div class="collapse" id="fg-2">
                            <div class="mt-2">
                                @foreach($lectors as $user)
                                    <input wire:model="selectedLectors" type="checkbox" id="lec-{{ $user->id }}"
                                           value="{{ $user->id }}" class="mt-2 cursor">
                                    <label for="lec-{{ $user->id }}"
                                           class="f-500 fs-14 cursor">{{ $user->userInfo->fullName }}</label><br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex align-items-center d-none d-lg-block">
                <div class="dropdown">
                    <span class="text-secondary fs-14 f-500">{{ __("courses.sort.title") }}:</span>
                    <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0" type="button"
                            id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">@if($sortBy) @switch($sortBy) @case("default") {{ __("courses.sort.price") }} @break
                        @case("price") {{ __("courses.sort.price") }} @break
                        @case("title") {{ __("courses.sort.name") }} @break
                        @case("popularity") {{ __("courses.sort.pop") }} @break @endswitch @else {{ __("courses.sort.price") }} @endif
                    </button>
                    <div class="dropdown-menu p-3 border-0" aria-labelledby="dropdownMenuButton1">
                        <input wire:model="sortBy" value="price" type="radio" id="vehicle111" name="sort"
                               class="mt-2 cursor">
                        <label for="vehicle111" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.price") }}</label><br>
                        <input wire:model="sortBy" value="title" type="radio" id="vehicle1112" name="sort"
                               class="mt-2 cursor">
                        <label for="vehicle1112" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.name") }}</label><br>
                        <input wire:model="sortBy" value="popularity" type="radio" id="vehicle3333" name="sort"
                               class="mt-2 cursor">
                        <label for="vehicle3333" class="f-500 fs-14 ms-2 cursor">{{ __("courses.sort.pop") }}</label><br>
                    </div>
                </div>
            </div>
        </div>

        <!-- <input type="text" class="input"> -->
        <div class=" div-input-online position-relative">
        <input type="text" wire:model="search" class="form-control input-online bg-light-gray" id="usr" style="padding-left: 50px;">
        <svg class="s" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20.2291 18.4888L25.5001 23.7586L23.7587 25.5L18.4889 20.229C16.5282 21.8008 14.0893 22.6558 11.5762 22.6522C5.46222 22.6522 0.500122 17.6901 0.500122 11.5761C0.500122 5.46209 5.46222 0.5 11.5762 0.5C17.6902 0.5 22.6523 5.46209 22.6523 11.5761C22.6559 14.0891 21.801 16.528 20.2291 18.4888ZM17.7604 17.5757C19.3223 15.9695 20.1945 13.8165 20.191 11.5761C20.191 6.81584 16.3353 2.96136 11.5762 2.96136C6.81596 2.96136 2.96148 6.81584 2.96148 11.5761C2.96148 16.3351 6.81596 20.1908 11.5762 20.1908C13.8166 20.1944 15.9696 19.3221 17.5758 17.7603L17.7604 17.5757Z" fill="#6C7A89"/>
        </svg>
        <svg class="x" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" >
        <path d="M30 10L10 30" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M10 10L30 30" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
       </div>


        <div class="row mt-4">

            @foreach($courses as $course)
                @if($course->info->enabled)
                <a href="@if($type == "webinars") {{ route("webinar.show",$course->id) }} @else {{ route("course.show",$course->id) }} @endif" style="color: inherit"
                   class="col-xxl-3 col-lg-4 col-sm-6 col-12 mb-3 md-sm-0">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}" class="w-100"
                             alt="addPic" style="width: 250px; height: 150px; object-fit: cover">
                        <div class="p-3">
                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$course->directions->first()->title}}</p>
                            <p class="f-700 fs-16 courseTxt-index">{{$course->info->title}}</p>
                            <div
                                class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center"
                                style="min-height: 63px;">
                                <div class="d-flex align-items-center me-2">
                                    <div class="d-flex align-items-center">
                                        @foreach($course->getLectors()->take(3) as $k => $lector)
                                            <img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"
                                                style="width: 48px;min-width: 48px;height: 48px;object-fit: cover"
                                                class="@if ($k>0) m-25 @endif rounded-circle border" alt="personPic">
                                        @endforeach
                                        @if($course->getLectors()->count() == 1)
                                            <p class="m-0 ms-2 fs-14 f-500">{{$course->getLectors()[0]->userinfo->fname}} {{$course->getLectors()[0]->userinfo->lname}}</p>
                                        @endif
                                    </div>
                                    <div>
                                        @if($course->getLectors()->count() > 1)
                                            <span
                                                class="fs-14 f-500 ms-2 ">{{ \App\Helpers\TEXT::lectorCount($course->getLectors()->count()) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-3 mt-xl-0 d-flex flex-row flex-xl-column">
                                    @if($course->sale)
                                        <span
                                            class="f-700 text-primary fs-16 me-2 text-nowrap">{{ $course->sale->html() }}</span>
                                        <span
                                            class="del f-700 text-secondary fs-16  text-nowrap">{{$course->price->html()}}</span>
                                    @else
                                        <span
                                            class="f-700 text-primary fs-16 me-1  text-nowrap">{{ $course->price->html() }}</span>
                                    @endif
                                </div>
                            </div>
                            <form class="dublicat_form" method="POST" action="{{route('addToCart')}}">
                                @csrf
                                <input type="hidden" value="{{ $course->id }}" name="id">
                                <input type="hidden" value="webinar" name="type">
                                <button
                                    class="btn btn-outline-primary w-100 f-600 br-12 mt-3 py-2 fs-14">{{ __('index.buy_webinar') }}</button>
                            </form>
                        </div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>

        @if($count > $perPage)

            <button wire:click="loadNext"
                    class="d-lg-none w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">Показать еще
            </button>
        @endif
        <div class="mt-4 d-flex justify-content-center d-none d-lg-block">
            <nav>
                {{ $courses->links() }}
            </nav>
        </div>
    </div>
    <div wire:ignore class="col-lg-2 col-12 position-relative" style="z-index: 100;">
        <div class="aside d-none d-lg-block">
            <div>
                <div class="mt-4 ms-3 pt-5">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-1"><span>{{ __("courses.filters.directions") }}</span><i
                            class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-1">
                        <div class="mt-2">
                            <ul class="list-unstyled m-0 p-0">
                                @foreach($directions as $direction)
                                    <li>
{{--                                        @if($direction->id != null)--}}
                                        <input wire:model="selectedDirections" type="checkbox"
                                               id="dir-{{ $direction->id }}" value="{{ $direction->id }}" class="mt-2">
                                        <label for="dir-{{ $direction->id }}"
                                               class="f-500 fs-14">{{ $direction->title }}</label><br>
{{--                                        @endif--}}

{{--                                        <label --}}
{{--                                               class="f-500 fs-14">--}}
{{--                                            <input wire:model="selectedDirections" type="checkbox"--}}
{{--                                                    value="{{ $direction->id }}" class="mt-2">--}}
{{--                                            {{ $direction->title }}</label><br>--}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-3"><span>{{ __("courses.filters.price") }}</span><i
                            class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-3">
                        <div class="mt-2">
                            <input type="checkbox" id="vehicle13" name="vehicle1" class="mt-2 cursor">
                            <label for="vehicle13" class="f-500 fs-14 cursor">{{ __("courses.filters.paid") }}</label><br>
                            <input type="checkbox" id="vehicle14" name="vehicle2" class="mt-2 cursor">
                            <label for="vehicle14" class="f-500 fs-14 cursor">{{ __("courses.filters.free") }}</label><br>
                        </div>

                    </div>
                </div>
                <div class="mt-4 ms-3">
                    <label class="f-600 fs-16 d-flex justify-content-between align-items-center fg-label cursor"
                           data-bs-toggle="collapse" data-bs-target="#fg-2"><span>{{ __("courses.filters.lector") }}</span><i
                            class="fal fa-angle-right"></i></label>
                    <div class="collapse show" id="fg-2">
                        <div class="mt-2">
                            @foreach($lectors->unique() as $user)
                                    <input wire:model="selectedLectors" type="checkbox" id="lec-{{ $user->id }}"
                                           value="{{ $user->id }}" class="mt-2 cursor">
                                    <label for="lec-{{ $user->id }}"
                                           class="f-500 fs-14 cursor">{{ $user->userInfo->fullName }}</label><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

