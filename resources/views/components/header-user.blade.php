@auth()
    <div class="d-flex justify-content-between align-items-center">
        {{--        <a href="{{ $href }}" class="text-white mb-0 fs-14 f-500 d-none d-sm-block">{{$user->userinfo->fname}} {{$user->userinfo->lname}}</a>--}}
        <div class="d-flex mb-0 align-items-center ">
            @if(!\Illuminate\Support\Facades\Auth::user())
                <a href="{{ route("login") }}">
                    <svg width="26" height="26" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M29.1944 13.0485C29.1934 13.0479 29.1927 13.047 29.192 13.0463L16.9532 0.80918C16.4315 0.287227 15.7379 0 15.0002 0C14.2624 0 13.5688 0.287227 13.0469 0.809121L0.814435 13.04C0.810333 13.0441 0.805997 13.0485 0.802129 13.0526C-0.26919 14.1299 -0.267315 15.8779 0.807403 16.9525C1.29835 17.4437 1.94658 17.728 2.63999 17.7579C2.66835 17.7607 2.69677 17.7621 2.72537 17.7621H3.21292V26.7677C3.21292 28.55 4.66326 29.9999 6.44575 29.9999H11.234C11.7195 29.9999 12.113 29.6062 12.113 29.121V22.0605C12.113 21.2473 12.7747 20.5859 13.588 20.5859H16.4123C17.2256 20.5859 17.8871 21.2474 17.8871 22.0605V29.1211C17.8871 29.6063 18.2806 30 18.7661 30H23.5543C25.337 30 26.7872 28.55 26.7872 26.7677V17.7621H27.2395C27.977 17.7621 28.6706 17.4748 29.1927 16.9528C30.2686 15.8766 30.269 14.1254 29.1943 13.0485L29.1944 13.0485ZM27.9495 15.71C27.8565 15.8035 27.7459 15.8777 27.624 15.9283C27.5021 15.9788 27.3714 16.0047 27.2395 16.0044H25.9081C25.4226 16.0044 25.0291 16.3978 25.0291 16.8833V26.7677C25.0291 27.5807 24.3676 28.2422 23.5543 28.2422H19.6451V22.0605C19.6451 20.2782 18.1949 18.828 16.4122 18.828H13.5881C11.8054 18.828 10.355 20.2782 10.355 22.0605V28.2422H6.44586C5.63273 28.2422 4.97097 27.5807 4.97097 26.7677V16.8832C4.97097 16.3977 4.57747 16.0043 4.09197 16.0043H2.7835C2.76979 16.0033 2.75605 16.0027 2.74231 16.0024C2.48042 15.9979 2.23483 15.894 2.05083 15.7097C1.65938 15.3183 1.65938 14.6814 2.05083 14.2897C2.05101 14.2897 2.05101 14.2895 2.05124 14.2893L2.05194 14.2886L14.2903 2.05195C14.3833 1.95838 14.4939 1.8842 14.6157 1.8337C14.7376 1.78321 14.8683 1.75742 15.0002 1.75781C15.2682 1.75781 15.5203 1.86217 15.71 2.05195L27.9456 14.2861L27.9514 14.2916C28.3407 14.6837 28.34 15.3193 27.9495 15.71Z"
                            fill="white"/>
                    </svg>
                </a>
            @endif
            <a href="{{ $href }}" class="d-flex align-items-center mb-0 user-svg user-svg-1">
                @if($user->userInfo->image)
                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px"
                         src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                @else
                    {{--                    <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px"--}}
                    {{--                         src="{{ \Illuminate\Support\Facades\Storage::url('userinfo/unknown.png') }}">--}}
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.1714 14.6421C18.885 13.8616 19.2823 12.8433 19.2857 11.7857C19.2857 9.42214 17.3636 7.5 15 7.5C12.6364 7.5 10.7143 9.42214 10.7143 11.7857C10.7177 12.8433 11.115 13.8616 11.8286 14.6421C9.27643 15.84 7.5 18.4275 7.5 21.4286C7.5 21.7127 7.61288 21.9853 7.81381 22.1862C8.01475 22.3871 8.28727 22.5 8.57143 22.5H21.4286C21.7127 22.5 21.9853 22.3871 22.1862 22.1862C22.3871 21.9853 22.5 21.7127 22.5 21.4286C22.5 18.4275 20.7236 15.84 18.1714 14.6421ZM12.8571 11.7857C12.8571 10.6039 13.8182 9.64286 15 9.64286C16.1818 9.64286 17.1429 10.6039 17.1429 11.7857C17.1429 12.9675 16.1818 13.9286 15 13.9286C13.8182 13.9286 12.8571 12.9675 12.8571 11.7857ZM9.75107 20.3571C10.2482 17.9154 12.4136 16.0714 15 16.0714C17.5864 16.0714 19.7518 17.9154 20.2489 20.3571H9.75107Z"
                            fill="white"/>
                        <path
                            d="M15 0C6.72857 0 0 6.72857 0 15C0 23.2714 6.72857 30 15 30C23.2714 30 30 23.2714 30 15C30 6.72857 23.2714 0 15 0ZM15 27.8571C7.91036 27.8571 2.14286 22.0896 2.14286 15C2.14286 7.91036 7.91036 2.14286 15 2.14286C22.0896 2.14286 27.8571 7.91036 27.8571 15C27.8571 22.0896 22.0896 27.8571 15 27.8571Z"
                            fill="white"/>
                    </svg>
                @endif
            </a>

            <button class="btn user-svg-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                    aria-controls="offcanvasScrolling"><a href="javascript:void(0); "
                                                          class="d-flex align-items-center mb-0 user-svg ">
                    @if($user->userInfo->image)
                        <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px"
                             src="{{ \Illuminate\Support\Facades\Storage::url($user->userInfo->image) }}">
                    @else
                        {{--                        <img class="rounded-circle mx-lg-2" style="height: 30px;width: 30px"--}}
                        {{--                             src="{{ \Illuminate\Support\Facades\Storage::url('userinfo/unknown.png') }}">--}}
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.1714 14.6421C18.885 13.8616 19.2823 12.8433 19.2857 11.7857C19.2857 9.42214 17.3636 7.5 15 7.5C12.6364 7.5 10.7143 9.42214 10.7143 11.7857C10.7177 12.8433 11.115 13.8616 11.8286 14.6421C9.27643 15.84 7.5 18.4275 7.5 21.4286C7.5 21.7127 7.61288 21.9853 7.81381 22.1862C8.01475 22.3871 8.28727 22.5 8.57143 22.5H21.4286C21.7127 22.5 21.9853 22.3871 22.1862 22.1862C22.3871 21.9853 22.5 21.7127 22.5 21.4286C22.5 18.4275 20.7236 15.84 18.1714 14.6421ZM12.8571 11.7857C12.8571 10.6039 13.8182 9.64286 15 9.64286C16.1818 9.64286 17.1429 10.6039 17.1429 11.7857C17.1429 12.9675 16.1818 13.9286 15 13.9286C13.8182 13.9286 12.8571 12.9675 12.8571 11.7857ZM9.75107 20.3571C10.2482 17.9154 12.4136 16.0714 15 16.0714C17.5864 16.0714 19.7518 17.9154 20.2489 20.3571H9.75107Z"
                                fill="white"/>
                            <path
                                d="M15 0C6.72857 0 0 6.72857 0 15C0 23.2714 6.72857 30 15 30C23.2714 30 30 23.2714 30 15C30 6.72857 23.2714 0 15 0ZM15 27.8571C7.91036 27.8571 2.14286 22.0896 2.14286 15C2.14286 7.91036 7.91036 2.14286 15 2.14286C22.0896 2.14286 27.8571 7.91036 27.8571 15C27.8571 22.0896 22.0896 27.8571 15 27.8571Z"
                                fill="white"/>
                        </svg>
                    @endif
                </a></button>

            <div class="offcanvas offcanvas-end" style="width: 232px;" data-bs-scroll="true" data-bs-backdrop="false"
                 tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>


                <div class="offcanvas-body">
                    <div>
                        <div class="mb-6 my-4 my-lg-6" style="z-index: 1">
                            <img
                                src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image ?? "userinfo/unknown.png") }}"
                                alt="profilePic" class="rounded-circle" width="73px" height="73px">
                            <h5 class="f-700 mt-3 m-0">{{$user->userinfo->fname}}
                                <span class="fs-15">
                   {{$user->userinfo->lname}}
            </span>

                            </h5>
                            <div class="d-flex mt-3">
                                <i class="fal fa-pencil"></i>
                                <p class="m-0 fs-14 f-500 text-secondary ms-2">
                                    <a href="{{route('personal.information')}}" style="color: #7A7A7A">Настройки
                                        профиля</a>
                                </p>
                            </div>
                        </div>
                        <div>
{{--                            <div class="d-flex mb-4 mt-4 " style="gap:7px;">--}}
{{--                                <svg width="19" height="18" viewBox="0 0 19 18" fill="none"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                          d="M3.84835 11.5984C4.55161 10.8951 5.50544 10.5 6.5 10.5H12.5C13.4946 10.5 14.4484 10.8951 15.1517 11.5984C15.8549 12.3016 16.25 13.2554 16.25 14.25V15.75C16.25 16.1642 15.9142 16.5 15.5 16.5C15.0858 16.5 14.75 16.1642 14.75 15.75V14.25C14.75 13.6533 14.5129 13.081 14.091 12.659C13.669 12.2371 13.0967 12 12.5 12H6.5C5.90326 12 5.33097 12.2371 4.90901 12.659C4.48705 13.081 4.25 13.6533 4.25 14.25V15.75C4.25 16.1642 3.91421 16.5 3.5 16.5C3.08579 16.5 2.75 16.1642 2.75 15.75V14.25C2.75 13.2554 3.14509 12.3016 3.84835 11.5984Z"--}}
{{--                                          fill="black"/>--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                          d="M9.5 3C8.25736 3 7.25 4.00736 7.25 5.25C7.25 6.49264 8.25736 7.5 9.5 7.5C10.7426 7.5 11.75 6.49264 11.75 5.25C11.75 4.00736 10.7426 3 9.5 3ZM5.75 5.25C5.75 3.17893 7.42893 1.5 9.5 1.5C11.5711 1.5 13.25 3.17893 13.25 5.25C13.25 7.32107 11.5711 9 9.5 9C7.42893 9 5.75 7.32107 5.75 5.25Z"--}}
{{--                                          fill="black"/>--}}
{{--                                </svg>--}}
{{--                                <a href="{{route('personal.courses')}}"--}}
{{--                                   class="text-decoration-none text-black fs-14 f-500">Мои данные</a>--}}
{{--                            </div>--}}
                            <div class="d-flex mb-4 mt-4">
                                <i class="fal fa-play-circle me-2 "></i>
                                <a href="{{route('personal.courses')}}"
                                   class="text-decoration-none text-black fs-14 f-500">Мои курсы</a>
                            </div>
                            <div class="d-flex mb-4 mt-4">
                                <i class="fal fa-box-alt me-2"></i>
                                <a href="{{route('personal.certificates')}}"
                                   class="text-decoration-none text-black fs-14 f-500">Сертификаты</a>
                            </div>
                            <div class="d-flex mb-4 mt-4">
                                <i class="fal fa-file-certificate me-2"></i>
                                <a href="{{route('personal.history')}}"
                                   class="text-decoration-none text-black fs-14 f-500">История покупок</a>
                            </div>

                            <div class="d-flex mb-4 mt-4 d-none">
                                <i class="fal fa-cart-arrow-down me-2"></i>
                                <a href="{{route('personal.cart')}}"
                                   class="text-decoration-none text-black fs-14 f-500">Корзина</a>
                            </div>
                            <div class="d-flex mb-4 mt-4">
                                <i class="fal fa-comment me-2"></i>
                                <a href="{{route('personal.help')}}"
                                   class="text-decoration-none text-black fs-14 f-500">Поддержка</a>
                            </div>
                            <div class="d-flex mb-4 mt-4">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <i class="fal fa-sign-out"></i>
                                    <a onclick="this.parentNode.submit()" href="#"
                                       class="text-decoration-none text-black fs-14 f-500">Выйти</a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <a href="{{route('personal.cart')}}">
                <i class="fal fa-shopping-bag text-white mx-2 me-lg-0 ms-lg-3 fs-25"></i>
            </a>
            <div class="text-white d-block noticeCount">
                <p class="fs-12 f-700 d-flex rounded-circle justify-content-center">{{$count ?? '0'}}</p>
            </div>
            {{--            <div class="ms-3 d-lg-none">--}}
            {{--                <i class="fas fa-bars text-white fs-20 mt-1"></i>--}}
            {{--            </div>--}}
        </div>
    </div>
@endauth
