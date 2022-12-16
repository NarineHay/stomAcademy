@extends('layouts.admin')
@section('title', 'Payment')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Оплаты</h1>
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
                                                <a href = {{route('admin.payment.index',['order'=>'ID','sort'=>'asc'])}}>
                                                    <i class="fa fa-arrow-up fs-6" aria-hidden="true"></i>
                                                </a>
                                                <a href = {{route('admin.payment.index',['order'=>'ID','sort'=>'desc'])}}>
                                                    <i class="fa fa-arrow-down fs-6" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Фио Клиента</th>
                                    <th>Курс/Вебинар</th>
                                    <th>Сумма</th>
                                    <th>Валюта</th>
                                    <th></th>
                                    <th>Кнопки управления</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>
                                            <a>{{$payment->id}}</a>
                                        </td>
                                        <td>
                                            <a>{{$payment->user->name}}</a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
                                        <td>
                                            <a></a>
                                        </td>
{{--                                        <td class="project-actions text-right">--}}
{{--                                            <form action="{{route('admin.payments.destroy',$user)}}" method="POST" class="d-flex justify-content-around">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <a class="btn btn-primary mx-1" href="{{ route('admin.payments.edit',$user) }}">Изменить</a>--}}
{{--                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mx-1" id="button">Удалить</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
{{--                    <div class="d-flex justify-content-center">--}}
{{--                        {{ $payments->links() }}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection

