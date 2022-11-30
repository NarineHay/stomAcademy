@extends('layouts.admin')
@section('title', 'Certificate')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Сертификаты</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('certificates.create')}}" role="button">Добавить</a>
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
                                                <a href = {{route('certificates.index',['order'=>'ID','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('certificates.index',['order'=>'ID','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Название курса</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('certificates.index',['order'=>'','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('certificates.index',['order'=>'','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>Изображение</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($certificates as $certificate)
                                    <tr>
                                        <td>
                                            <a>{{$certificate->id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$certificate->course->title}}</a>
                                        </td>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($certificate->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('certificate.destroy',$certificate)}}" method="POST" class="d-flex justify-content-between">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1" href="{{ route('certificate.edit',$certificate) }}">Изменить</a>
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
{{--                        {{ $certificates->links() }}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection

