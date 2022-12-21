@extends('layouts.admin')

@section('title', 'Lector')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование лектора</h1>
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
            <form action="{{ route('admin.lectors.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фио лектора</label>
                        <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Введите Имя и Фамилию...">
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Специализация</label>
                        <select class="form-control select2" name="direction_id">
                            @foreach($directions as $direction)
                                <option value="{{ $direction->id }}" {{ $direction->id == $user->lector->direction_id ? 'selected' : '' }}>
                                    {{ $direction->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Биография*</label>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="summernote" name="biography">{{$user->lector->biography}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Аватарка лектора</label>
                        <div class="form-group">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->userinfo->image) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Фото лектора</label>
                        <div class="form-group">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($user->lector->photo) }}" height="100" alt=""/>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="photo" class="form-control" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Страна лектора</label>
                        <select class="form-control select2" name="country_id">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $user->userinfo->country_id ? 'selected' : '' }}>
                                    {{ $country->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">% От продаж*</label>
                        <input type="number" value="{{$user->lector->per_of_sales}}" name="per_of_sales" class="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection
