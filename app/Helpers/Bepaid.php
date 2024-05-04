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

class Bepaid
{

    static function createOrder($promo_code = null, $request_type, $payment_account_token = null)
    {

        if($request_type == 'cart'){
            $order = self::createOrderFromCart($promo_code);
        }
        else{
            $order = self::createOrderFromPaymentAccount($payment_account_token);
        }

        // $items = Auth::user()->cart;
        // $cur = Currency::getCur();
        // $desc = [];
        // $total = 0;
        // foreach ($items as $item_){
        //     if($item_['type'] == "webinar"){
        //         $item = Webinar::query()->where("id",$item_['item_id'])->first();
        //     }elseif($item_['type'] == "course"){
        //         $item = Course::query()->where("id",$item_['item_id'])->first();
        //     }

        //     $total += $item->sale ? $item->sale->pure() : $item->price->pure();
        //     $desc[] = $item->info->title;
        // }

        // if($promo_code){
        //     $promo = Promo::query()->where('code',$promo_code)->first();
        //     if($promo){
        //         $total = $total*(1 - $promo->prc/100);
        //     }
        // }


        // $clientId = env('BEPAID_ID');
        // $secretKey = env('BEPAID_KEY');
        // $idempotenceKey = Str::uuid()->toString();

        // $order = new Order();
        // $order->user_id = Auth::user()->id;
        // $order->payment_id = 1;
        // $order->sum = $total;
        // $order->cur = $cur;
        // $order->type = 'bepaid';

        // $order->save();
        $clientId = env('BEPAID_ID');
        $secretKey = env('BEPAID_KEY');
        $idempotenceKey = Str::uuid()->toString();

        $order_id = $order['order']->id;

        $client = new Client();
        $return_url = url(''). "/payment-result/$order_id/bepaid";


        $amount = $order['order']->sum * 100;
        // $data = [
        //     "name" => implode(",\r\n",$desc),
        //     "description" => implode(",\r\n",$desc),
        //     "currency" => $cur,
        //     // "amount" => $amount,
        //     "amount" => 10,
        //     "infinite" => true,
        //     "test" => true,
        //     "immortal" => true,
        //     "return_url" => $return_url,
        //     "language" => "en",
        //     "transaction_type" => "payment"
        // ];

        $data = [
            "checkout" => [
                "test" => false,
                "transaction_type" => "payment",
                "attempts" => 2,
                "settings" => [
                    "return_url" => $return_url,
                    "auto_return" => 3,
                    "button_next_text" => "Вернуться в магазин",
                    "language" => "en"
                ],
                "order" => [
                    "currency" => $order['order']->cur,
                    "amount" => 10,
                    "description" => $order['desc']
                ]
            ]

        ];

        $response = $client->post('https://checkout.bepaid.by/ctp/api/checkouts', [
            'auth' => [$clientId, $secretKey],
            'headers' => [
                        'Idempotence-Key' => $idempotenceKey,
                        'Content-Type' => 'application/json',
                    ],
            'json' => $data
        ]);

        $response = json_decode($response->getBody()->getContents(),256);

        if(isset($response['checkout'])){
            $token = $response['checkout']['token'];
            $order['order']->update(['token' => $token ]);

            // return $response['confirm_url'];
            return ['url' => $response['checkout']['redirect_url'], 'order_id' => $order_id];
        }

        return false;

    }

    static function checkStatus($token, $db_order_id){

        $clientId = env('BEPAID_ID');
        $secretKey = env('BEPAID_KEY');
        // =======================
        // ?token=53d6c51782f94d34cff8bf1645f7b0efb859a49970076ded85ee2aa51cabcc34
        // &status=failed
        // &uid=0bb6d4f1-5579-4f1e-8100-894f62a11321
        // ==============================
        $order = Order::query()->where(["id" => $db_order_id, 'token' => $token])->first();
        if($order && $order->status != Order::STATUS_SUCCESS){
            // $client = new Client();

            // $response = $client->get("https://gateway.bepaid.by/transactions/".$uid, [
            //     'auth' => [$clientId, $secretKey],
            // ]);

            // $response = json_decode($response->getBody()->getContents(),true);
            // if($response['transaction']['status'] == "successful"){
            //     return true;
            // }

                return true;
        }

        return false;



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
        $order->type = 'bepaid';

        $order->save();

        foreach ($items as $item) {
            $order->infos()->create([
                "type" => $item['type'],
                "item_id" => $item['id']
            ]);
        }

        return [
            'order' => $order,
            'desc' => implode(",\r\n",$desc) != "" ? implode(",\r\n",$desc) : "Pyment"
        ];


    }


    static function createOrderFromPaymentAccount($payment_account_token){
        $desc = [];
        $payment_account = PaymentAccount::where('token', $payment_account_token)->first();

        $course_ids = $payment_account->infos->where('type', 'course')->pluck('item_id');
        $webinar_ids = $payment_account->infos->where('type', 'webinar')->pluck('item_id');

        $order = Order::create([
            'user_id' => $payment_account->user_id,
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
            'desc' => implode(",\r\n", $desc) != "" ? implode(",\r\n", $desc) : "Pyment"
        ];
    }
}
