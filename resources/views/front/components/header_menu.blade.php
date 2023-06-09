<div class="d-flex header_menu">
    <i class="fal fa-bars text-white cp btn_for_menu" ></i>
    <nav class="navbar p-0">
        <i class="fas fa-times text-primary btn_close_for_menu"></i>

        <ul class="text-decoration-none list-unstyled d-flex mb-0">
            <li><a href="{{ route("course.index") }}" class="text-decoration-none me-2 me-xl-3 text-white fs-16 f-600">{{ __("header.menu.courses") }}</a></li>
            <li><a href="{{ route("lectors.index") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.lectors") }}</a></li>
            <li><a href="{{ route("about") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.about") }}</a></li>
            <li><a href="{{ route("blog.index") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.blog") }}</a></li>
            <li><a href="{{ route("contacts") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.contact") }}</a></li>
            <li>
                <div class="dropdown">
                    <a class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 text-uppercase dropdown-toggle" data-bs-toggle="dropdown" >
                        {{ \App\Models\Currency::find(\Illuminate\Support\Facades\Cookie::get("currency_id"))->currency_name }} <i class="icon-{{ \Illuminate\Support\Str::lower(\App\Models\Currency::find(\Illuminate\Support\Facades\Cookie::get("currency_id"))->currency_name) }}"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end cur-dropdown" aria-labelledby="dropdownMenuLink">
                        @foreach(\App\Models\Currency::all() as $cur)
                            <li><a class="dropdown-item" href="{{ route("change_cur",$cur->id) }}">{{ $cur->currency_name }} <i class="icon-{{ \Illuminate\Support\Str::lower($cur->currency_name) }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
            <li>
                <div class="dropdown header_flag">
                    <a class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 text-uppercase dropdown-toggle" data-bs-toggle="dropdown" >
                        <img src="/dist/image/{{ \Illuminate\Support\Str::lower(\Illuminate\Support\Facades\App::getLocale()) }}.svg">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        @foreach(\App\Models\Language::all() as $lg)
                            <li><a class="dropdown-item" href="{{ route("change_lg",$lg->id) }}"><img class="me-2" src="/dist/image/{{ \Illuminate\Support\Str::lower($lg->code) }}.svg">{{ $lg->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>

        </ul>
    </nav>
</div>
