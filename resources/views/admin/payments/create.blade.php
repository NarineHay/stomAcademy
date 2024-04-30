@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить оплату</h1>
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
            <form action="{{ route('admin.payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пользователь*</label>
                        <select class="form-control select2" name="user_id">
                            <option value="" selected>Пользователь</option>
                            @foreach($users as $user)
                                <option  value="{{ $user->id }}" >
                                    {{ $user->userinfo->fname}}{{ $user->userinfo->fname}}/{{$user->email}}/{{$user->userinfo->phone}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Курс*</label>
                        <select class="form-control select2" multiple="multiple" name="course_ids[]">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Вебинар*</label>
                        <select class="form-control select2" multiple="multiple" name="webinar_ids[]">
                                @foreach($webinars as $webinar)
                                    <option value="{{ $webinar->id }}">
                                        {{ $webinar->info->title ?? ''}}
                                    </option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sum">Сумма*</label>
                        <input value="{{ old("sum") }}" type="text" name="sum" class="form-control" id="sum">
                    </div>

                    <div class="form-group">
                        <label for="cur">Валюта*</label>

                        <select class="form-control select2" name="cur">
                            <option value="" selected>Валюта</option>
                            @foreach($currency as $cur)
                                <option value="{{ $cur->currency_name }}">
                                    {{ $cur->currency_name ?? ''}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Комментарий*</label>
                        <textarea name="comment" class="form-control">{{ old("comment") }}</textarea>
                    </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
