@extends('layouts.admin')

@section('title', 'Edit user')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя</h1>
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
            <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ИМЯ И ФАМИЛИЯ:</label>
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПАРОЛЬ:</label>
                        <input type="text" value="{{ $user->password }}" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ЭЛЕКТРОНАНЯ ПОЧТА:</label>
                        <input type="text" value="{{ $user->email }}" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">EMAIL YOUTUBE.COM:</label>
                        <input type="text" value="{{ $user->userinfo->youtube_email }}" name="youtube_email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ТЕЛЕФОН:</label>
                        <input type="text" value="{{ $user->userinfo->phone }}" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ДАТА РОЖДЕНИЯ:</label>
                        <input type="date" value="{{ $user->userinfo->birth_date }}" name="birth_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТРАНА:</label>
                        <select class="form-control form-control" id="type" name="country_id">
                            @foreach($data['countries'] as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $user->userinfo->country_id ? 'selected' : '' }}>
                                    {{ $country->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ГОРОД:</label>
                        <input type="text" value="{{ $user->userinfo->city }}" name="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ИНТЕРЕСУЮЩИЕ НАПРАВЛЕНИЯ:</label><br>
                        @foreach($data['directions'] as $direction)
                            <input type="checkbox" name="direction[]" value="{{ $direction->id }}"
                                @if( $user->directions->where("direction_id",$direction->id)->count()) checked @endif
                            class="mr-1">{{$direction->title}}<br>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">СТАТУС:</label>
                        <select class="form-control" id="type" name="status">
                            <option value="1" {{$user->userinfo->status == 1 ? " selected" : ""}}>Активирован</option>
                            <option value="0" {{$user->userinfo->status == 0 ? " selected" : ""}}>Не активирован</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">ПРИВИЛЕГИИ:</label>
                        <select class="form-control select2" id="type" name="role">
                            <option {{$user->role == \App\Models\User::ROLE_USER ? " selected" : ""}} value="{{ \App\Models\User::ROLE_USER }}">Пользователь</option>
                            <option {{$user->role == \App\Models\User::ROLE_ADMIN ? " selected" : ""}} value="{{ \App\Models\User::ROLE_ADMIN }}">Администратор</option>
                            <option {{$user->role == \App\Models\User::ROLE_LECTOR ? " selected" : ""}} value="{{ \App\Models\User::ROLE_LECTOR }}">Лектор</option>
                            <option {{$user->role == \App\Models\User::ROLE_MODER ? " selected" : ""}} value="{{ \App\Models\User::ROLE_MODER }}">Модератор</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Фотография</label>
                        <div class="form-group">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($user->userinfo->image) }}" height="100" alt=""/>
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

