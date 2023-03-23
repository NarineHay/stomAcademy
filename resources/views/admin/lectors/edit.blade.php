@extends('layouts.admin')

@section('title', 'Lector')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование лектора</h1>
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
            <form action="{{ route('admin.lectors.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ*</label>
                        <input type="text" value="{{ $user->userinfo->fname }}" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ФАМИЛИЯ*</label>
                        <input type="text" value="{{$user->userinfo->lname}}" name="lname" class="form-control">
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Специализация</label>
                        <select class="form-control select2" multiple name="direction_ids[]">
                            @foreach($directions as $direction)
                                <option value="{{ $direction->id }}" {{ $lector_directions->contains($direction->id) ? 'selected' : '' }}>
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Аватарка лектора</label>
                        <div class="form-group">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->userinfo->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Фото лектора</label>
                        <div class="form-group">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="photo" class="form-control" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Страна лектора</label>
                        <select class="form-control select2" name="country_id">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $user->userinfo->country_id ? 'selected' : '' }}>
                                    {{ $country->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">% От продаж*</label>
                        <input type="number" value="{{$user->lector->per_of_sales}}" name="per_of_sales" class="form-control">
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
                                @foreach($user->lector->infos as $k => $info)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $info->lg_id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" @checked($info->enabled) value="true" name="enabled[{{ $info->lg_id }}]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Биография*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="biography[{{ $info->lg_id }}]">{{$info->biography}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
