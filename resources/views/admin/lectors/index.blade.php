@extends('layouts.admin')
@section('title', 'Lector')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Лекторы</h1>
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
                                                <a href = {{route('admin.lectors.index',['order'=>'ID','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.lectors.index',['order'=>'ID','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Фио лектора</th>
                                    <th>Специализация</th>
                                    <th>Кол-во курсов</th>
                                    <th>% от продаж</th>
                                    <th>Статус</th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($lectors as $user)
                                    <tr>
                                        <td>
                                            <a>{{$user->id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->name}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector->direction->title}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector ? $user->lector->getCourseCount() : 0}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector->per_of_sales ?? ""}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->userinfo->status == 1 ? "Активна" : "Отключена"}}</a>
                                        </td>
                                       <td class="project-actions text-right">
                                            <form action="{{route('admin.lectors.destroy',$user)}}" method="POST" class="d-flex justify-content-around">
                                               @csrf
                                              @method('DELETE')
                                               <a class="btn btn-primary mx-1" href="{{ route('admin.lectors.edit',$user) }}">Изменить</a>
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
                        {{ $lectors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

