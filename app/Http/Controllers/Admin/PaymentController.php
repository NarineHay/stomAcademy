<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        $order = $request->get("order","id");
        $sort = $request->get("sort","asc");
        $payments = Payment::query()->with('user')->orderBY($order,$sort)->paginate(10);
        return view('admin.payments.index',compact('payments'));
    }
}
