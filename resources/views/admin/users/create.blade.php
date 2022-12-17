@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление нового пользователя</h1>
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
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ И ФАМИЛИЯ:</label>
                        <input value="{{ old("name") }}" type="text" name="name" class="form-control" placeholder="Введите Имя и Фамилию...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПАРОЛЬ:</label>
                        <input value="{{ old("password") }}" type="text" name="password" class="form-control" placeholder="ПАРОЛЬ...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЭЛЕКТРОНАНЯ ПОЧТА:</label>
                        <input value="{{ old("email") }}" type="email" name="email" class="form-control" placeholder="Введите электронную почту...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">EMAIL YOUTUBE.COM:</label>
                        <input value="{{ old("youtube_email") }}" type="email" name="youtube_email" class="form-control" placeholder="Введите Email для youtube.com...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ТЕЛЕФОН:</label>
                        <input value="{{ old("phone") }}" type="text" name="phone" class="form-control" placeholder="Введите телефон...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА РОЖДЕНИЯ:</label>
                        <input value="{{ old("birth_date") }}" type="date" name="birth_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТРАНА:</label>
                        <select class="form-control form-control select2" name="country_id">
                            @foreach($countries as $country)
                                <option @if($country->id == old("country_id")) selected @endif value="{{ $country->id }}">{{ $country->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ГОРОД:</label>
                        <input type="text" name="city" class="form-control" placeholder="Введите город проживания...">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИНТЕРЕСУЮЩИЕ НАПРАВЛЕНИЯ:</label>
                        <ul class="list-unstyled">
                        @foreach($directions as $direction)
                            <li>
                                <label class="form-check-label">
                                    <input @if(old('directions') && in_array($direction->id,old('directions'))) checked @endif type="checkbox" value="{{$direction->id}}" class="mr-2" name="directions[]">
                                        <span>{{$direction->title}}</span>
                                </label>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС:</label>
                        <select class="form-control" name="status">
                            <option value="1">Активирован</option>
                            <option value="0">Не активирован</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПРИВИЛЕГИИ:</label>
                        <select class="form-control select2" name="role">
                            <option value="{{ \App\Models\User::ROLE_USER }}">Пользователь</option>
                            <option value="{{ \App\Models\User::ROLE_ADMIN }}">Администратор</option>
                            <option value="{{ \App\Models\User::ROLE_LECTOR }}">Лектор</option>
                            <option value="{{ \App\Models\User::ROLE_MODER }}">Модератор</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фотография</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
