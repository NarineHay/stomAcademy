<div class="d-flex">
    <nav class="navbar p-0">
        <ul class="text-decoration-none list-unstyled d-lg-flex d-none mb-0">
            <li><a href="{{ route("course.index") }}" class="text-decoration-none me-2 me-xl-3 text-white fs-16 f-600">{{ __("header.menu.courses") }}</a></li>
            <li><a href="{{ route("lectors.index") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.lectors") }}</a></li>
            <li><a href="{{ route("about") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.about") }}</a></li>
            <li><a href="{{ route("blog.index") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.blog") }}</a></li>
            <li><a href="{{ route("contacts") }}" class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600">{{ __("header.menu.contact") }}</a></li>
            <li>
                <div class="dropdown">
                    <a class="text-decoration-none ms-3 me-2 me-xl-3 ms-xl-4 text-white fs-16 f-600 text-uppercase dropdown-toggle" data-bs-toggle="dropdown" >
                        {{ \Illuminate\Support\Facades\App::getLocale() }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        @foreach(\App\Models\Language::all() as $lg)
                            <li><a class="dropdown-item" href="{{ route("change_lg",$lg->id) }}">{{ $lg->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </li>

        </ul>
    </nav>
</div>
