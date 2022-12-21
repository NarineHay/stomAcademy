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

        <div class="card card-primary">
            <form action="{{ route('admin.accesses.store') }}" method="POST">
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
                            <input type="radio" id="course" name="type" value="course" checked>
                            <label for="course" style="margin-right: 10px">Курс</label>

                            <input type="radio" id="webinar" name="type" value="webinar">
                            <label for="webinar">Вебинар</label>
                        </div>
                    </div>

                    <div class="form-group" id="courseDiv">
                        <label for="exampleInputEmail1">Курс</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-none" id="webinarDiv">
                        <label for="exampleInputEmail1">Вебинар</label>
                        <select class="form-control select2" name="webinar_id">
                            @foreach($webinars as $webinar)
                                <option value="{{ $webinar->id }}">
                                    {{ $webinar->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус просмотра</label>
                        <div>
                            <input type="radio" id="temporary" name="access_time" value="1" checked>
                            <label for="temporary" style="margin-right: 10px">Доступ определенный период</label>

                            <input type="radio" id="permanent" name="access_time" value="0">
                            <label for="permanent" >Постоянный доступ</label>
                        </div>
                    </div>

                    <select class="form-control" name="duration" id="duration">
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
    </section>
@endsection
