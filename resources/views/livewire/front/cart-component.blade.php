<div class="container mb-4 mb-md-6 pt-6">
    <div class="d-flex mt-lg-3">
        <a href="{{route('home')}}"><p class="fs-12 text-secondary">{{ __("header.menu.home") }}</p></a>
        <a><p class="fs-12 ms-3 main">{{ __("header.menu.courses") }}</p></a>
        <a><p class="fs-12 f-500 ms-3 text-primary d-none d-lg-block main">{{ __("header.menu.cart") }}</p></a>
    </div>
    <div class="d-flex align-items-center mt-3 mt-lg-5">
        <h2 class="f-600 m-0">{{ __("profile.cart.page_title_left") }}</h2>
        <h2 class="text-primary f-600 ms-3 m-0">{{count($items)}} {{ __("profile.cart.page_title_right") }}</h2>
        <a href="{{ route("removeAllFromCart") }}">
            <span><i class="fal fa-times text-secondary ms-2"></i></span>
        </a>
    </div>

    <div class="row">
        <div class="col-xxl-8 col-lg-12 col-12">
            @foreach($items as $item)
                @if($item->type == 'webinar')
                    <div class="col-12  mt-4 me-6">
                        <div class="bg-white br-12 d-flex justify-content-between flex-column flex-lg-row">
                            <div class="d-flex align-items-center py-2 px-2 fs-14">
                                <img class="personal-cart-img" src="{{\Illuminate\Support\Facades\Storage::url($item->webinar->image)}}"
                                     alt="basketPic">
                                <p class="ms-2 m-0 f-500 fs-14 cart-p-m-w">{{$item->webinar->info->title}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <i class="far fa-clock"></i>
                                    <p class="m-0 ms-1 ms-md-2 f-500">{{$item->webinar->duration}} мин</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <i class="fas fa-tasks"></i>
                                    <p class="m-0 ms-1 ms-md-2 f-500">1 {{ __("profile.cart.lection") }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <p class="m-0 ms-1 ms-md-2 f-700 me-2 text-primary fs-14"> {{ $item->webinar->sale ? $item->webinar->sale->html() : $item->webinar->price->html() }} </p>
                                </div>
                                <div
                                    class="d-flex justify-content-between align-items-center py-2 px-3 fs-14 d-none d-lg-block">
                                    <a href="{{ route("removeFromCart",$item) }}">
                                        <i class="fal fa-times text-secondary ms-2 cursor"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($item->type == 'course')
                    <div class="col-12  mt-4 me-6">
                        <div class="bg-white br-12 d-flex justify-content-between flex-column flex-lg-row">
                            <div class="d-flex align-items-center py-2 px-2 fs-14">
                                <img class="personal-cart-img" src="{{ Illuminate\Support\Facades\Storage::url($item->course->image) }}"
                                     alt="basketPic">
                                <p class="ms-2 m-0 f-500 fs-14 cart-p-m-w">{{$item->course->info->title}}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <i class="far fa-clock"></i>
                                    <p class="m-0 ms-1 ms-md-2 f-500">{{$item->course->webinars_object_sum_duration}}
                                        мин</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <i class="fas fa-tasks"></i>
                                    <p class="m-0 ms-1 ms-md-2 f-500">{{$item->course->webinars_count}} {{ __("profile.cart.lection") }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 px-2 px-xxl-3 fs-14">
                                    <p class="m-0 ms-1 ms-md-2 f-700 me-2 text-primary fs-14">{{$item->course->sale ? $item->course->sale->html() : $item->course->price->html()}} </p>
                                </div>
                                <div
                                    class="d-flex justify-content-between align-items-center py-2 px-3 fs-14 d-none d-lg-block">
                                    <a href="{{ route("removeFromCart",$item) }}">
                                        <i class="fal fa-times text-secondary ms-2 cursor"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-lg-4 offset-0 offset-lg-8 offset-xxl-0 col-12">
            <div class="col-12 mt-4">
                <div class="bg-white br-12 p-4">
                    <div class="fs-14">
                        <div class="input-group">
                            <form wire:submit.prevent="submit" class="form-cart">
                                <input wire:model="code" type="text" class="form-control py-2 px-3 br-12 inputStyle promo-input"
                                       placeholder="{{ __("profile.cart.promocode") }}">
                                <button type="submit" class="input-group-text bg-transparent promo-btn">
                                    <i class="fal fa-arrow-right cursor p-2 text-secondary"></i>
                                </button>
                            </form>
                        </div>

                        @if(isset($sub_total))
                            <div class="d-flex justify-content-between mt-2 mt-md-3">
                                <p class="m-0 f-500">{{ __("profile.cart.sale") }}</p>
                                <p class="text-danger m-0 f-600">-{{ $prc }}%</p>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="m-0 f-500">{{ __("profile.cart.price") }}</p>
                                <p class="text-primary m-0 f-600">{{ $sub_total }}  <i class="icon-{{ \App\Helpers\TEXT::curSymbol() }}"></i></p>
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mt-2 mt-md-5 mb-3 align-items-center">
                            <p class="f-700 fs-16 m-0">{{ __("profile.cart.to_pay") }}</p>
                            <p class="f-700 fs-24 text-primary m-0">{{ $total }}<i class="icon-{{ \App\Helpers\TEXT::curSymbol() }}"></i></p>

                        </div>
                        <form action="{{ route("personal.cart.order") }}" method="POST">
                            @csrf
                            <input name="promo" wire:model="code" type="text" class="d-none form-control py-2 px-3 br-12 inputStyle promo-input"
                                   placeholder="{{ __("profile.cart.promocode") }}">
                            <button type="submit" id="checkout-button" class="btn btn-primary br-12 w-100 fs-16 f-600 py-2">{{ __("profile.cart.button") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
