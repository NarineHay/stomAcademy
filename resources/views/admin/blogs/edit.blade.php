@extends('layouts.admin')

@section('title', 'Edit blog')

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

    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-primary">
            <form action="{{ route('admin.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label>
                        <select class="form-control select2" name="category_id">
                            @foreach($directions as $direction)
                                <option value="{{ $direction->id }}" {{ $direction->id == $blog->category_id ? 'selected' : '' }}>
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
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
                                @foreach($blog->infos as $k => $info)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $info->lg_id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label>
                                                <input type="checkbox" @checked($info->enabled) value="true" name="enabled[{{ $info->lg_id }}]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                                            <input type="text" value="{{ $info->title }}" name="title[{{$info->lg_id}}]" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="text[{{$info->lg_id}}]">{{$info->text}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                                            <div class="form-group">
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($info->image) }}" height="100" alt=""/>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="image[{{$info->lg_id}}]" class="form-control" id="customFile_{{ $info->lg_id }}">
                                                <label class="custom-file-label" for="customFile_{{ $info->lg_id }}">Choose file</label>
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


