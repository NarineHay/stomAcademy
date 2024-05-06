@extends('layouts.admin')
@section('title', 'Payment')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Оплаты</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.payment.create')}}" role="button">Добавить</a>
                    <a class="btn btn-primary" href="{{route('admin.create_account_index')}}" role="button">Создать счет</a>

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
                            <div>
                                <form action="{{route('admin.payment.index')}}" method="get" class="row g-3 mt-2 d-flex" >
                                    <div class="mb-3 justify-content-end d-flex w-100" >

                                        <div class="d-flex col-4 justify-content-sm-start">
                                            <select class="form-control select2" name="user">
                                                <option value="" selected>Пользователь</option>
                                                @foreach($users as $user)
                                                    <option  value="{{ $user->id }}" {{ request()->input('user') == $user->id ? 'selected' : '' }}>
                                                        {{ $user->userinfo->fname}}{{ $user->userinfo->fname}}/{{$user->email}}/{{$user->userinfo->phone}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="d-flex col-4 justify-content-sm-start ">
                                            <select class="form-control select2" name="lector">
                                                <option value="" selected>Лектор</option>
                                                @foreach($lectors as $lector)
                                                    <option  value="{{ $lector->id }}" {{ request()->input('lector') == $lector->id ? 'selected' : '' }}>
                                                        {{ $lector->userinfo->fname}}{{ $lector->userinfo->fname}}/{{$lector->email}}/{{$lector->userinfo->phone}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="d-flex col-4 justify-content-sm-start ">
                                            <select class="form-control select2" name="course">
                                                <option value="" selected>Курс</option>
                                                @foreach($courses as $course)
                                                    <option  value="{{ $course->id }}" {{ request()->input('course') == $course->id ? 'selected' : '' }}>
                                                        {{ $course->info->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="mb-3 justify-content-end d-flex w-100" >
                                        <div class="d-flex col-2 justify-content-sm-start">
                                            <select class="form-control select2" name="manager">
                                                <option value="" selected>Менеджер</option>
                                                @foreach($managers as $manager)
                                                    <option  value="{{ $manager->id }}" {{ request()->input('manager') == $manager->id ? 'selected' : '' }}>
                                                        {{ $manager->userinfo->fname}}{{ $manager->userinfo->fname}}/{{$manager->email}}/{{$manager->userinfo->phone}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex col-2 justify-content-sm-start w-50">
                                            <select class="form-control select2" name="type">
                                                <option value=""  selected>Платежная система</option>
                                                <option value="yookassa" {{ request()->input('type') == 'yookassa' ? 'selected' : '' }}>Yookassa</option>
                                                <option value="bepaid" {{ request()->input('type') == 'bepaid' ? 'selected' : '' }}>Bepaid</option>
                                            </select>
                                        </div>


                                        <div class="col-3">
                                            <input type="date" class="form-control" id="datefrom" placeholder="Ստեղծման ամսաթիվ" name="from_created_at" value="{{ request()->input('from_created_at') }}">
                                        </div>

                                        <div class="col-3">
                                            <input type="date" class="form-control" id="dateto" placeholder="Ստեղծման ամսաթիվ" name="to_created_at" value="{{ request()->input('to_created_at') }}">
                                        </div>

                                        {{-- <button class="btn btn-primary col-2">Որոնել</button> --}}
                                        <button class="btn btn-outline-primary ml-2" type="submit" style="height: 38px">Поиск</button>

                                        <a class="btn btn-primary ml-2" href="{{ route('admin.payment.index') }}">Очистить</a>
                                    </div>
                                </form>
                            </div>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
{{--                                    <th>--}}
{{--                                        <div class="d-flex align-items-center flex-nowrap">--}}
{{--                                            <span>ID</span>--}}
{{--                                            <div class="sort ml-2 d-flex flex-nowrap">--}}
{{--                                                <a href = {{route('admin.payment.index',['order'=>'ID','sort'=>'asc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                                <a href = {{route('admin.payment.index',['order'=>'ID','sort'=>'desc'])}}>--}}
{{--                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </th>--}}
                                    <th>ID</th>
                                    <th>Фио Клиента</th>
                                    <th>Курс/Вебинар</th>
                                    <th>Сумма</th>
                                    <th>Валюта</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                    <th> Кнопки управления</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                       <td>
                                           <a>{{$payment->id}}</a>
                                       </td>
                                        <td>
                                            <a>{{$payment->user->name ?? ''}}</a>
                                        </td>
                                        <td>
                                            <ul>
                                                @foreach($payment->infos as $info)
                                                    <li>{{ $info->item != null ?  $info->item->info->title : '' }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a>{{ $payment->sum }}</a>
                                        </td>
                                        <td>
                                            <a>{{ $payment->cur }}</a>
                                        </td>
                                        <td>
                                            <a>{{ $payment->status ? __("payment.$payment->status") : ' - '}}</a>
                                        </td>
                                        <td>
                                            <a>{{ $payment->created_at }}</a>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-success mx-1" href="{{ route('admin.payment.show', $payment->id) }}">Подробнее счет </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   <div class="d-flex justify-content-center">
                       {{ $payments->links() }}
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection

