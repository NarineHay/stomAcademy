@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    <x-profile></x-profile>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
                        <div class="d-flex justify-content-between">
                            <h3 class="f-700 m-0">Настройки профиля</h3>
                        </div>
                        <livewire:front.change-info/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
