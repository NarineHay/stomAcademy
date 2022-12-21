@extends('layouts.admin')

@section('title', 'Course')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Информация о курсе</h1>
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
            <form action="{{ route('admin.courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ КУРСА*</label>
                        <input type="text" value="{{$course->title}}" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА*</label>
                        <input type="datetime-local" value="{{$course->start_date}}" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ОКОНЧАНИЯ КУРСА*</label>
                        <input type="datetime-local" value="{{$course->end_date}}" name="end_date" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ КУРСА*</label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="summernote" name="description">{{$course->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВИДЕО ПРИГЛАШЕНИЕ/ТРЕЙЛЕРЫ</label>
                        <input type="text" value="{{$course->video}}" name="video" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЦЕНЫ</label>
                        <select class="form-control form-control" name="price_id">
                            @foreach($data['prices'] as $price)
                                <option value="{{ $price->id }}" {{ $price->id == $course->price_id ? 'selected' : '' }}>
                                    {{ $price->name }} - ${{$price->usd}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВЕБИНАРЫ*</label><br>
                        <select class="form-control select2" multiple="multiple" name="webinar[]">
                                @foreach($data['webinars'] as $webinar)
                                    @if($webinar->status != 0)
                                        <option value="{{ $webinar->id }}" @if( $course->webinars->where("webinar_id",$webinar->id)->count()) selected @endif>
                                            {{ $webinar->title }}
                                        </option>
                                    @endif
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ССЫЛКА НА СТРАНИЦУ</label>
                        <input type="text" value="{{$course->url_to_page}}" name="url_to_page" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИЗОБРАЖЕНИЕ</label>
                        <div class="form-group">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
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


