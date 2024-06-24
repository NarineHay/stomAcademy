@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <livewire:front.catalog type="webinars" />
        </div>
    </div>

    <div id="cart-loader">
        <span class="cart-loader"></span>
    </div>
   
@endsection
