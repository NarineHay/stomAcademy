@extends('layouts.admin')

@section('title', 'Edit page')

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
            <form action="{{ route('admin.pages.update',$page->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
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
                                @foreach($page as $k => $info)
                                    <div class="tab-pane fade @if($k == 0) show active @endif" id="lg_tab_{{ $info->lg_id }}" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta title*</label>
                                            <input type="text" name="meta_title[{{$info->lg_id}}]" class="form-control" value="{{$info->meta_title}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta description*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="meta_description[{{ $info->lg_id }}]">{{$info->meta_description}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">H1*</label>
                                            <input type="text" name="heading[{{$info->lg_id}}]" value="{{$info->heading}}" class="form-control">
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


