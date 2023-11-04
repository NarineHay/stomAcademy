@extends("layouts.prodile")

@section("profile-content")
    <div class="d-flex flex-row">
        <div class="py-5 py-lg-6 px-4 mt-0 center_col">
            <p class="m-0 f-500 fs-14 cursor">
                <a class="text-black" href="{{ route("personal.courses") }}"><i
                        class="fal fa-arrow-left me-3"></i>{{ __("profile.courses.back") }}</a></p>
            <div class="mt-lg-4 mt-2">
                <div class="bg d-flex justify-content-center align-items-center position-relative br-12">
                    <div class="video_container">
                        @if($webinar->info->video)
                            <div id="player"
                                 class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                                <iframe style="width: 100%" allowfullscreen
                                        src="{{ explode("&",\Illuminate\Support\Str::replace("watch?v=","embed/",$webinar->info->video))[0] }}?autoplay=0&showinfo=0&controls=0"></iframe>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="position-relative w-100 d-block d-lg-none bg-white my-3" style="z-index: 9; height: 300px">
                    <div class="profile_webinar_chat_center"></div>
                    <div class="py-4 py-lg-5 px-3 mt-0">
                        <h4 class="mb-0">{{ __("index.online_chat") }}</h4>
                        <livewire:front.personal-courses-chat :webinar_id="$webinar->id"/>
                    </div>
                </div>


            </div>
            <div class="mt-lg-4 mt-6 pt-6 pt-lg-0">
                <div>
                    <p class="m-0 text-primary fs-10 f-700">{{ $webinar->directions->map(function ($item){ return $item->title; })->join(", ") }}</p>
                    <p class="m-0 fs-24 f-700 mt-2">{{ $webinar->info->title }}</p>
                </div>
                <div class="d-flex align-items-center mt-3">
                    <div>
                        <img style="width: 50px;height: 50px;border-radius: 100%;object-fit: cover"
                             src="{{ \Illuminate\Support\Facades\Storage::url($webinar->user->userInfo->image) }}"
                             alt="pic">
                    </div>
                    <div>
                        <p class="fs-16 f-500 m-0 ms-3">{{ $webinar->user->userInfo->fullName }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="m-0 fs-16 f-500">{!! $webinar->info->description !!}</p>
                </div>
            </div>
        </div>
        <div class="position-relative w-100 d-none d-lg-block right_col" style="z-index: 2">
            <div class="profile_webinar_chat_right"></div>
            <div class="py-5 py-lg-6 px-4 mt-0">
                <h4 class="mb-4">{{ __("index.online_chat") }}</h4>
                <livewire:front.personal-courses-chat :webinar_id="$webinar->id"/>
            </div>
            <div class="row other_webinars mt-2">
                @foreach($other_webinars as $k => $webinar)
                    <a href="{{ route("personal.courses.show",$webinar->id) }}" style="color: inherit"
                       class="col-12 my-3 md-sm-0">
                        <div class="d-flex justify-content-between align-items-center py-2 px-3 fs-14">
                            <p class="m-0 f-500 text-black-gray">{{ $k + 1 }}</p>
                            <p class="ms-4 m-0 f-700">{{$webinar->info->title}}</p>
                        </div>
                        <div class="d-flex justify-content-start align-items-center pb-2 px-3 fs-14">
                            <i class="far fa-clock"></i>
                            <p class="m-0 ms-2 f-500 me-2 text-black-gray text-nowrap">{{$webinar->duration}} {{ __("lectors.min") }}</p>
                            <i class="fal fa-angle-right me-4 text-secondary"></i>
                        </div>
{{--                        <div class="bg-white br-12">--}}
{{--                            <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}" class="w-100"--}}
{{--                                 alt="addPic" style="width: 250px; height: 150px; object-fit: cover">--}}
{{--                            <div class="p-3">--}}
{{--                                <p class="text-primary text-uppercase f-700 mt-2 fs-10">{{$webinar->directions->first()->title}}</p>--}}
{{--                                <p class="f-700 fs-16 courseTxt-index">{{$webinar->info->title}}</p>--}}
{{--                                <div--}}
{{--                                    class="d-flex flex-column flex-xl-row mt-4 justify-content-between align-items-xl-center"--}}
{{--                                    style="min-height: 63px;">--}}
{{--                                    <div class="d-flex align-items-center me-2">--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            @foreach($webinar->getLectors()->take(3) as $k => $lector)--}}
{{--                                                <img--}}
{{--                                                    src="{{ \Illuminate\Support\Facades\Storage::url($lector->userInfo->image) }}"--}}
{{--                                                    style="width: 48px;height: 48px;object-fit: cover"--}}
{{--                                                    class="@if ($k>0) m-25 @endif rounded-circle border" alt="personPic">--}}
{{--                                            @endforeach--}}
{{--                                            @if($webinar->getLectors()->count() == 1)--}}
{{--                                                <p class="m-0 ms-2 fs-14 f-500">{{$webinar->getLectors()[0]->userinfo->fname}} {{$webinar->getLectors()[0]->userinfo->lname}}</p>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            @if($webinar->getLectors()->count() > 1)--}}
{{--                                                <span class="fs-14 f-500 ms-2 ">{{ \App\Helpers\TEXT::lectorCount($webinar->getLectors()->count()) }}</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .center_col{
            flex:0 0 70%;
        }
    </style>

@endsection
