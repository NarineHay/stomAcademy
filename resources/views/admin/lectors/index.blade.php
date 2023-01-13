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
                                    <th>Аватар</th>
                                    <th>Фио лектора</th>
                                    <th>Специализация</th>
                                    <th>Кол-во курсов</th>
                                    <th>% от продаж</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($lectors as $user)
                                    <tr>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($user->userinfo->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a>{{$user->name}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector->directions->title ?? ""}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector ? $user->lector->getCourseCount() : 0}}</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector->per_of_sales ?? ""}}</a>
                                        </td>
                                       <td class="project-actions text-right">
                                            <form action="{{route('admin.lectors.destroy',$user)}}" method="POST" class="d-flex justify-content-around">
                                               @csrf
                                               @method('DELETE')
                                               <a class="btn btn-primary mx-1" href="{{ route('admin.lectors.edit',$user) }}">Изменить</a>
                                               <a class="btn btn-success mx-1" href="{{ route('admin.lectors.show',$user) }}">Показать</a>
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

