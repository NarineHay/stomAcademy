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
            <form action="{{ route('admin.pages.update',$page->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta title:</label>
                        <input type="text" name="meta_title" class="form-control" value="{{$page->meta_title}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta description:</label>
                        <textarea class="form-control" name="meta_description">{{$page->meta_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">H1:</label>
                        <input type="text" name="heading" value="{{$page->heading}}" class="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection


