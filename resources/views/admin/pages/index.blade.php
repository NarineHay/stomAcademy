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
{{--                                    <th>--}}
{{--                                        <div class="d-flex align-items-center flex-nowrap">--}}
{{--                                            <span>ID</span>--}}
{{--                                            <div class="sort ml-2 d-flex flex-nowrap">--}}
{{--                                                <a href = {{route('admin.pages.index',['order'=>'ID','sort'=>'asc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href = {{route('admin.pages.index',['order'=>'ID','sort'=>'desc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </th>--}}

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Meta title</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.pages.index',['order'=>'meta_title','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.pages.index',['order'=>'meta_title','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Meta description</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.pages.index',['order'=>'meta_description','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.pages.index',['order'=>'meta_description','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>H1</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.pages.index',['order'=>'H1','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.pages.index',['order'=>'H1','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
{{--                                        <td>--}}
{{--                                            <a>{{$page->id}}</a>--}}
{{--                                        </td>--}}
                                        <td>
                                            <a>{{$page->meta_title}}</a>
                                        </td>
                                        <td>
                                            <a>{{$page->meta_description}}</a>
                                        </td>
                                        <td>
                                            <a>{{$page->heading}}</a>
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


