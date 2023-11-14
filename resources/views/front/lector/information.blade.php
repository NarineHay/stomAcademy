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
                                        <th>{{__('profile.profile.percent')}}</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($user->lector->getCourses() as $course)
                                        <tr>
                                            <td>
                                                <a class="text-primary" href="{{ route("course.show",$course) }}">{{$course->info->title}}</a>
                                            </td>
                                            <td>
                                                <a>0</a>
                                            </td>
                                            <td>
                                                <a >{{$user->lector->per_of_sales ?? ""}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($user->lector->webinars as $webinar)
                                        <tr>
                                            <td>
                                                <a class="text-primary"  href="{{ route("webinar.show",$webinar) }}">{{$webinar->info->title}}</a>
                                            </td>
                                            <td>
                                                <a>0</a>
                                            </td>
                                            <td>
                                                <a>{{$user->lector->per_of_sales ?? ""}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
