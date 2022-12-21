@extends('layouts.admin')

@section('title', 'Lector')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Панель лектора</h1>
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
                                    <th>Название курса/вебинара</th>
                                    <th>Кол-во продаж</th>
                                    <th>Процент лектора</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($lectors as $user)
                                    <tr>
                                        <td>
                                            <a>{{$user->lector->webinar->title ?? $user->lector->course->title}}</a>
                                        </td>
                                        <td>
                                            <a>0</a>
                                        </td>
                                        <td>
                                            <a>{{$user->lector->per_of_sales ?? ""}}</a>
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

