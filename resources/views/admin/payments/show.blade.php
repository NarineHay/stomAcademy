@extends('layouts.admin')

@section('title', 'Lector')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Оплата</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label >Id: </label>
                        <span>{{$payment->id}}</span>
                    </div>

                    <div class="form-group">
                        <label >Фио Клиента: </label>
                        <span>{{$payment->user->userinfo != null ? $payment->user->userinfo->fname : $payment->user->name}} {{$payment->user->userinfo != null ? $payment->user->userinfo->lname : ''}} </span>
                    </div>

                    <div class="form-group d-flex">
                        <label >Курс/Вебинар: </label>
                        <span>
                            <ul>
                                @foreach($payment->infos as $info)
                                    <li>{{ $info->item != null ?  $info->item->info->title : '' }}</li>
                                @endforeach
                            </ul>
                        </span>
                    </div>

                    <div class="form-group">
                        <label >Сумма: </label>
                        <span>{{$payment->sum}}</span>
                    </div>

                    <div class="form-group">
                        <label >Валюта: </label>
                        <span>{{$payment->cur}}</span>
                    </div>

                    <div class="form-group">
                        <label >Статус: </label>
                        <span>{{$payment->status}}</span>
                    </div>

                    <div class="form-group">
                        <label >Дата: </label>
                        <span>{{$payment->created_at}}</span>
                    </div>

                    <div class="form-group">
                        <label >Ответсвенный менеджер: </label>
                        <span>{{$payment->manager_id ?? ' - '}}</span>
                    </div>

                    <div class="form-group">
                        <label >Комментарий менеджера: </label>
                        <span>{{$payment->comment ?? ' - '}}</span>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{url()->previous()}}"  class="btn btn-primary">Назад</a>
                </div>
        </div>
    </section>
@endsection

