@extends('layouts.admin')

@section('title', 'Webinar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового вебинара</h1>
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
            <form action="{{ route('admin.webinar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ЛЕКТОР</label>
                        <select name="user_id" class="form-control select2">
                            @foreach($lectors as $lector)
                                @if($lector->user->role == 'lector')
                                    <option value="{{ $lector->id }}">
                                        {{ $lector->user->userinfo->fname }} {{ $lector->user->userinfo->lname }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ВЕБИНАРА*</label>
                        <input type="datetime-local" value="{{ old('start_date') ?? "" }}" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО МИНУТ*</label>
                        <input type="number" value="{{ old('duration') ?? "" }}" name="duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНЫ</label>
                        <select class="form-control form-control select2" name="price_id">
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label><br>
                        <select class="form-control" name="direction_id">
                            @foreach($directions as $direction)
                                <option value="{{ $direction->id }}">
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" value="{{ old('url_to_page') ?? "" }}" name="url_to_page" class="form-control">
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
                                @foreach(\App\Models\Language::all() as $k => $lg)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $lg->id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ ВЕБИНАРА*</label>
                                            <input type="text" name="title[{{ $lg->id }}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ ВЕБИНАРА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="description[{{ $lg->id }}]"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ПРОГРАММА*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="program[{{ $lg->id }}]"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                                            <input type="text" name="video_invitation[{{ $lg->id }}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ВИДЕО</label>
                                            <input type="text" name="video[{{ $lg->id }}]" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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

