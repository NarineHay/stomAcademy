@extends('layouts.admin')

@section('title', 'Course')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Курсы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.course.create')}}" role="button">Добавить</a>
                </div>
            </div>
        </div>
        <form method="get" class="ml-2">
            <div class="d-flex justify-content-sm-start mt-3 w-50">
                <select class="form-control select2" name="search_course">
                    <option value="0">---</option>
                    @foreach($all_courses as $course)
                        <option @if($course->id == $search_course) selected @endif value="{{ $course->id }}">
                            {{ $course->info ? $course->info->title : $course->id }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-outline-primary ml-2" type="submit" style="height: 38px">Поиск</button>
            </div>
        </form>
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

                                    <th><span>Название курса</span></th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата проведения</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.course.index',['order'=>'start_date','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.course.index',['order'=>'start_date','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <span>Дата окончания</span>
                                            <div class="sort ml-2 d-flex flex-nowrap">
                                                <a href = {{route('admin.course.index',['order'=>'end_date','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.course.index',['order'=>'end_date','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <th>Цены</th>

                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            <a><img src="{{\Illuminate\Support\Facades\Storage::url($course->image) }}" height="70" alt=""/></a>
                                        </td>
                                        <td>
                                            <a>{{ $course->info ? $course->info->title : ""}}</a>
                                        </td>
                                        <td>
                                            <a>{{$course->start_date}}</a>
                                        </td>
                                        <td>
                                            <a>{{$course->end_date}}</a>
                                        </td>
                                        <td>
                                            <a>${{$course->price->usd}}</a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <form action="{{route('admin.course.destroy',$course)}}" method="POST" class="d-flex justify-content-around">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary mx-1" href="{{ route('admin.course.edit',$course) }}">Изменить</a>
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
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

