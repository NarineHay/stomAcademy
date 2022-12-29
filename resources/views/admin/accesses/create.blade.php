@extends('layouts.admin')

@section('title', 'Access')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового доступа</h1>
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

        <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#type_tub_1"
                                   role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Select</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#type_tub_2"
                               role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Mass rassilka</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="type_tub_1" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <form class="access_form" action="{{ route('admin.accesses.store',['access_type' => 'select']) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Пользователь*</label>
                                        <select class="form-control select2" multiple="multiple" name="user_ids[]">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}*{{$user->email}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

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
                                        <label for="exampleInputEmail1">Статус просмотра</label>
                                        <div>
                                            <label style="margin-right: 10px">
                                                <input type="radio" id="temporary" name="access_time" value="1" checked>
                                                Доступ определенный период</label>

                                            <label>
                                                <input type="radio" id="permanent" name="access_time" value="0">
                                                Постоянный доступ</label>
                                        </div>
                                    </div>

                                    <select class="form-control duration" name="duration" >
                                        @for($i = 5; $i <= 30; $i+=5)
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="card-footer mt-4">
                                    <button type="submit" class="btn btn-primary">Открыть доступ</button>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade " id="type_tub_2" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <form class="access_form" action="{{ route('admin.accesses.store',['access_type' => 'new']) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Пользователь*</label>
                                        <textarea class="form-control" name="users"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label  style="margin-right: 10px">
                                                <input type="radio" id="course" name="type" value="course" checked>
                                                Курс</label>

                                            <label>
                                                <input type="radio" id="webinar" name="type" value="webinar">
                                                Вебинар</label>
                                        </div>
                                    </div>

                                    <div class="form-group courseDiv">
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
                                        <label for="exampleInputEmail1">Статус просмотра</label>
                                        <div>
                                            <label  style="margin-right: 10px">
                                                <input type="radio" id="temporary" name="access_time" value="1" checked>
                                                Доступ определенный период</label>

                                            <label >
                                                <input type="radio" id="permanent" name="access_time" value="0">
                                                Постоянный доступ</label>
                                        </div>
                                    </div>

                                    <select class="form-control duration" name="duration" >
                                        @for($i = 5; $i <= 30; $i+=5)
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>

                                <div class="card-footer mt-4">
                                    <button type="submit" class="btn btn-primary">Открыть доступ</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
        </section>
@endsection
