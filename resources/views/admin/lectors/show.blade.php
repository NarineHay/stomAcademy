@extends('layouts.admin')

@section('title', 'Lector')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">{{$user->name}}</h1>
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
                                    <th>Процент</th>
                                </tr>
                                </thead>

                                <tbody>

                                    @foreach($user->lector->getCourses() as $course)
                                        <tr>
                                            <td>
                                                <a href="{{ route("admin.webinar.edit",$course) }}">{{$course->info->title}}</a>
                                            </td>
                                            <td>
                                                <a>0</a>
                                            </td>
                                            <td>
                                                <a >{{$user->lector->per_of_sales ?? ""}}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($user->lector->webinars as $webinar)
                                        <tr>
                                            <td>
                                                <a href="{{ route("admin.webinar.edit",$webinar) }}">{{$webinar->info->title}}</a>
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
                </div>
            </div>
        </div>
    </section>
@endsection

