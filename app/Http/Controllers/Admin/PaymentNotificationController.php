<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\Access;
use Illuminate\Http\Request;

class PaymentNotificationController extends Controller
{
    use Access;
    public function __invoke(Request $request)
    {
        $response = $request;
        $response = json_decode($response->getBody()->getContents(),true);
        dd($response);
        if($response['type'] == "notification"){
            $payment_id = $response['object']['id'];
            // $order->success();
            $order = Order::where('payment_id', $payment_id)->first();
            if($order->status != 'succeeded'){
                $this->setAccess($order->id);
            }

        }
        // if($response['type'] == "notification"){
        //     $payment_id = $response['object']['id'];
        //     // $order->success();
        //     $order = Order::where('payment_id', $payment_id)->first();
        //     if($order->status != 'succeeded'){
        //         $this->setAccess($order->id);
        //     }

        // }
    }
}
