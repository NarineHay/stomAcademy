@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Валюта</h1>
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
            <form action="{{ route('admin.exchange-rates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                @foreach ($exchange_reats as $item)
                    <div class="form-group">
                        <label for="comment">{{$item->cur}}</label>
                        <input name="{{$item->cur}}" class="form-control" value="{{$item->value}}">
                    </div>

                @endforeach


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </section>
@endsection
