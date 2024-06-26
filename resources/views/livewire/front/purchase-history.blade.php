<div class="py-4 py-lg-6 mt-0">
    <div class="d-flex justify-content-between align-items-center mb-3 mb-lg-5">
        <h3 class="f-700 m-0">{{ __("profile.history.title") }}</h3>
        <div class="position-relative d-none d-lg-block">
            <input wire:model="search" class="form-control br-12" placeholder="{{ __("profile.history.search") }}">
            <i class="fal fa-search position-absolute top-0 end-0 mt-2 me-2"></i>
        </div>
    </div>
    <div>
{{--        <div class="d-flex justify-content-between d-none d-lg-block">--}}
{{--            <div class="d-flex align-items-center justify-content-between">--}}
{{--                <p class="m-0 text-secondary fs-14 f-500">Название</p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @foreach($accesses as $access)--}}
{{--            <div class="p-2 bg-white br-12 d-flex align-items-xxl-center mt-2 justify-content-between flex-column flex-xxl-row">--}}
{{--                @if($access->course_id)--}}
{{--                    <div class="d-flex align-items-center purchase_border_bottom">--}}
{{--                        <div>--}}
{{--                            <img src="{{\Illuminate\Support\Facades\Storage::url($access->course->image)}}" alt="pic">--}}
{{--                        </div>--}}
{{--                        <div class="ms-3">--}}
{{--                            <p class="m-0 fs-14 f-500">{{$access->course->info->title}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-items-center justify-content-between mt-2">--}}
{{--                        <div class="me-xxl-5">--}}
{{--                            <p class="m-0 fs-14 f-500 white-space">{{date('d-m-Y', strtotime($access->created_at))}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="ms-0 ms-xxl-4 me-xxl-5">--}}
{{--                            <p class="m-0 fs-14 f-500 white-space">{{$access->course->price->rub}} ₽</p>--}}
{{--                        </div>--}}
{{--                        <div class="me-xxl-5 ms-xxl-4">--}}
{{--                            <ul style="color: #32C475;" class="fs-14 f-500 m-0 white-space">--}}
{{--                                <li>Оплачено</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="d-flex align-items-center purchase_border_bottom">--}}
{{--                        <div>--}}
{{--                            <img src="{{\Illuminate\Support\Facades\Storage::url($access->webinar->image)}}" alt="pic">--}}
{{--                        </div>--}}
{{--                        <div class="ms-3">--}}
{{--                            <p class="m-0 fs-14 f-500">{{$access->webinar->info->title}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex align-items-center justify-content-between mt-2">--}}
{{--                        <div class="me-xxl-5">--}}
{{--                            <p class="m-0 fs-14 f-500 white-space">{{date('d-m-Y', strtotime($access->created_at))}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="ms-0 ms-xxl-4 me-xxl-5">--}}
{{--                            <p class="m-0 fs-14 f-500 white-space">{{$access->webinar->price->rub}} ₽</p>--}}
{{--                        </div>--}}
{{--                        <div class="me-xxl-5 ms-xxl-4">--}}
{{--                            <ul style="color: #32C475;" class="fs-14 f-500 m-0 white-space">--}}
{{--                                <li>Оплачено</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
</div>
