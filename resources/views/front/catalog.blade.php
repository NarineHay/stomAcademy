@extends("layouts.app")

@section('header-script')
    <script src="{{asset('front/js/dropdown.js')}}"></script>
@endsection
@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <livewire:front.catalog type="catalog" />
        </div>
    </div>

    <div id="cart-loader">
        <span class="cart-loader"></span>
    </div>
 
@endsection
