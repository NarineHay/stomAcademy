@extends('layouts.admin')

@section('title', 'Webinar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Вебинары</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.webinar.create')}}" role="button">Добавить</a>
                </div>
            </div>
        </div>

        <form method="get" class="ml-2">
            <div>
                <div class="d-flex align-items-end">
                    <div class="w-25 mr-3">
                        <select class="form-control select2" name="search_webinar">
                            <option value="0">---</option>
                            @foreach($all_webinars as $webinar)
                                <option @if($webinar->id == $search_webinar) selected @endif value="{{ $webinar->id }}">
                                    {{ $webinar->info->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mr-3 w-25">
                        <label>Пользователь</label>
                        <select class="form-control select2" name="search_user">
                            <option value="0">---</option>
                            @foreach($users as $user)
                                <option @if($user->id == $search_user) selected @endif value="{{ $user->id }}">
                                    {{ $user->userinfo->fname }} {{ $user->userinfo->lname }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-outline-primary" type="submit" style="height: 38px">Поиск</button>
                </div>
            </div>
        </form>
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
                                    <th><span>Изображение</span></th>
                                    <th><span>Название вебинара</span>
                                    </th>
                                    <th><span>Лектор</span></th>
                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата проведения</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.webinar.index',['order'=>'start_date','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.webinar.index',['order'=>'start_date','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Кол-во польз.</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Статус</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.webinar.index',['order'=>'status','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.webinar.index',['order'=>'status','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th><span>Кнопки управления</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($webinars as $webinar)
                                    <tr>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($webinar->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a>{{$webinar->info->title}}</a>
                                        </td>
                                        <td>
                                            <a>{{$webinar->user->userinfo->fname}} {{$webinar->user->userinfo->lname}}</a>
                                        </td>
                                        <td>
                                            <a>{{$webinar->start_date}}</a>
                                        </td>
                                        <td>
                                            <a>0</a>
                                        </td>
                                        <td>
                                            <a>{{$webinar->status == 1 ? "Активен" : "Отключен"}}</a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.webinar.destroy',$webinar)}}" method="POST" class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1" href="{{ route('admin.webinar.edit',$webinar) }}">Изменить</a>
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $webinars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
