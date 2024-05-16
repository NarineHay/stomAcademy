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

    public function lect(){

        $items = OrderInfo::where('order_id',41)->get();
        $currencies = Currency::all();

        $webinars = [];
        foreach ($items as $key => $order_item) {
            if ($order_item->type == "webinar") {
                $item = Webinar::query()->where("id", $order_item->item_id)->first();
                $lector = Lector::where('user_id', $item->user_id)->first();

                $data = [
                    'user_id' => $item->user_id,
                    'item_id' => $item->id,
                    'type' => "webinar",
                    'price_id'=> $item->price_id,
                    'price_2_id'=> $item->price_2_id,
                    'per_of_sales' => $lector->per_of_sales,
                ];
                $lector_income = LectorIncome::create($data);
                $lector_income_currency = [];
                foreach ($currencies as $key => $curr) {
                    $curr_name = strtolower($curr->currency_name);
                    $price = $item->sale ? $item->sale->$curr_name : $item->price->$curr_name;
                    $total_price = $price * $lector->per_of_sales / 100;

                    $lector_income_currency["price_$curr_name"] = $total_price;

                }
                $lector_income_currency['lector_income_id'] = $lector_income->id;
                LectorIncomesCurrency::create($lector_income_currency);


                // array_push($webinars, $item);
            } else {
                $item = Course::query()->where("id", $order_item->item_id)->first();
                $lectors = $item->getLectors();
                // dd($item->webinars_object);
                // ====== course price currency ===============================
                foreach ($item->webinars_object() as $item_object) {

                    $course_price_curr = [];
                    foreach ($currencies as $key => $curr) {
                        $curr_name = strtolower($curr->currency_name);
                        $course_price_curr[$curr] += $item_object->sale ? $item_object->sale->$curr_name : $item_object->price->$curr_name;

                    }
                }
                // ================================================

                    foreach ($lectors as $key => $lector) {
                        $data = [
                            'user_id' => $lector->id,
                            'item_id' => $item->id,
                            'type' => "course",
                            'price_id'=> $item->price_id,
                            'price_2_id'=> $item->price_2_id,
                            'per_of_sales' => $lector->per_of_sales,
                        ];
                        $lector_income = LectorIncome::create($data);
                        $lector_income_currency = [];
                        $course_webinars = $item->webinars_object->where('user_id',$lector->id)->get();
                        foreach ($course_webinars as $webin) {

                            $object_price_curr = [];
                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);
                                $object_price_curr['total_price'][$curr] += $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;
                                $object_price_curr['price'][$curr] = $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;



                            }
                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);
                                $course_price = $item->sale ? $item->sale->$curr_name : $item->price->$curr_name;
                                $total_price = ($course_price_curr[$curr] /  $object_price_curr['total_price'][$curr] * $course_price) * $lector->per_of_sales / 100;

                                $lector_income_currency["price_$curr_name"] = $total_price;

                            }
                        }
                        $lector_income_currency['lector_income_id'] = $lector_income->id;
                        LectorIncomesCurrency::create($lector_income_currency);

                    }
                // dd($course);
                // $course_webinars = $item->webinars_object;
                // foreach ($course_webinars as $value) {
                //     array_push($webinars, $value);
                // }
            }
        }
    }
}
