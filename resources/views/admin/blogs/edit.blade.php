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
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                        <input type="text" value="{{ $blog->title }}" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ*</label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="summernote" name="text">{{$blog->text}}</textarea>
                            </div>
                        </div>
                    </div>
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                        <div class="form-group">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($blog->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
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


