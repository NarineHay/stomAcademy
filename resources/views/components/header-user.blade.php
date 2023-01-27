@auth()
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ $href }}" class="text-white mb-0 fs-14 f-500 d-none d-sm-block">{{ $user->name }}</a>
        <div class="d-flex mb-0 align-items-center">
            <a href="{{ $href }}" class="d-flex align-items-center mb-0">
                @if($user->userInfo->image)
                    <img class="me-2 rounded-circle ms-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                @else
                    <i class="far fa-user-circle text-white ms-2 fs-20"></i>
                @endif
            </a>
            <a href="{{route('personal.cart')}}">
                <i class="far fa-shopping-bag text-white ms-3 ms-lg-4 fs-20"></i>
            </a>
            <div class="text-white d-none d-lg-block">
                <p class="fs-12 f-700 d-flex rounded-circle justify-content-center noticeCount">{{$count ?? '0'}}</p>
            </div>
            <div class="ms-3 d-lg-none">
                <i class="fas fa-bars text-white fs-20 mt-1"></i>
            </div>
        </div>
    </div>
@endauth
