@extends('layouts.admin')

@section('title', 'Page')
@section('style')
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Daterangepicker css -->
  <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">

  <!-- Vector Map css -->
  <link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

  <!-- Theme Config Js -->
  <script src="assets/js/hyper-config.js"></script>

  <!-- App css -->
  <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />

  <!-- Icons css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

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
        @if(session('success'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('success') }}
            </div>
        @endif

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
                                    <h5 class="text-muted fw-normal mt-0" title="Growth">Сумма Оплат</h5>
                                    <h3 class="mt-3 mb-3">+ 30.56%</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-primary me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                        <span class="text-nowrap">за месяц</span>
                                    </p>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div> <!-- end row -->

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

                 
            <!-- end row -->

            <div class="row">
                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Top Selling Products</h4>
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
                        </div>

                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                                <span class="text-muted font-13">07 April 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">82</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Marco Lightweight Shirt</h5>
                                                <span class="text-muted font-13">25 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$128.50</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">37</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$4,754.50</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Half Sleeve Shirt</h5>
                                                <span class="text-muted font-13">17 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$39.99</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">64</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$2,559.36</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Lightweight Jacket</h5>
                                                <span class="text-muted font-13">12 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$20.00</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">184</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$3,680.00</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">Marco Shoes</h5>
                                                <span class="text-muted font-13">05 March 2018</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$28.49</h5>
                                                <span class="text-muted font-13">Price</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">69</h5>
                                                <span class="text-muted font-13">Quantity</span>
                                            </td>
                                            <td>
                                                <h5 class="font-14 my-1 fw-normal">$1,965.81</h5>
                                                <span class="text-muted font-13">Amount</span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
                    <div class="card">
                        <div class="d-flex card-header justify-content-between align-items-center">
                            <h4 class="header-title">Top Selling Products</h4>
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">Export <i class="mdi mdi-download ms-1"></i></a>
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
    window.onload = function () {
var res =  '<?php echo $paymentSystem ?>'
console.log(res);
    var options = {
        animationEnabled: true,

        data: [{
            type: "doughnut",
            innerRadius: "40%",
            showInLegend: true,
            legendText: "{label}",
            indexLabel: "{label}: #percent%",
            dataPoints: JSON.parse(res)
        }]
    };
    $("#chartContainer").CanvasJSChart(options);

    var paymentDaily =  '<?php echo $paymentDaily ?>'

    var optionsFull = {
	animationEnabled: true,
	title: {
		text: "Spline Chart using jQuery Plugin"
	},
	axisX: {
		labelFontSize: 14
	},
	axisY: {
		labelFontSize: 14
	},

    data: JSON.parse(paymentDaily)
};
$("#chartContainer-full").CanvasJSChart(optionsFull);



    }


    </script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
@endsection

