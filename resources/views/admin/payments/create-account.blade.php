@extends('layouts.admin')

@section('title', 'Access')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создать счет</h1>
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
          @if(session('payment_url'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('payment_url') }}
            </div>
        @endif

        <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#type_tub_1"
                                   role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Выставить счет</a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#type_tub_2"
                               role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Cоздание постоянного счета</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="type_tub_1" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <form action="{{ route('admin.payment_create_account') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="cur">Платежная система *</label>

                                        <select class="form-control select2" name="type">
                                            <option value="" disabled selected>Платежная система</option>
                                            <option value="yookassa" >Yookassa</option>
                                            <option value="bepaid">Bepaid</option>

                                        </select>
                                    </div>

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
                                        <label for="comment">Комментарий к оплате</label>
                                        <textarea name="comment" class="form-control">{{ old("comment") }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="manager_comment">Комментарий менеджера</label>
                                        <textarea name="manager_comment" class="form-control">{{ old("manager_comment") }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>


                        <div class="tab-pane fade " id="type_tub_2" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <form action="{{ route('admin.payment_create_account') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="cur">Платежная система *</label>

                                        <select class="form-control select2" name="type">
                                            <option value="" disabled selected>Платежная система</option>
                                            <option value="yookassa" >Yookassa</option>
                                            <option value="bepaid">Bepaid</option>

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
                                        <label for="comment">Комментарий к оплате</label>
                                        <textarea name="comment" class="form-control">{{ old("comment") }}</textarea>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
