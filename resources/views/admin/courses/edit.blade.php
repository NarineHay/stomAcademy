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
            <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ КУРСА</label>
                        <input type="text" value="{{$course->title}}" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА КУРСА</label>
                        <input type="datetime-local" value="{{$course->start_date}}" name="start_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА ОКОНЧАНИЯ КУРСА</label>
                        <input type="datetime-local" value="{{$course->end_date}}" name="end_date" class="form-control">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">ОПИСАНИЕ КУРСА</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-body">
                                        <textarea class="summernote" name="description">{{$course->description}}</textarea>
                                    </div>
                                </div>
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
                                    {{ $price->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ВЕБИНАРЫ:</label><br>
                        @foreach($data['webinars'] as $webinar)
                            @if($webinar->status != 0)
                                <input type="checkbox" name="webinar[]" value="{{ $webinar->id }}"
                                       @if( $course->webinars->where("webinar_id",$webinar->id)->count()) checked @endif
                                       class="mr-1">
                                {{$webinar->title}}
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection


