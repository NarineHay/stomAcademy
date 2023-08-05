@extends('layouts.admin')

@section('title', 'Course')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового курса</h1>
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
            <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА*</label>
                        <input type="datetime-local" value="{{ old('start_date') ?? "" }}" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ОКОНЧАНИЯ КУРСА*</label>
                        <input type="datetime-local" value="{{ old('end_date') ?? "" }}" name="end_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                        <input type="text" value="{{ old('video') ?? "" }}" name="video" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНA</label>
                        <select class="form-control form-control select2" name="price_id">
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">НОВАЯ ЦЕНA</label>
                        <select class="form-control form-control select2" name="price_2_id">
                            <option value="0">---</option>
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label><br>
                        <select class="form-control select2" multiple name="direction_ids[]">
                            @foreach($directions as $direction)
                                <option value="{{ $direction->id }}">
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВЕБИНАРЫ*</label><br>
                        <select class="form-control select2" multiple="multiple" name="webinar[]">
                            @foreach($webinars as $webinar)
                                @if($webinar->status != 0)
                                    <option value="{{ $webinar->id }}">
                                        {{ $webinar->info->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" value="{{ old('url_to_page') ?? "" }}" name="url_to_page" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputEmail1">ФОН</label>
                        <div class="custom-file">
                            <input type="file" name="bg_image" class="form-control" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Choose file</label>
                        </div>
                    </div>

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                @foreach(\App\Models\Language::all() as $k => $lg)
                                    <li class="nav-item">
                                        <a class="nav-link @if($k == 0) active @endif" data-toggle="pill" href="#lg_tab_{{ $lg->id }}"
                                           role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{ $lg->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                @foreach(\App\Models\Language::all() as $k => $lg)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $lg->id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label >
                                                <input type="checkbox" value="true" name="enabled[{{$lg->id}}]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ КУРСА*</label>
                                            <input type="text" name="title[{{ $lg->id }}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ КУРСА</label>
{{--                                            ОПИСАНИЕ КУРСА*--}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="description[{{ $lg->id }}]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="online">
                            <label class="form-check-label" for="gridCheck">Онлайн-конференция</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

