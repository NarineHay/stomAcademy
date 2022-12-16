@extends('layouts.admin')
@section('title', 'Promo')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Промокоды</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.promo.create')}}" role="button">Добавить</a>
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
                                                <a href= {{route('admin.promo.index',['order'=>'ID','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href= {{route('admin.promo.index',['order'=>'ID','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Код</th>

                                    <th>Процент</th>

                                    <th>Min</th>

                                    <th>Кол. исп.</th>

                                    <th>Макс. кол.</th>

                                    <th>Статус</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($promos as $promo)
                                    <tr>
                                        <td>
                                            <a>{{$promo->id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->code}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->prc}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->min}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->used}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->max}}</a>
                                        </td>
                                        <td>
                                            <a>{{$promo->status}}</a>
                                        </td>

                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.promo.destroy',$promo)}}" method="POST"
                                                  class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1"
                                                   href="{{ route('admin.promo.edit',$promo) }}">Изменить</a>
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger mx-1" id="button">Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $promos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


