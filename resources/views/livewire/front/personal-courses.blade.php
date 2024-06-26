<div class="col-lg-9 pt-6 mobile-padding">
    <div class="pb-lg-6">
        <div class="d-flex justify-content-between">
            <h3 class="f-700 m-0">{{ __("profile.courses.page_title") }}</h3>
            <div class="position-relative d-none d-lg-flex">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center d-none d-lg-block">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-primary fs-14 f-600 border-0"
                                    type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">{{ __("profile.courses.directions") }}
                            </button>
                            <div class="dropdown-menu p-3  border-0" aria-labelledby="dropdownMenuButton1"
                                 style="padding-right: 40px !important; width: max-content">

                                @foreach($directions as $direction)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" wire:model="selectedDirections"
                                                   value="{{ $direction->id }}"
                                                   class="mr-1 form-check-input">
                                            {{$direction->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <input wire:model="search" class="form-control br-12"
                       placeholder="{{ __("profile.certificates.search") }}">
                <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            {{--            <div class="d-flex">--}}
            {{--                <a href="#" class="fs-14 f-500 m-0 me-3 me-lg-5 py-2 py-lg-3  text-black">{{ __("profile.courses.page_menu.all") }}</a>--}}

            {{--                <a href="{{route('personal.conferences')}}" class="fs-14 f-500 m-0 py-2 py-lg-3 text-black">{{ __("profile.courses.page_menu.online") }}</a>--}}
            {{--                <a href="{{route('personal.courses')}}" class="fs-14 f-700 m-0 ms-3 ms-lg-5 py-2 py-lg-3 purchaseActive text-black"--}}
            {{--                   style="padding-bottom: 20px">{{ __("profile.courses.page_menu.course") }}</a>--}}
            {{--            </div>--}}

            <div class="d-block d-lg-none">
                <div class="position-relative">
                    <input wire:model="search" class="form-control br-12"
                           placeholder="{{ __("profile.certificates.search") }}">
                    <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
                </div>

            </div>
        </div>
        <div class="row">
            @foreach($webinars as $webinar)
                <a href="{{ route("personal.courses.show",$webinar->id) }}" style="color: inherit"
                   class="col-xxl-3 col-lg-4 col-sm-6 col-12 my-3 md-sm-0">
                    <div class="bg-white br-12">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}" class="w-100"
                             alt="addPic" style="width: 250px; height: 150px; object-fit: cover">
                        <div class="p-3">

                            <p class="text-primary text-uppercase f-700 mt-2 fs-10">@if($webinar->directions->count() > 0){{$webinar->directions->first()->title}}@endif</p>

                            <p class="f-700 fs-16 courseTxt-index">{{$webinar->info->title}}</p>
                            <div
                                class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center"
                                style="min-height: 63px;">
                                <div class="d-flex align-items-center me-2">
                                    <div class="d-flex align-items-center">
                                        @foreach($webinar->getLectors()->take(3) as $k => $lector)
                                            <img
                                                src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"
                                                style="width: 48px;height: 48px;object-fit: cover"
                                                class="@if ($k>0) m-25 @endif rounded-circle border" alt="personPic">
                                        @endforeach
                                        @if($webinar->getLectors()->count() == 1)
                                            <p class="m-0 ms-2 fs-14 f-500">{{$webinar->getLectors()[0]->userinfo->fname}} {{$webinar->getLectors()[0]->userinfo->lname}}</p>
                                        @endif
                                    </div>
                                    <div>
                                        @if($webinar->getLectors()->count() > 1)
                                            <span
                                                class="fs-14 f-500 ms-2 ">{{ \App\Helpers\TEXT::lectorCount($webinar->getLectors()->count()) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            @if($count > $perPage)
                <button wire:click="loadNext"
                        class="w-100 fs-14 f-500 mt-3 mt-lg-6 py-3 br-12 show_more_btn bg-transparent text-black">{{ __("profile.courses.show_more") }}</button>
            @endif
            {{-- <div class="mt-4 d-flex justify-content-center d-lg-block">
                <nav>{{ $webinars->links() }}</nav>
            </div> --}}
        </div>
    </div>
</div>

