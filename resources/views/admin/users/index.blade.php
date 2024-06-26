 @extends('layouts.admin')

@section('title', 'User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Пользователи</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.users.create')}}" role="button">Добавить</a>
                </div>
            </div>

            <form method="get">
                <div class="d-flex justify-content-sm-start mt-3 w-50">
                    <select class="form-control select2" name="search_user">
                        <option value="0">---</option>
                        @foreach($all_users as $user)
                            <option @if($user->id == $search_user) selected @endif value="{{ $user->id }}">
                                {{ $user->userinfo->fname}}{{ $user->userinfo->fname}}/{{$user->email}}/{{$user->userinfo->phone}}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary ml-2" type="submit" style="height: 38px">Поиск</button>
                </div>
            </form>
        </div>
    </div>

    <section class="content">
        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <span>Изображение</span>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Пользователь</span>
                                            <div class="sort ml-2">
                                                <a href={{route('admin.users.index',['order'=>'name','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href={{route('admin.users.index',['order'=>'name','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Страна</span></th>

                                    <th><span>Телефон</span></th>

                                    <th><span>Баланс</span></th>

                                    <th><span>Статус</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Привелегии</span>
                                            <div class="sort ml-2">
                                                <a href={{route('admin.users.index',['order'=>'role','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href={{route('admin.users.index',['order'=>'role','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        Кнопки управления
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <p class="mb-0"><b>{{$user->userinfo->fname}} {{$user->userinfo->lname}}</b></p>
                                            <p class="mb-0">{{$user->email}}</p>
                                            <p class="mb-0">Зарегистрован։{{$user->created_at}}</p>
                                        </td>
                                        <td>
                                            <a>{{$user->userinfo->country->title  ?? ""}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->userinfo->phone}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->balance->balance}}$</a>
                                        </td>
                                        <td>
                                            <a>{{$user->userinfo->status == 1 ? "Активирован" : "Не активирован"}}</a>
                                        </td>
                                        <td>
                                            <a>
                                                {{$user->role == \App\Models\User::ROLE_USER ? "Пользователь" :
                                                 ($user->role == \App\Models\User::ROLE_ADMIN ? "Администратор" :
                                                 ($user->role == \App\Models\User::ROLE_LECTOR ? "Лектор" : "Модератор"))}}
                                            </a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="d-flex justify-content-around">
                                                @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-primary mx-1" href="{{ route('admin.users.edit',$user) }}">Изменить</a>
                                                @if($user->id != 1)
                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
