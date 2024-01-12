<div class="d-flex header_menu">


    <i class="fal fa-bars text-white cp btn_for_menu"></i>
    <nav class="navbar p-0">
        <i class="fas fa-times text-primary"></i>

        <ul class="text-decoration-none list-unstyled d-flex mb-0">
            <li><a href="{{ route("course.index") }}"
                   class="text-decoration-none me-2 me-xl-3 text-white fs-16 f-600">{{ __("header.menu.courses") }}</a>
            </li>
            <li><a href="{{ route("lectors.index") }}"
                   class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.lectors") }}</a>
            </li>
            <li><a href="{{ route("about") }}"
                   class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.about") }}</a>
            </li>
            <li><a href="{{ route("blog.index") }}"
                   class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.blog") }}</a>
            </li>
            <li><a href="{{ route("contacts") }}"
                   class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.contact") }}</a>
            </li>
            <li>
                <div class="dropdown">
                    <a class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 text-uppercase dropdown-toggle"
                       data-bs-toggle="dropdown">
                        {{ \App\Models\Currency::find(\Illuminate\Support\Facades\Cookie::get("currency_id"))->currency_name }}
                        <i class="icon-{{ \Illuminate\Support\Str::lower(\App\Models\Currency::find(\Illuminate\Support\Facades\Cookie::get("currency_id"))->currency_name) }}"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end cur-dropdown" aria-labelledby="dropdownMenuLink">
                        @foreach(\App\Models\Currency::all() as $cur)
                            <li><a class="dropdown-item"
                                   href="{{ route("change_cur",$cur->id) }}">{{ $cur->currency_name }} <i
                                        class="icon-{{ \Illuminate\Support\Str::lower($cur->currency_name) }}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown header_flag">
                    <a class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 text-uppercase dropdown-toggle"
                       data-bs-toggle="dropdown">
                        <img
                            src="/dist/image/{{ \Illuminate\Support\Str::lower(\Illuminate\Support\Facades\App::getLocale()) }}.svg">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        @foreach(\App\Models\Language::all() as $lg)
                            <li><a class="dropdown-item" href="{{ route("change_lg",$lg->id) }}"><img class="me-2"
                                                                                                      src="/dist/image/{{ \Illuminate\Support\Str::lower($lg->code) }}.svg">{{ $lg->name }}
                                </a></li>
                        @endforeach
                    </ul>
                </div>
            </li>

            @if(!\Illuminate\Support\Facades\Auth::user())
                <li>
                    <a href="{{ route("login") }}"
                       class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 d-none d-lg-block">
                        <svg width="22" height="22" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.1944 13.0485C29.1934 13.0479 29.1927 13.047 29.192 13.0463L16.9532 0.80918C16.4315 0.287227 15.7379 0 15.0002 0C14.2624 0 13.5688 0.287227 13.0469 0.809121L0.814435 13.04C0.810333 13.0441 0.805997 13.0485 0.802129 13.0526C-0.26919 14.1299 -0.267315 15.8779 0.807403 16.9525C1.29835 17.4437 1.94658 17.728 2.63999 17.7579C2.66835 17.7607 2.69677 17.7621 2.72537 17.7621H3.21292V26.7677C3.21292 28.55 4.66326 29.9999 6.44575 29.9999H11.234C11.7195 29.9999 12.113 29.6062 12.113 29.121V22.0605C12.113 21.2473 12.7747 20.5859 13.588 20.5859H16.4123C17.2256 20.5859 17.8871 21.2474 17.8871 22.0605V29.1211C17.8871 29.6063 18.2806 30 18.7661 30H23.5543C25.337 30 26.7872 28.55 26.7872 26.7677V17.7621H27.2395C27.977 17.7621 28.6706 17.4748 29.1927 16.9528C30.2686 15.8766 30.269 14.1254 29.1943 13.0485L29.1944 13.0485ZM27.9495 15.71C27.8565 15.8035 27.7459 15.8777 27.624 15.9283C27.5021 15.9788 27.3714 16.0047 27.2395 16.0044H25.9081C25.4226 16.0044 25.0291 16.3978 25.0291 16.8833V26.7677C25.0291 27.5807 24.3676 28.2422 23.5543 28.2422H19.6451V22.0605C19.6451 20.2782 18.1949 18.828 16.4122 18.828H13.5881C11.8054 18.828 10.355 20.2782 10.355 22.0605V28.2422H6.44586C5.63273 28.2422 4.97097 27.5807 4.97097 26.7677V16.8832C4.97097 16.3977 4.57747 16.0043 4.09197 16.0043H2.7835C2.76979 16.0033 2.75605 16.0027 2.74231 16.0024C2.48042 15.9979 2.23483 15.894 2.05083 15.7097C1.65938 15.3183 1.65938 14.6814 2.05083 14.2897C2.05101 14.2897 2.05101 14.2895 2.05124 14.2893L2.05194 14.2886L14.2903 2.05195C14.3833 1.95838 14.4939 1.8842 14.6157 1.8337C14.7376 1.78321 14.8683 1.75742 15.0002 1.75781C15.2682 1.75781 15.5203 1.86217 15.71 2.05195L27.9456 14.2861L27.9514 14.2916C28.3407 14.6837 28.34 15.3193 27.9495 15.71Z"
                                fill="white"/>
                        </svg>
                    </a>
                    <a href="{{ route("login") }}"
                       class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 d-block d-lg-none">
                        Вход
                    </a>
                </li>
            @endif

        </ul>
    </nav>
</div>
