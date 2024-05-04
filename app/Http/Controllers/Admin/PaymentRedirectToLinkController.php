<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Bepaid;
use App\Helpers\YooKassa;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PaymentAccount;
use App\Traits\Application\CreatApplication;
use Illuminate\Http\Request;

class PaymentRedirectToLinkController extends Controller
{
    use CreatApplication;
    public function __invoke($token)
    {
        $payment_account = PaymentAccount::where('token', $token)->first();

        if ($payment_account->type == 'yookassa') {
            $result = YooKassa::createOrder(null, 'payment_account', $token);

        }
        if ($payment_account->type == 'bepaid') {
            $result = Bepaid::createOrder(null, 'payment_account', $token);
        }


        if ($result) {
            $order = Order::find($result['order_id']);
            $this->creatApp($order, 'order');

            return response()->redirectTo($result['url']);
        }


    }
}
