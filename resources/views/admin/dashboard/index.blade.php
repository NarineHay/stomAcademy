@extends('layouts.admin')

@section('title', 'Page')
@section('style')
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="m-0">Все страницы</h1>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{route('admin.pages.create')}}" role="button">Добавить</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Клиенты</h5>
                            <h3 class="mt-3 mb-3">{{$customers['all_customers']}}</h3>
                            {{-- <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-up-bold"></i>{{$customers['per_mont_customers']}}</span>
                                <span class="text-nowrap">в день</span>
                            </p> --}}
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-up-bold"></i>{{$customers['per_mont_customers']}}</span>
                                <span class="text-nowrap">за месяц</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Корзина</h5>
                            <h3 class="mt-3 mb-3">{{$cart['all_cart']}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-up-bold"></i>{{$cart['per_day_cart']}}</span>
                                <span class="text-nowrap">в день</span>
                            </p>
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-down-bold"></i> {{$cart['per_mont_cart']}}</span>
                                <span class="text-nowrap">за месяц</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Оплата</h5>
                            <h3 class="mt-3 mb-3">{{$payment['all_payment']}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-down-bold"></i> {{$payment['per_day_payment']}}</span>
                                <span class="text-nowrap">в день</span>
                            </p>
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-down-bold"></i> {{$payment['per_mont_payment']}}</span>
                                <span class="text-nowrap">за месяц</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Количество курсов</h5>
                            <h3 class="mt-3 mb-3">{{$allCourses}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-primary me-2"><i class="mdi mdi-arrow-up-bold"></i> {{$allWebinars}}</span>
                                <span class="text-nowrap">вебинар</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->


            <div class="row">
                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Сумма оплат  по дням (USD)</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div id="chartContainer-full-rub"  style="height: 370px; width: 100%;"> </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Сумма оплат  по дням</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div id="chartContainer-full"  style="height: 370px; width: 100%;"> </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Сумма оплат за месяц</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <tbody>
                                        @foreach ($paymentCurrency['per_mont_payment_currency'] as $pay)
                                            <tr>

                                                <td>
                                                    <h5 class="font-14 my-1 fw-normal">{{$pay->cur}}</h5>
                                                    <span class="text-muted font-13">Валюта</span>
                                                </td>
                                                <td>
                                                    <h5 class="font-14 my-1 fw-normal">{{$pay->total}}</h5>
                                                    <span class="text-muted font-13">Сумма</span>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Сумма оплат за год</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <tbody>
                                        @foreach ($paymentCurrency['all_payment_currency'] as $pay)
                                            <tr>

                                                <td>
                                                    <h5 class="font-14 my-1 fw-normal">{{$pay->cur}}</h5>
                                                    <span class="text-muted font-13">Валюта</span>
                                                </td>
                                                <td>
                                                    <h5 class="font-14 my-1 fw-normal">{{$pay->total}}</h5>
                                                    <span class="text-muted font-13">Сумма</span>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->


            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Топ курсы</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <tbody>
                                        @foreach ($topSellingCources as $course)
                                            <tr>
                                                <td>
                                                    <div>
                                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($course->image) }}"
                                                        alt="addPic" style="width: 90px; object-fit: cover">
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="font-14 my-1 fw-normal">{{$course->info->title}}</h6>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">платёжные системы</h4>
                        </div>

                        <div class="card-body pt-0">
                            <div id="chartContainer"  style="height: 370px; width: 100%;"> </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- end row -->






        </div>
    </section>
@endsection
@section('script')
    <script>
            var res =  '<?php echo $paymentSystem ?>'
            var paymentDailyAll =  '<?php echo $paymentDailyAll ?>'
            var paymentDailyUSD =  '<?php echo $paymentDailyUSD ?>'
    </script>
    <script src="{{asset('admin/dist/js/pages/admin-dashboard.js')}}"></script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
@endsection

