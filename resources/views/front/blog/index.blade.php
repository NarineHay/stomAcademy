@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="d-flex mt-2 mt-md-3 py-2 ">
                        <a href="{{route('home')}}"><span class="fs-12 f-500 text-secondary">{{ __("header.menu.home") }}</span></a>
                        <a><span class="fs-12 f-500 ms-3 main">{{ __("header.menu.blog") }}</span></a>
                    </div>
                    <div class="mt-3">
                        <h2 class="f-600">{{ __("header.menu.blog") }}</h2>
                    </div>
                    <div class="col d-flex d-lg-none mt-2 filter_buttons_mobile mb-2">
                        <button class="fs-12 f-600 py-2 w-50 bg-transparent w-100">{{ __("blog.category_title") }}</button>
                    </div>
                    <livewire:front.blogs-catalog/>
                </div>
            </div>
        </div>
@endsection
