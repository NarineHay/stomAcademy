<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Traits\Payment\Payment as PaymentPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use PaymentPayment;
    public function index(Request $request){

        $payments = $this->payment($request->all());
        $users = User::where('role', 'user')->get();
        $lectors = User::where('role', 'lector')->get();
        $courses = Course::all();
      
        return view('admin.payments.index',compact('payments','users', 'courses', 'lectors'));
    }
}
