<div>
    <div class="mb-6 my-4 my-lg-6" style="z-index: 1">
        <img src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image ?? "userinfo/unknown.png") }}" alt="profilePic" class="rounded-circle" width="73px" height="73px">
        <h5 class="f-700 fs-16 mt-3 m-0">{{$user->userinfo->fname}}
{{--            <span class="fs-15">--}}
                   {{$user->userinfo->lname}}
{{--            </span>--}}

        </h5>
        <div class="d-flex mt-3">
            <i class="fal fa-pencil"></i>
            <p class="m-0 fs-14 f-500 text-secondary ms-2">
                <a href="{{route('personal.information')}}" style="color: #7A7A7A">{{__('profile.profile.profile_settings')}} </a>
            </p>
        </div>
    </div>
    <div>

        @if (Auth::user()->role == 'lector')
            <div class="d-flex mb-4 mt-4">
                <i class="fal fa-user-circle me-2 "></i>
                <a href="{{route('personal.lector')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.lecturer_office')}} </a>
            </div>
        @endif

        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-play-circle me-2 "></i>
            <a href="{{route('personal.courses')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.my_courses')}} </a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-box-alt me-2"></i>
            <a href="{{route('personal.certificates')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.certificates')}} </a>
        </div>
        {{-- <div class="d-flex mb-4 mt-4">
            <i class="fal fa-file-certificate me-2"></i>
            <a href="{{route('personal.history')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.purchase_history')}} </a>
        </div> --}}
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-cart-arrow-down me-2"></i>
            <a href="{{route('personal.cart')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.cart')}} </a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-comment me-2"></i>
            <a href="{{route('personal.help')}}" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.support')}} </a>
        </div>
        <div class="d-flex mb-2 mt-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <i class="fal fa-sign-out"></i>
                <a onclick="this.parentNode.submit()" href="#" class="text-decoration-none text-black fs-14 f-500">{{__('profile.profile.logout')}}</a>
            </form>
        </div>
    </div>
</div>

