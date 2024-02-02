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
                                <option value="0">---</option>
                                @foreach($courses as $course)
                                    <option @if($course->id == $search_webinar) selected @endif value="{{ $course->id }}">
                                        {{ $course->info->title }}
                                    </option>
                                @endforeach

                                @foreach($webinars as $webinar)
                                    <option @if($webinar->id == $search_webinar) selected @endif  value="{{ $webinar->id }}">
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
                                        @if(!$user->userinfo->fname && !$user->userinfo->lname)
                                            {{ $user->email }}
                                        @else
                                            {{ $user->userinfo->fname }} {{ $user->userinfo->lname }}
                                        @endif
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
                                            <a>{{$access->course->info->title ?? ($access->webinar->info->title ?? "")}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->user->userinfo->fname}} {{$access->user->userinfo->lname}}  ({{$access->user->email}})</a>
                                        </td>
                                        <td>
                                            @if($access->manager)
                                                <a>{{$access->manager->userinfo->fname}} {{$access->manager->userinfo->lname}}</a>
                                            @endif
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

