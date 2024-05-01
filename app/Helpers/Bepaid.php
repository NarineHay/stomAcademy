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

class Bepaid
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


        $clientId = env('BEPAID_ID');
        $secretKey = env('BEPAID_KEY');
        $idempotenceKey = Str::uuid()->toString();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->payment_id = 1;
        $order->sum = $total;
        $order->cur = $cur;
        $order->type = 'bepaid';

        $order->save();

        $client = new Client();
        $return_url = url(''). "/payment-result/$order->id/bepaid";


        $amount = $total * 100;
        $data = [
            "name" => implode(",\r\n",$desc),
            "description" => implode(",\r\n",$desc),
            "currency" => $cur,
            // "amount" => $amount,
            "amount" => 100,
            "infinite" => true,
            "test" => false,
            "immortal" => true,
            "return_url" => $return_url,
            "language" => "en",
            "transaction_type" => "payment"
        ];

        $response = $client->post('https://api.bepaid.by/products', [
            'auth' => [$clientId, $secretKey],
            'headers' => [
                        'Idempotence-Key' => $idempotenceKey,
                        'Content-Type' => 'application/json',
                    ],
            'json' => $data
        ]);

        $response = json_decode($response->getBody()->getContents(),256);

        if(isset($response['payment_url'])){
            $order->update(['payment_id' => $response['id']]);

            foreach ($items as $item){
                $order->infos()->create([
                    "type" => $item['type'],
                    "item_id" => $item['id']
                ]);
            }

            // return $response['confirm_url'];
            return ['url' => $response['payment_url'], 'order_id' => $order->id];
        }

        return false;

    }

    static function checkStatus($uid, $db_order_id){
        $clientId = env('BEPAID_ID');
        $secretKey = env('BEPAID_KEY');
        // =======================
        // ?token=53d6c51782f94d34cff8bf1645f7b0efb859a49970076ded85ee2aa51cabcc34
        // &status=failed
        // &uid=0bb6d4f1-5579-4f1e-8100-894f62a11321
        // ==============================
        $order = Order::query()->where("id", $db_order_id)->first();
        if($order && $order->status != Order::STATUS_SUCCESS){
            $client = new Client();

            $response = $client->get("https://gateway.bepaid.by/transactions/".$uid, [
                'auth' => [$clientId, $secretKey],
            ]);

            $response = json_decode($response->getBody()->getContents(),true);
            if($response['transaction']['status'] == "successful"){
                // $order->success();
                return true;
            }

            return false;

        }

    }
}
