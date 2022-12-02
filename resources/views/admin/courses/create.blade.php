@extends('layouts.admin')

@section('title', 'Webinar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового курса</h1>
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
            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ КУРСА</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА</label>
                        <input type="datetime-local" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ОКОНЧАНИЯ КУРСА</label>
                        <input type="datetime-local" name="end_date" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ КУРСА</label>
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
                        <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                        <input type="text" name="video" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНЫ</label>
                        <select class="form-control form-control select2" name="price_id">
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">
                                    {{ $price->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВЕБИНАРЫ:</label>
                        <ul class="list-unstyled">
                            @foreach($webinars as $webinar)
                                <li>
                                    <label class="form-check-label">
                                        <input type="checkbox" value="{{$webinar->id}}" class="mr-2" name="webinar[]">
                                        <span>{{$webinar->title}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

