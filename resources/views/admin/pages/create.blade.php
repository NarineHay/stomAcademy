@extends('layouts.admin')

@section('title', 'Page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить</h1>
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
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">URL</label>
                        <input type="text" value="{{old('url')}}" name="url" class="form-control">
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
                                            <label for="exampleInputEmail1">Meta title*</label>
                                            <input type="text" name="meta_title[{{$lg->id}}]" class="form-control" value="{{old('meta_title') ?? ""}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Meta description*</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="summernote" name="meta_description[{{ $lg->id }}]">{{ old('meta_description') ?? "" }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Heading*</label>
                                            <input type="text" name="heading[{{$lg->id}}]" value="{{old('heading') ?? ""}}" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="card-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">Meta title*</label>--}}
{{--                        <input type="text" name="meta_title" value="{{ old('meta_title') ?? "" }}" class="form-control">--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">Meta description*</label>--}}
{{--                        <textarea class="form-control" name="meta_description">{{ old('meta_description') ?? "" }}</textarea>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleInputEmail1">H1</label>--}}
{{--                        <input type="text" name="heading" value="{{ old('heading') ?? "" }}" class="form-control">--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

