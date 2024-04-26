<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\YooKassa;
use App\Http\Controllers\Controller;
use App\Traits\Access;
use Illuminate\Http\Request;

class PaymentResultController extends Controller
{
    use Access;
    public function __invoke(Request $request)
    {

        $order_id = $request->orderId;
        $payment_result = YooKassa::checkStatus($order_id);

        if($payment_result){
            $payment_completion = $this->setAccess($order_id);

            return route("personal.courses");
        }

  }
}
