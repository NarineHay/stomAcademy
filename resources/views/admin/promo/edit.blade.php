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
            <form action="{{ route('admin.promo.update',$promo) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Код:</label>
                        <input type="text" value="{{ $promo->code }}" name="code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Процент:</label>
                        <input type="text" value="{{ $promo->prc }}" name="prc" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Min:</label>
                        <input type="text" value="{{ $promo->min }}" name="min" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Макс. кол. ( "0" если можно использовать бесконечно ):</label>
                        <input type="text" value="{{ $promo->max }}" name="max" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус:</label>
                        <select name="status" class="form-control">
                            <option @if($promo->status) selected @endif value="1" selected>Активен</option>
                            <option @if(!$promo->status) selected @endif value="0" >Отключен</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

