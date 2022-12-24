@extends('layouts.admin')

@section('title', 'Access')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between mb-2">
                <div>
                    <h1 class="m-0">Доступы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.accesses.create')}}" role="button">Добавить</a>
                </div>
            </div>

            <form method="get">
                <div>
                    <div class="d-flex align-items-end">
                        <div class="w-25 mr-3">
                            <label>Курс/Вебинар</label>
                            <select class="form-control select2" name="search_webinar">
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">
                                        {{ $course->title }}
                                    </option>
                                @endforeach

                                @foreach($webinars as $webinar)
                                    <option value="{{ $webinar->id }}">
                                        {{ $webinar->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mr-3 w-25">
                            <label>Пользователь</label>
                            <select class="form-control select2" name="search_user">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-outline-primary" type="submit" style="height: 38px">Поиск</button>
                    </div>
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
                                    <th>Название Курса/Вебинара</th>
                                    <th>Пользователь</th>
                                    <th>Менеджер</th>
                                    <th>Дата открытия доступа</th>
                                    <th>Дата окончания доступа</th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($accesses as $access)
                                    <tr>
                                        <td>
                                            <a>{{$access->course->title ?? $access->webinar->title}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->user->name}} ({{$access->user->email}})</a>
                                        </td>
                                        <td>
                                            <a>{{$access->manager->name}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->created_at}}</a>
                                        </td>
                                        <td>
                                            @if($access->access_time == 0)
                                                <a>Никогда</a>
                                            @else
                                                <a>{{ \Carbon\Carbon::make($access->created_at)->addDay($access->duration) }}</a>
                                            @endif

                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.accesses.destroy',$access)}}" method="POST" class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1" href="{{ route('admin.accesses.edit',$access) }}">Изменить</a>
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
                        {{ $accesses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

