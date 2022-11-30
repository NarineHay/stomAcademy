@extends('layouts.admin')

@section('title', 'Certificate')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового сертификата</h1>
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
            <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КУРС</label>
                        <select class="form-control select2" name="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ X</label>
                        <input type="number" name="name_x" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ Y</label>
                        <input type="number" name="name_y" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ X</label>
                        <input type="number" name="hour_x" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ Y</label>
                        <input type="number" name="hour_y" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID X</label>
                        <input type="number" name="id_x" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID Y</label>
                        <input type="number" name="id_y" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ТИП</label>
                        <select class="form-control" name="type">
                            <option value="1">Вебинар</option>
                            <option value="0">Семинар</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ(ТОЛЬКО ДЛЯ СЕМИНАРОВ)</label>
                        <input type="number" name="hours_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА</label>
                        <input type="date" name="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                </div>

                <div class="card-footer mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

