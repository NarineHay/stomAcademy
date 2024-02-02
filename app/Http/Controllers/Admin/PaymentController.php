<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        $order = Order::query()->whereNot("status",Order::STATUS_SUCCESS)->first();
        $order->success();
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $payments = Order::query()
            ->where("status",Order::STATUS_SUCCESS)
            ->with("user")->with("user")
            ->with('infos',function ($q){
                $q->with("item",function ($q){
                    $q->with("info");
                });
            })
            ->paginate(10);
        return view('admin.payments.index',compact('payments'));
    }
}
