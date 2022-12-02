@extends('layouts.admin')

@section('title', 'Edit price')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-primary">
            <form action="{{ route('admin.prices.update',$price->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ:</label>
                        <input type="text" value="{{ $price->name }}" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BYN:</label>
                        <input type="text" value="{{ $price->byn }}" name="byn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">RUB:</label>
                        <input type="text" value="{{ $price->rub }}" name="rub" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">USD:</label>
                        <input type="text" value="{{ $price->usd }}" name="usd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">EUR:</label>
                        <input type="text" value="{{ $price->eur }}" name="eur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">UAH:</label>
                        <input type="text" value="{{ $price->uah }}" name="uah" class="form-control">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </form>
        </div>
    </section>
@endsection


