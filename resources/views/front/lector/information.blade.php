@extends("layouts.app")

@section("content")
    <section style="overflow: hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 position-relative d-none d-lg-block" style="z-index: 1;">
                    <div class="account_left_aside_bg profile_left"></div>
                    {{-- <x-lector-profile></x-lector-profile> --}}
                    <x-profile></x-profile>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-9">
                    <div class="py-4 py-lg-6 mt-5 mt-lg-6">
                        <div class="d-flex justify-content-between">
                            <h3 class="f-700 m-0">{{__('profile.profile.webinars_courses')}}</h3>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{__('profile.profile.name_webinars_courses')}}</th>
                                        <th>{{__('profile.profile.count_sales')}}</th>
                                        <th>{{__('profile.profile.amount')}}</th>
                                        <th>{{__('profile.profile.percent')}}</th>

                                        <th>{{__('profile.profile.total')}}</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php $total = 0 @endphp
                                    @foreach($data as $item)
                                    {{-- {{dd($item->webinar)}} --}}
                                        @php $total += $item->total_price @endphp

                                        <tr>
                                            <td>
                                                <a class="text-primary" href="{{ route("course.show", $item->webinar) }}">{{$item->webinar->info->title}}</a>
                                            </td>
                                            <td>
                                                <a>{{$item->count ?? ""}}</a>
                                            </td>
                                            <td>
                                                <a >{{$item->webinat_total_price ?? ""}}</a>
                                            </td>
                                            <td>
                                                <a >{{$item->per_of_sales ?? ""}}</a>
                                            </td>

                                            <td>
                                                <a >{{$item->total_price ?? ""}} $</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                @if ($total > 0 && count($data) > 0)
                                    <div class="w-100 d-flex justify-content-end ">
                                        <div class=""><strong>Всего: {{$total}} $</strong></div>
                                    </div>
                                    <div class="w-100 d-flex justify-content-end ">
                                        <a href="{{route('personal.lector_request_payment')}}"  class="btn btn-primary br-12  fs-16 f-600 py-2 mt-2">{{ __("profile.profile.request_payment") }}</a>

                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-success mb-1 mt-1">
                                        {{ __("profile.profile.".session('success')) }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
