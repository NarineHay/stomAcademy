@extends('layouts.admin')

@section('title', 'Video')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Главная страница</h1>
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

        <div class="card">
            <div class="card-body">
                <form action="{{ route("admin.index.update",1) }}" method="POST">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Популярные курсы</label>
                        <select class="form-control select2" multiple="multiple" name="popular[]">
                            @foreach($courses as $course)
                                <option @if(in_array($course->id,$content['popular'])) selected @endif value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Новые курсы</label>
                        <select class="form-control select2" multiple="multiple" name="new[]">
                            @foreach($courses as $course)
                                <option @if(in_array($course->id,$content['new'])) selected @endif value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Онлайн-конференции</label>
                        <select class="form-control select2" multiple="multiple" name="online_co[]">
                            @foreach($onlines as $course)
                                <option @if(in_array($course->id,$content['online_co'])) selected @endif value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Онлайн-лекции</label>
                        <select class="form-control select2" multiple="multiple" name="online_le[]">
                            @foreach($webinars as $course)
                                <option @if(in_array($course->id,$content['online_le'])) selected @endif value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Полезные статьи</label>
                        <select class="form-control select2" multiple="multiple" name="articles[]">
                            @foreach($articles as $course)
                                <option @if(in_array($course->id,$content['articles'])) selected @endif value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Наши Лектора</label>
                        <select class="form-control select2" multiple="multiple" name="lectors[]">
                            @foreach($lectors as $lector)
                                <option @if(in_array($lector->id,$content['lectors'])) selected @endif value="{{ $lector->id }}">
                                    {{ $lector->userInfo->fullName }} - {{ $lector->email }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Изменить</button>
                </form>
            </div>
        </div>
    </section>
@endsection
