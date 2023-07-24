@extends("layouts.prodile")

@section("profile-content")
    <div class="d-flex flex-row">
        <div class="py-5 py-lg-6 px-4 mt-0 ">
            <p class="m-0 f-500 fs-14 cursor"><a class="text-black" href="{{ route("personal.courses") }}"><i
                        class="fal fa-arrow-left me-3"></i>{{ __("profile.courses.back") }}</a></p>
            <div class="mt-4">
                <div class="bg d-flex justify-content-center align-items-center position-relative br-12">
                    <div class="video_container">
                        <div id="player"
                             class="plyr__video-embed plyr plyr--full-ui plyr--video plyr--youtube plyr--fullscreen-enabled plyr__poster-enabled plyr--playing plyr--hide-controls">

                            <iframe style="width: 100%" allowfullscreen
                                    src="{{ explode("&",\Illuminate\Support\Str::replace("watch?v=","embed/",$webinar->info->video))[0] }}?autoplay=0&showinfo=0&controls=0"></iframe>
                        </div>
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
            <div class="mt-4">
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


        <div class="position-relative w-100 d-none d-lg-block" style="z-index: 2">
            <div class="profile_webinar_chat_right"></div>
            <div class="py-5 py-lg-6 px-4 mt-0">
                <h4 class="mb-4">{{ __("index.online_chat") }}</h4>
                <livewire:front.personal-courses-chat :webinar_id="$webinar->id"/>
            </div>

        </div>


    </div>




@endsection
