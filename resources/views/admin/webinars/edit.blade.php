@extends('layouts.admin')

@section('title', 'Webinar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Информация о вебинаре</h1>
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
            <form action="{{ route('admin.webinar.update',$webinar->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ВЕБИНАРА*</label>
                        <input type="datetime-local" value="{{$webinar->start_date}}" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО МИНУТ*</label>
                        <input type="number" value="{{$webinar->duration}}" name="duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНЫ</label>
                        <select class="form-control form-control select2" name="price_id">
                            @foreach($data['prices'] as $price)
                                <option value="{{ $price->id }}" {{ $price->id == $webinar->price_id ? 'selected' : '' }}>
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label><br>
                        <select class="form-control" name="direction_id">
                            @foreach($data['directions'] as $direction)
                                <option value="{{ $direction->id }}" {{ $direction->id == $webinar->direction_id ? 'selected' : '' }}>
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ</label>
                        <div class="form-group">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($webinar->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС</label>
                        <select class="form-control select2" id="type" name="status">
                            <option value="1" {{$webinar->status == 1 ? " selected" : ""}}>Активен</option>
                            <option value="0" {{$webinar->status == 0 ? " selected" : ""}}>Отключен</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" value="{{$webinar->url_to_page}}" name="url_to_page" class="form-control">
                    </div>


                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                @foreach(\App\Models\Language::all() as $k => $lg)
                                    <li class="nav-item">
                                        <a class="nav-link @if($k == 0) active @endif" data-toggle="pill" href="#lg_tab_{{ $lg->id }}" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{ $lg->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                @foreach($webinar->infos as $k => $info)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $info->lg_id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ ВЕБИНАРА*</label>
                                            <input type="text" value="{{$info->title}}" name="title[{{$info->lg_id}}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ ВЕБИНАРА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="description[{{ $info->lg_id }}]">{{$info->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ПРОГРАММА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="program[{{ $info->lg_id }}]">{{$info->program}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                                            <input type="text" value="{{$info->video_invitation}}" name="video_invitation[{{$info->lg_id}}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО</label>
                                            <input type="text" value="{{$info->video}}" name="video[{{$info->lg_id}}]" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection


