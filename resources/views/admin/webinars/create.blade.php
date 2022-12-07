@extends('layouts.admin')

@section('title', 'Webinar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового вебинара</h1>
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
            <form action="{{ route('admin.webinars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ЛЕКТОР</label>
                        <select class="form-control form-control select2">
                            @foreach($lectors as $lector)
                                @if($lector->user->role == 'lector')
                                    <option value="{{ $lector->id }}">
                                        {{ $lector->user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ ВЕБИНАРА</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ВЕБИНАРА</label>
                        <input type="datetime-local" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ОКОНЧАНИЯ ВЕБИНАРА</label>
                        <input type="datetime-local" name="end_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО МИНУТ</label>
                        <input type="number" name="duration" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ ВЕБИНАРА</label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="summernote" name="description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПРОГРАММА</label>
                        <div class="row">
                            <div class="col-md-12">
                                 <textarea class="summernote" name="program"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                        <input type="text" name="video_invitation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНЫ</label>
                        <select class="form-control form-control select2" name="price_id">
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВИДЕО(Vimeo YouTube)</label>
                        <input type="text" name="video" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фотография</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" name="url_to_page" class="form-control">
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

