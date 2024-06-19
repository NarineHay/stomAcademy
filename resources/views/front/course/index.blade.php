@extends("layouts.app")

@section("content")
    <div class="w-100 overflow-hidden">
        <div class="container">
            <livewire:front.catalog type="courses" />
        </div>
    </div>
    <div id="loader" style="display: none; height:100%;width:100%;background:rgba(100, 100, 102, 0.288);position:absolute;left:0;top:0; z-index:1000000">Loading...</div>
@endsection
