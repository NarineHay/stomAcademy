@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">СТАТЬИ</h1>
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
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">КАТЕГОРИЯ</label>
                        <select class="form-control select2" name="category_id">
                            @foreach($data['directions'] as $direction)
                                <option value="{{ $direction->id }}">
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
                                @foreach(\App\Models\Language::all() as $k => $lg)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $lg->id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-check">
                                            <label >
                                                <input type="checkbox" value="true" name="enabled[{{$lg->id}}]" class="form-check-input">
                                                <span>СТАТУС</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                                            <input type="text" value="{{ old('title')[$lg->id] ?? "" }}" name="title[{{$lg->id}}]" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ОПИСАНИЕ*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="text[{{$lg->id}}]">{{ old('text')[$lg->id] ?? "" }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 3rem">
                                            <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                                            <div class="custom-file">
                                                <input type="file" name="image[{{$lg->id}}]" class="form-control" id="customFile_{{$lg->id}}">
                                                <label class="custom-file-label" for="customFile_{{$lg->id}}">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

