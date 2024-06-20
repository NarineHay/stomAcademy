@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <livewire:front.catalog type="courses" />
        </div>
    </div>
    <div id="cart-loader">
        <span class="cart-loader"></span>
    </div>
@endsection
@push('scripts')
    <script src="{{asset('js/add-to-cart.js')}}"></script>
@endpush
