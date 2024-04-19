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
            <form class="access_form" action="{{ route('admin.accesses.update',$access->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пользователь*</label>
                        <select class="form-control form-control" name="user_id">
                            @foreach($data['users'] as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $access->user_id ? 'selected' : '' }}>
                                    {{ $user->userinfo->fname }} {{$user->userinfo->lname}}*{{$user->email}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <div>
                            @if ($access->course_id != null)
                            <label for="course" style="margin-right: 10px">
                                <input type="radio" id="course" name="type" value="course" {{$access->course_id != null ? 'checked' : ''}}>
                                Курс</label>
                            @endif

                            @if ($access->webinar_id != null)
                            <label for="webinar">
                                <input type="radio" id="webinar" name="type" value="webinar" {{$access->webinar_id != null ? 'checked' : ''}}>
                                Вебинар</label>
                            @endif

                        </div>
                    </div> --}}
                    @if ($access->course_id != null)
                    <div class="form-group @if($access->course_id == null) d-none @endif courseDiv" id="">
                        <label for="exampleInputEmail1">Курс</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($data['courses'] as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $access->course_id ? 'selected' : '' }}>
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
@endif
@if ($access->webinar_id != null)
                    <div class="form-group @if($access->webinar_id == null) d-none @endif webinarDiv">
                        <label for="exampleInputEmail1">Вебинар</label>
                        <select class="form-control select2" name="webinar_id">
                            @foreach($data['webinars'] as $webinar)
                                <option value="{{ $webinar->id }}" {{ $webinar->id == $access->webinar_id ? 'selected' : '' }}>
                                    {{ $webinar->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус просмотра</label>
                        <div>
                            <label for="temporary" class="mr-1">
                                <input type="radio" id="temporary" name="access_time" value="1" {{$access->access_time == 1 ? 'checked' : ''}}>

                                Доступ определенный период</label>

                            <label for="permanent">
                                <input type="radio" id="permanent" name="access_time" value="0" {{$access->access_time == 0 ? 'checked' : ''}}>

                                Постоянный доступ</label>
                        </div>
                    </div>

                    <select class="form-control @if($access->access_time == 0) d-none @endif duration" name="duration">
                        @for($i = 5; $i <= 30; $i+=5)
                            <option {{ $access->duration == $i ? 'selected' : '' }} >{{$i}}</option>
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
