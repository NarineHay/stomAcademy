<?php

namespace App\Http\Controllers;

use App\Helpers\Amo;
use App\Helpers\CRM;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Lector;
use App\Models\LectorIncome;
use App\Models\LectorIncomesCurrency;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\Webinar;
use App\Traits\Access;
use App\Traits\Lector\AddLectorIncome as LectorAddLectorIncome;
use App\Traits\Payment\AddLectorIncome;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Http as FacadesHttp;

class TestController extends Controller
{
    use LectorAddLectorIncome;

    public function lect()
    {

        $items = OrderInfo::where('order_id', 40)->get();
        $currencies = Currency::all();

        $webinars = [];
        foreach ($items as $key => $order_item) {
            if ($order_item->type == "webinar") {
                $item = Webinar::query()->where("id", $order_item->item_id)->first();
                $lector = Lector::where('user_id', $item->user_id)->first();

                if($lector->per_of_sales){

                    $lector_income_currency = [];
                    foreach ($currencies as $key => $curr) {
                        $curr_name = strtolower($curr->currency_name);
                        $price = $item->sale ? $item->sale->$curr_name : $item->price->$curr_name;
                        $total_price = $price * $lector->per_of_sales / 100;

                        $lector_income_currency["price_$curr_name"] = $total_price;

                    }

                    $data = [
                        'user_id' => $item->user_id,
                        'item_id' => $item->id,
                        'type' => "webinar",
                        'price_id' => $item->price_id,
                        'price_2_id' => $item->price_2_id,
                        'per_of_sales' => $lector->per_of_sales ?? 0,
                        'price_byn' => $lector_income_currency['price_byn'],
                        'price_rub' => $lector_income_currency['price_rub'],
                        'price_usd' => $lector_income_currency['price_usd'],
                        'price_eur' => $lector_income_currency['price_eur'],
                        'price_uah' => $lector_income_currency['price_uah'],

                    ];

                    $lector_income = LectorIncome::create($data);

                }

            } else {

                $item = Course::query()->where("id", $order_item->item_id)->first();
                $lectors = $item->getLectors();


                foreach ($lectors as $key => $lec) {
                    $lector = $lec->lector;

                    if($lector->per_of_sales){

                        // ====== course price currency ===============================
                        $course_price_curr = [];
                        $course_webinars = $item->webinars_object()->get();

                        foreach ($course_webinars as $item_object) {

                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);


                                if(isset($course_price_curr[$curr_name])){
                                    $course_price_curr[$curr_name] += $item_object->sale ? $item_object->sale->$curr_name : $item_object->price->$curr_name;

                                }
                                else{
                                    $course_price_curr[$curr_name] = $item_object->sale ? $item_object->sale->$curr_name : $item_object->price->$curr_name;

                                }

                            }

                        }


                        $lector_income_currency = [];
                        $course_webinars = $item->webinars_object()->where('user_id', $lector->user_id)->get();
                        $object_price_curr= [];

                        foreach ($course_webinars as $webin) {

                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);

                                if (isset($object_price_curr['total_price'][$curr_name])) {
                                    $object_price_curr['total_price'][$curr_name] += $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;

                                } else {
                                    $object_price_curr['total_price'][$curr_name] = $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;

                                }

                                $object_price_curr['price'][$curr_name] = $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;

                            }

                        }

                        foreach ($currencies as $key => $curr) {
                            $curr_name = strtolower($curr->currency_name);
                            $course_price = $item->sale ? $item->sale->$curr_name : $item->price->$curr_name;

                            $total_price = ($object_price_curr['total_price'][$curr_name] / $course_price_curr[$curr_name] * $course_price) * $lector->per_of_sales / 100;

                            $lector_income_currency["price_$curr_name"] = $total_price;

                        }

                        $data = [
                            'user_id' => $lector->user_id,
                            'item_id' => $item->id,
                            'type' => "course",
                            'price_id' => $item->price_id,
                            'price_2_id' => $item->price_2_id,
                            'per_of_sales' => $lector->per_of_sales ?? 0,
                            'price_byn' => $lector_income_currency['price_byn'],
                            'price_rub' => $lector_income_currency['price_rub'],
                            'price_usd' => $lector_income_currency['price_usd'],
                            'price_eur' => $lector_income_currency['price_eur'],
                            'price_uah' => $lector_income_currency['price_uah'],

                        ];

                        $lector_income = LectorIncome::create($data);


                    }
                }

            }
        }
    }
}
