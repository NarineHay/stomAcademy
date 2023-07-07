@auth()
    <div class="d-flex justify-content-between align-items-center">
{{--        <a href="{{ $href }}" class="text-white mb-0 fs-14 f-500 d-none d-sm-block">{{$user->userinfo->fname}} {{$user->userinfo->lname}}</a>--}}
        <div class="d-flex mb-0 align-items-center" >
            <a href="{{ $href }}" class="d-flex align-items-center mb-0 user-svg">
                @if($user->userInfo->image)
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                @else
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url('userinfo/unknown.png') }}">
                @endif
            </a>
            <a href="{{route('personal.cart')}}">
                <i class="fal fa-shopping-bag text-white mx-3 me-lg-0 ms-lg-4 fs-20"></i>
            </a>
            <div class="text-white d-none d-lg-block">
                <p class="fs-12 f-700 d-flex rounded-circle justify-content-center noticeCount">{{$count ?? '0'}}</p>
            </div>
{{--            <div class="ms-3 d-lg-none">--}}
{{--                <i class="fas fa-bars text-white fs-20 mt-1"></i>--}}
{{--            </div>--}}
        </div>
    </div>
@endauth
