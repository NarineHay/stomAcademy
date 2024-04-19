@extends('layouts.admin')

@section('title', 'Certificate')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование сертификата</h1>
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

            <div class="container">
                <div class = "card card-primary">
                    <div class="row">
                        <div class="card-body">
                            <livewire:admin.coordinates :certificate="$certificate" />
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
