<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bepaid;
use App\Helpers\YooKassa;
use App\Http\Controllers\Controller;
use App\Traits\Access;
use Illuminate\Http\Request;

class PaymentResultController extends Controller
{
    use Access;
    public function __invoke(Request $request)
    {


        if($request->type == 'yookassa'){
            $order_id = $request->db_order_id;

            // $order_id = $request->orderId;
            $payment_result = YooKassa::checkStatus($order_id);

        }
        if($request->type == 'bepaid'){
            $order_id = $request->db_order_id;
            $uid = $request->uid;
            $payment_result = Bepaid::checkStatus($uid, $order_id);
        }

        if($payment_result){
            // return response()->redirectTo('http://dev.stom-academy.com/courses');
            $this->setAccess($order_id);

            return redirect("personal/courses");
        }

  }
}
