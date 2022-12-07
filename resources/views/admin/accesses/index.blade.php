@extends('layouts.admin')
@section('title', 'Access')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Доступы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.accesses.create')}}" role="button">Добавить</a>
                </div>
            </div>

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
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>ID</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.accesses.index',['order'=>'ID','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.accesses.index',['order'=>'ID','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Название Курса/Вебинара</th>
                                    <th>Пользователь</th>
                                    <th>Менеджер</th>
                                    <th>Дата открытия доступа </th>
                                    <th>Дата окончания доступа </th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($accesses as $access)
                                    <tr>
                                        <td>
                                            <a>{{$access->id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->course->title ?? $access->webinar->title}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->user->name}} ({{$access->user->email}})</a>
                                        </td>
                                        <td>
                                            <a>{{$access->manager_id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$access->created_at}}</a>
                                        </td>
                                        <td>
                                            @if($access->access_time == false)
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
{{--                    <div class="d-flex justify-content-center">--}}
{{--                        {{ $accesses->links() }}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection

