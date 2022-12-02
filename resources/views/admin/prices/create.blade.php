@extends('layouts.admin')

@section('title', 'Price')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление новой цены</h1>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="content">
        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

        <div class="card card-primary">
            <form action="{{ route('admin.prices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">НАЗВАНИЕ:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BYN:</label>
                        <input type="text" name="byn" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">RUB:</label>
                        <input type="text" name="rub" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">USD:</label>
                        <input type="text" name="usd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">EUR:</label>
                        <input type="text" name="eur" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">UAH:</label>
                        <input type="text" name="uah" class="form-control">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

