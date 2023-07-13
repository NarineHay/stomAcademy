@auth()
    <div class="d-flex justify-content-between align-items-center">
{{--        <a href="{{ $href }}" class="text-white mb-0 fs-14 f-500 d-none d-sm-block">{{$user->userinfo->fname}} {{$user->userinfo->lname}}</a>--}}
        <div class="d-flex mb-0 align-items-center" >
            <a href="{{ $href }}" class="d-flex align-items-center mb-0 user-svg user-svg-1">
                @if($user->userInfo->image)
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                @else
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url('userinfo/unknown.png') }}">
                @endif
            </a>

            <button class="btn user-svg-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"> <a href="javascript:void(0); " class="d-flex align-items-center mb-0 user-svg ">
                @if($user->userInfo->image)
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                @else
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px" src="{{ \Illuminate\Support\Facades\Storage::url('userinfo/unknown.png') }}">
                @endif
            </a></button>

<div class="offcanvas offcanvas-start" style="width: 232px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
<div>
    <div class="mb-6 my-4 my-lg-6" style="z-index: 1">
        <img src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image ?? "userinfo/unknown.png") }}" alt="profilePic" class="rounded-circle" width="73px" height="73px">
        <h5 class="f-700 mt-3 m-0">{{$user->userinfo->fname}}
            <span class="fs-15">
                   {{$user->userinfo->lname}}
            </span>

        </h5>
        <div class="d-flex mt-3">
            <i class="fal fa-pencil"></i>
            <p class="m-0 fs-14 f-500 text-secondary ms-2">
                <a href="{{route('personal.information')}}" style="color: #7A7A7A">Настройки профиля</a>
            </p>
        </div>
    </div>
    <div>
    <div class="d-flex mb-4 mt-4 " style="gap:7px;">
    <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.84835 11.5984C4.55161 10.8951 5.50544 10.5 6.5 10.5H12.5C13.4946 10.5 14.4484 10.8951 15.1517 11.5984C15.8549 12.3016 16.25 13.2554 16.25 14.25V15.75C16.25 16.1642 15.9142 16.5 15.5 16.5C15.0858 16.5 14.75 16.1642 14.75 15.75V14.25C14.75 13.6533 14.5129 13.081 14.091 12.659C13.669 12.2371 13.0967 12 12.5 12H6.5C5.90326 12 5.33097 12.2371 4.90901 12.659C4.48705 13.081 4.25 13.6533 4.25 14.25V15.75C4.25 16.1642 3.91421 16.5 3.5 16.5C3.08579 16.5 2.75 16.1642 2.75 15.75V14.25C2.75 13.2554 3.14509 12.3016 3.84835 11.5984Z" fill="black"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 3C8.25736 3 7.25 4.00736 7.25 5.25C7.25 6.49264 8.25736 7.5 9.5 7.5C10.7426 7.5 11.75 6.49264 11.75 5.25C11.75 4.00736 10.7426 3 9.5 3ZM5.75 5.25C5.75 3.17893 7.42893 1.5 9.5 1.5C11.5711 1.5 13.25 3.17893 13.25 5.25C13.25 7.32107 11.5711 9 9.5 9C7.42893 9 5.75 7.32107 5.75 5.25Z" fill="black"/>
</svg>
            <a href="{{route('personal.courses')}}" class="text-decoration-none text-black fs-14 f-500">Мои данные</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-play-circle me-2 "></i>
            <a href="{{route('personal.courses')}}" class="text-decoration-none text-black fs-14 f-500">Мои курсы</a>
        </div>
        <div class="d-flex mb-4 mt-4 d-none">
            <i class="fal fa-box-alt me-2"></i>
            <a href="{{route('personal.certificates')}}" class="text-decoration-none text-black fs-14 f-500">Сертификаты</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-file-certificate me-2"></i>
            <a href="{{route('personal.history')}}" class="text-decoration-none text-black fs-14 f-500">История покупок</a>
        </div>
       
        <div class="d-flex mb-4 mt-4 d-none">
            <i class="fal fa-cart-arrow-down me-2"></i>
            <a href="{{route('personal.cart')}}" class="text-decoration-none text-black fs-14 f-500">Корзина</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <i class="fal fa-comment me-2"></i>
            <a href="{{route('personal.help')}}" class="text-decoration-none text-black fs-14 f-500">Поддержка</a>
        </div>
        <div class="d-flex mb-4 mt-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <i class="fal fa-sign-out"></i>
                <a onclick="this.parentNode.submit()" href="#" class="text-decoration-none text-black fs-14 f-500">Выйти</a>
            </form>
        </div>
    </div>
</div>

  </div>
</div>
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
