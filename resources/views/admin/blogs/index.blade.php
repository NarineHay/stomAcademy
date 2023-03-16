@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Блог</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.blogs.create')}}" role="button">Добавить</a>
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
                                    <th>Изображение</th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Название блога</span>
{{--                                            <div class="sort ml-2 d-flex flex-nowrap">--}}
{{--                                                <a href = {{route('admin.blogs.index',['order'=>'title','sort'=>'asc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href = {{route('admin.blogs.index',['order'=>'title','sort'=>'desc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </th>
                                    <th>Категория</th>
                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Описание блога</span>
{{--                                            <div class="sort ml-2 d-flex flex-nowrap">--}}
{{--                                                <a href = {{route('admin.blogs.index',['order'=>'text','sort'=>'asc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href = {{route('admin.blogs.index',['order'=>'text','sort'=>'desc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($blog->info->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a>{{$blog->info->title}}</a>
                                        </td>
                                        <td>
                                            <a>{{ $blog->directions->title }}</a>
                                        </td>
                                        <td>
                                            <a>{{ substr(strip_tags($blog->info->text),0,200) }}...</a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.blogs.destroy',$blog)}}" method="POST" class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1" href="{{ route('admin.blogs.edit',$blog) }}">Изменить</a>
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
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

