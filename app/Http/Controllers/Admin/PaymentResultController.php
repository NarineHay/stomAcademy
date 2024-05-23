<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bepaid;
use App\Helpers\CRM;
use App\Helpers\YooKassa;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\Access;
use App\Traits\Lector\AddLectorIncome;
use Illuminate\Http\Request;

class PaymentResultController extends Controller
{
    use Access, AddLectorIncome;
    public function __invoke(Request $request)
    {


        if($request->type == 'yookassa'){
            $order_id = $request->db_order_id;

            // $order_id = $request->orderId;
            $payment_result = YooKassa::checkStatus($order_id);

        }
        if($request->type == 'bepaid'){
            $order_id = $request->db_order_id;
            $token = $request->token;
            if($request->status == 'successful'){
                $payment_result = Bepaid::checkStatus($token, $order_id);
            }
        }

        if($payment_result){
            // return response()->redirectTo('http://dev.stom-academy.com/courses');
            $order = Order::find($order_id);
            $this->setAccess($order_id);
            $this->addIncome($order_id);
            
            CRM::payment($order);

            return redirect("personal/courses");
        }

  }
}
