@extends('layouts.admin')

@section('title', 'Certificate')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового сертификата</h1>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content">
        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-primary">
            <form class="certificate_form" action="{{ route('admin.certificates.store',['access_type' => 'select']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">КУРС</label>

                        <select class="form-control select2" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <div>
                            <label style="margin-right: 10px">
                                <input type="radio" id="course" name="type" value="course" checked>
                                Курс</label>

                            <label>
                                <input type="radio" id="webinar" name="type" value="webinar">
                                Вебинар</label>
                        </div>
                    </div>

                    <div class="form-group courseDiv" >
                        <label for="exampleInputEmail1">Курс</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-none webinarDiv">
                        <label for="exampleInputEmail1">Вебинар</label>
                        <select class="form-control select2" name="webinar_id">
                            @foreach($webinars as $webinar)
                                <option value="{{ $webinar->id }}">
                                    {{ $webinar->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ</label>
                        <input type="number" value="{{ old('number') ?? "" }}"name="hours_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА</label>
                        <input type="date" value="{{ old('date') ?? "" }}" name="date" class="form-control">
                    </div>
                    @foreach(\App\Models\Language::all() as $lg)
                        <div class="form-group">
                            <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ* {{ $lg->name }}</label>
                            <div class="custom-file">
                                <input type="file" name="image[{{ $lg->id }}]" class="form-control" id="customFile_{{ $lg->id }}">
                                <label class="custom-file-label" for="customFile_{{ $lg->id }}">Choose file</label>
                            </div>
                        </div>
                    @endforeach

{{--                    <div class="card card-primary card-outline card-outline-tabs">--}}
{{--                        <div class="card-header p-0 border-bottom-0">--}}
{{--                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">--}}
{{--                                @foreach(\App\Models\Language::all() as $k => $lg)--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link @if($k == 0) active @endif" data-toggle="pill" href="#lg_tab_{{ $lg->id }}"--}}
{{--                                           role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{ $lg->name }}</a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="tab-content" id="custom-tabs-four-tabContent">--}}
{{--                                @foreach(\App\Models\Language::all() as $k => $lg)--}}
{{--                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $lg->id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>--}}
{{--                                            <div class="custom-file">--}}
{{--                                                <input type="file" name="image[{{$lg->id}}]" class="form-control" id="customFile">--}}
{{--                                                <label class="custom-file-label" for="customFile">Choose file</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="mt-5">
                        <div class="card-footer mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
