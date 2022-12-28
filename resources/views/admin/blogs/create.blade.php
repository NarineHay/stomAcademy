@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Блог</h1>
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ*</label>
                        <input type="text" value="{{ old('title') ?? "" }}" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ*</label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="summernote" name="text">{{ old('text') ?? "" }}</textarea>
                            </div>
                        </div>
                    </div>
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
                    <div class="form-group" style="margin-bottom: 3rem">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ*</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
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

