@extends('layouts.admin')

@section('title', 'Access')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать</h1>
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
            <form action="{{ route('admin.accesses.update',$access->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пользователь</label>
                        <select class="form-control form-control" name="user_id">
                            @foreach($data['users'] as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $access->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}*{{$user->email}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div>
                            <input type="radio" id="course" name="type" value="course" {{$access->course_id != null ? 'checked' : ''}}>
                            <label for="course" style="margin-right: 10px">Курс</label>

                            <input type="radio" id="webinar" name="type" value="webinar" {{$access->webinar_id != null ? 'checked' : ''}}>
                            <label for="webinar">Вебинар</label>
                        </div>
                    </div>

                    <div class="form-group" id="courseDiv">
                        <label for="exampleInputEmail1">Курс</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($data['courses'] as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $access->course_id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-none" id="webinarDiv">
                        <label for="exampleInputEmail1">Вебинар</label>
                        <select class="form-control select2" name="webinar_id">
                            @foreach($data['webinars'] as $webinar)
                                <option value="{{ $webinar->id }}" {{ $webinar->id == $access->webinar_id ? 'selected' : '' }}>
                                    {{ $webinar->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус просмотра</label>
                        <div>
                            <input type="radio" id="permanent" name="access_time" value="1" {{$access->access_time == true ? 'checked' : ''}}>
                            <label for="permanent" style="margin-right: 10px">Постоянный доступ</label>

                            <input type="radio" id="temporary" name="access_time" value="0" {{$access->access_time == false ? 'checked' : ''}}>
                            <label for="temporary">Доступ определенный период</label>
                        </div>
                    </div>

                    <select class="form-control d-none" name="duration" id="duration">
                        @for($i = 15; $i <= 30; $i+=5)
                            <option value="{{$i}}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
