@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <x-lector-profile></x-lector-profile>
                </div>
                <div class="col-lg-1"></div>
                <livewire:lector.change-lector-profile-info/>
            </div>
        </div>
    </section>
@endsection
