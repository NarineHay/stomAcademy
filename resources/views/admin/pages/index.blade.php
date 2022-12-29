@extends('layouts.admin')

@section('title', 'Page')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Все страницы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.pages.create')}}" role="button">Добавить</a>
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
                                        <th><span>Meta title</span></th>

                                        <th><span>Meta description</span></th>

                                        <th><span>Heading</span></th>

                                        <th><span>Кнопки управления</span></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>
                                                <a>{{$page->info->meta_title}}</a>
                                            </td>

                                            <td>
                                                <a>{{strip_tags($page->info->meta_description)}}</a>
                                            </td>

                                            <td>
                                                <a>{{$page->info->heading}}</a>
                                            </td>

                                            <td class="project-actions text-right">
                                                <form action="{{route('admin.pages.destroy',$page)}}" method="POST" class="d-flex justify-content-around">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-primary mx-1" href="{{ route('admin.pages.edit',$page) }}">Изменить</a>
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
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


