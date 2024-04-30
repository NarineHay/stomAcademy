<?php

namespace App\Helpers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Promo;
use App\Models\Webinar;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YooKassa
{

    static function createOrder($promo_code = null)
    {
        $items = Auth::user()->cart;
        $cur = Currency::getCur();
        $desc = [];
        $total = 0;
        foreach ($items as $item_){
            if($item_['type'] == "webinar"){
                $item = Webinar::query()->where("id",$item_['item_id'])->first();
            }elseif($item_['type'] == "course"){
                $item = Course::query()->where("id",$item_['item_id'])->first();
            }

            $total += $item->sale ? $item->sale->pure() : $item->price->pure();
            $desc[] = $item->info->title;
        }

        if($promo_code){
            $promo = Promo::query()->where('code',$promo_code)->first();
            if($promo){
                $total = $total*(1 - $promo->prc/100);
            }
        }


        $clientId = env('YOOKASSA_ID');
        $secretKey = env('YOOKASSA_KEY');
        $idempotenceKey = Str::uuid()->toString();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->payment_id = 1;
        $order->sum = $total;
        $order->cur = $cur;
        $order->manager = 'yookassa';

        $order->save();
        $client = new Client();

        // $return_url = route("personal.courses",['status' => 'check_status']);
        $return_url = url(''). "/payment-result/$order/yookassa";


        $data =[
            'amount' => [
                // 'value' => $total,
                'value' => 1,

                'currency' => $cur,
            ],
            'capture' => true,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => $return_url
            ],
            'description' => implode(",\r\n",$desc),
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

        $order->update(['payment_id' => $response['id']]);

        foreach ($items as $item){
            $order->infos()->create([
                "type" => $item['type'],
                "item_id" => $item['id']
            ]);
        }

        return ['url' => $response['confirmation']['confirmation_url'], 'order_id' => $order->id];
    }

    static function checkStatus($payment_id){
        $clientId = env('YOOKASSA_ID');
        $secretKey = env('YOOKASSA_KEY');
        $order = Order::query()->where("payment_id",$payment_id)->first();
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
}
