<?php

namespace App\Helpers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Order;
use App\Models\PaymentAccount;
use App\Models\Promo;
use App\Models\Webinar;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YooKassa
{

    static function createOrder($promo_code = null, $request_type, $payment_account_token = null, $user_id = null)
    {
        if($request_type == 'cart'){
            $order = self::createOrderFromCart($promo_code);
        }
        else{
            $order = self::createOrderFromPaymentAccount($payment_account_token, $user_id);
        }



        $clientId = env('YOOKASSA_ID');
        $secretKey = env('YOOKASSA_KEY');
        $idempotenceKey = Str::uuid()->toString();

        $order_id = $order['order']->id;

        $client = new Client();
        // $return_url = route("personal.courses",['status' => 'check_status']);
        $return_url = url(''). "/payment-result/$order_id/yookassa";


        $data =[
            'amount' => [
                // 'value' => $total,
                'value' => 1,

                'currency' => $order['order']->cur,
            ],
            'capture' => true,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => $return_url
            ],
            'description' => $order['desc']
        ];

        $response = $client->post('https://api.yookassa.ru/v3/payments', [
            'auth' => [$clientId, $secretKey],
            'headers' => [
                        'Idempotence-Key' => $idempotenceKey,
                        'Content-Type' => 'application/json',
                    ],
            'json' => $data
        ]);

        $response = json_decode($response->getBody()->getContents(),256);

        if($response['status'] == 'pending'){
            // $order->update(['payment_id' => $response['id']]);
            $order['order']->update(['payment_id' => $response['id']]);

            return ['url' => $response['confirmation']['confirmation_url'], 'order_id' => $order_id];

        }

        return false;

    }

    static function checkStatus($order_id){
        $clientId = env('YOOKASSA_ID');
        $secretKey = env('YOOKASSA_KEY');
        $order = Order::query()->where("id",$order_id)->first();
        $payment_id = $order->payment_id;
        // $order = Order::query()->where("payment_id", $payment_id)->first();
        if($order && $order->status != Order::STATUS_SUCCESS){
            $client = new Client();

            $response = $client->get("https://api.yookassa.ru/v3/payments/".$payment_id, [
                'auth' => [$clientId, $secretKey],
            ]);
            $response = json_decode($response->getBody()->getContents(),true);
            if($response['status'] == "succeeded"){
                // $order->success();
                return true;
            }

            return false;

        }

    }

    static function createOrderFromCart($promo_code = null){
        $items = Auth::user()->cart;
        $cur = Currency::getCur();
        $desc = [];
        $total = 0;

        foreach ($items as $item_) {
            if ($item_['type'] == "webinar") {
                $item = Webinar::query()->where("id", $item_['item_id'])->first();
            } elseif ($item_['type'] == "course") {
                $item = Course::query()->where("id", $item_['item_id'])->first();
            }

            $total += $item->sale ? $item->sale->pure() : $item->price->pure();
            $desc[] = $item->info->title;
        }

        if ($promo_code) {
            $promo = Promo::query()->where('code', $promo_code)->first();
            if ($promo) {
                $total = $total * (1 - $promo->prc / 100);
            }
        }


        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->payment_id = 1;
        $order->sum = $total;
        $order->cur = $cur;
        $order->type = 'yookasa';

        $order->save();

        foreach ($items as $item) {
            $order->infos()->create([
                "type" => $item['type'],
                "item_id" => $item['item_id']
            ]);
        }

        return [
            'order' => $order,
            'desc' => implode(",\r\n",$desc) != "" ? implode(",\r\n",$desc) : "Pyment"
        ];


    }


    static function createOrderFromPaymentAccount($payment_account_token, $user_id){
        $desc = [];
        $payment_account = PaymentAccount::where('token', $payment_account_token)->first();

        $course_ids = $payment_account->infos->where('type', 'course')->pluck('item_id');
        $webinar_ids = $payment_account->infos->where('type', 'webinar')->pluck('item_id');
        $userId = $user_id != null ? $user_id : $payment_account->user_id;

        $order = Order::create([
            'user_id' => $userId,
            'payment_id' => 1,
            'sum' => $payment_account->sum,
            'cur' => $payment_account->cur,
            'comment' => $payment_account->comment,
            'type' => $payment_account->type

        ]);

        if (isset($course_ids) && count($course_ids) > 0) {
            foreach ($course_ids as $course_id) {
                $order->infos()->create(['item_id' => $course_id, 'type' => 'course']);
                $item = Course::query()->where("id", $course_id)->first();
                $desc[] = $item->info->title;
            }
            // $order->infos()->attach(['type'=> 'course','item_id'=>$course_ids]);
        }

        if (isset($webinar_ids) && count($webinar_ids) > 0) {
            foreach ($webinar_ids as $webinar_id) {
                $order->infos()->create(['item_id' => $webinar_id, 'type' => 'webinar']);
                $item = Webinar::query()->where("id", $webinar_id)->first();
                $desc[] = $item->info->title;
            }
        }

        return [
            'order' => $order,
            'desc' => implode(",\r\n", $desc) != "" ? implode(",\r\n", $desc) : "Payment"
        ];
    }
}
