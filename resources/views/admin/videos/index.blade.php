@extends('layouts.admin')

@section('title', 'Video')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Видео</h1>
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
                                    <th>URL</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>
                                            <a>{{$video->url}}</a>
                                        </td>

                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.videos.destroy',$video)}}" method="POST"
                                                  class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1"
                                                   href="{{ route('admin.videos.edit',$video) }}">Изменить</a>
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
                </div>
            </div>
        </div>
    </section>
@endsection
