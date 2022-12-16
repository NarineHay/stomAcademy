@extends('layouts.admin')

@section('title', 'Denomination')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Новое наименование</h1>
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
            <form action="{{ route('') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ НАИМЕНОВАНИЯ</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ НАИМЕНОВАНИЯ</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <textarea class="summernote" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КУРС</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВЕБИНАР</label>
                        <select class="form-control select2" name="webinar_id">
                            @foreach($webinars as $webinar)
                                <option value="{{$webinar->id}}">{{$webinar->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <div>
                            <label for="exampleInputEmail1">ВАЛЮТА</label>
                            <select class="form-control select2" name="currency_id">
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->id}}">{{$currency->currency_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="exampleInputEmail1">ЦЕНА</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
