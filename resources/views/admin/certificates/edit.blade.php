@extends('layouts.admin')

@section('title', 'Certificate')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование сертификата</h1>
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
            <form action="{{ route('certificates.update',$certificate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">КУРС</label>
                        <select class="form-control form-control select2" name="course_id">
                            @foreach($data['courses'] as $course)
                                <option value="{{ $course->id }}" {{ $course->id == $certificate->course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ X</label>
                        <input type="number" name="name_x" value="{{$certificate->name_x}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ИМЕНИ Y</label>
                        <input type="number" name="name_y" value="{{$certificate->name_y}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ X</label>
                        <input type="number" name="hour_x" value="{{$certificate->hour_x}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ЧАСОВ Y</label>
                        <input type="number" name="hour_y" value="{{$certificate->hour_y}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID X</label>
                        <input type="number" name="id_x" value="{{$certificate->id_x}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КООРДИНАТА ID Y</label>
                        <input type="number" name="id_y" value="{{$certificate->id_y}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ТИП:</label>
                        <select class="form-control" id="type" name="type">
                            <option value="1" {{$certificate->type == 1 ? " selected" : ""}}>Вебинар</option>
                            <option value="0" {{$certificate->type == 0 ? " selected" : ""}}>Семинар</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">КОЛИЧЕСТВО ЧАСОВ(ТОЛЬКО ДЛЯ СЕМИНАРОВ)</label>
                        <input type="number" name="hours_number" value="{{$certificate->hours_number}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА</label>
                        <input type="date" name="date" value="{{$certificate->date}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ</label>
                        <div class="form-group">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($certificate->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
