<?php
namespace App\Traits\Lector;

use App\Mail\SendAccessInfoEmail;
use App\Models\Access as ModelsAccess;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Currency;
use App\Models\Lector;
use App\Models\LectorIncome;
use App\Models\LectorIncomesCurrency;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\User;
use App\Models\Webinar;

trait AddLectorIncome {

    public function addIncome($order_id){

        $items = OrderInfo::where('order_id', $order_id)->get();

        $currencies = Currency::all();

        $webinars = [];
        foreach ($items as $key => $order_item) {
            if ($order_item->type == "webinar") {
                $item = Webinar::query()->where("id", $order_item->item_id)->first();
                $lector = Lector::where('user_id', $item->user_id)->first();
                if ($lector->per_of_sales) {


                    $data = [
                        'user_id' => $item->user_id,
                        'item_id' => $item->id,
                        'type' => "webinar",
                        'price_id' => $item->price_id,
                        'price_2_id' => $item->price_2_id,
                        'per_of_sales' => $lector->per_of_sales ?? 0,
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

                }

            } else {
                $item = Course::query()->where("id", $order_item->item_id)->first();
                $lectors = $item->getLectors();
                
                // ====== course price currency ===============================
                $course_price_curr = [];
                $course_webinars = $item->webinars_object()->get();

                foreach ($course_webinars as $item_object) {

                    foreach ($currencies as $key => $curr) {
                        $curr_name = strtolower($curr->currency_name);
                        if (isset($course_price_curr[$curr_name])) {
                            $course_price_curr[$curr_name] += $item_object->sale ? $item_object->sale->$curr_name : $item_object->price->$curr_name;

                        } else {
                            $course_price_curr[$curr_name] = $item_object->sale ? $item_object->sale->$curr_name : $item_object->price->$curr_name;

                        }

                    }
                }
                // ================================================

                foreach ($lectors as $key => $lector) {
                    if ($lector->per_of_sales) {

                        $data = [
                            'user_id' => $lector->id,
                            'item_id' => $item->id,
                            'type' => "course",
                            'price_id' => $item->price_id,
                            'price_2_id' => $item->price_2_id,
                            'per_of_sales' => $lector->per_of_sales ?? 0,
                        ];
                        $lector_income = LectorIncome::create($data);
                        $lector_income_currency = [];
                        $course_webinars = $item->webinars_object()->where('user_id', $lector->id)->get();
                        foreach ($course_webinars as $webin) {


                            $object_price_curr = [];

                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);

                                if (isset($object_price_curr['total_price'][$curr_name])) {
                                    $object_price_curr['total_price'][$curr_name] += $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;

                                } else {
                                    $object_price_curr['total_price'][$curr_name] = $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;

                                }

                                $object_price_curr['price'][$curr_name] = $webin->sale ? $webin->sale->$curr_name : $webin->price->$curr_name;



                            }
                            foreach ($currencies as $key => $curr) {
                                $curr_name = strtolower($curr->currency_name);
                                $course_price = $item->sale ? $item->sale->$curr_name : $item->price->$curr_name;
                                $total_price = ($course_price_curr[$curr_name] / $object_price_curr['total_price'][$curr_name] * $course_price) * $lector->per_of_sales / 100;

                                $lector_income_currency["price_$curr_name"] = $total_price;

                            }
                        }
                        $lector_income_currency['lector_income_id'] = $lector_income->id;
                        LectorIncomesCurrency::create($lector_income_currency);

                    }
                }

            }
        }
        // $webinars = [];
        // foreach ($items as $key => $item) {
        //     if ($item->type == "webinar") {
        //         // $item = Webinar::query()->where("id", $item->item_id)->first();
        //         $lector = Lector::where('user_id', $item->user_id)->first();

        //         $data = [
        //             'user_id' => $item->user_id,
        //             'item_id' => $item->id,
        //             'type' => "webinar",
        //             'per_of_sales' => $lector->per_of_sales,
        //         ];
        //         array_push($webinars, $item);
        //     } else {
        //         $course = Course::query()->where("id", $item->item_id)->first();
        //         $course_webinars = $item->webinars_object;
        //         foreach ($course_webinars as $value) {
        //             array_push($webinars, $value);
        //         }
        //     }
        // }


        // foreach ($webinars as $webinar) {
        //     $price = $webinar->sale ? $webinar->sale->usd : $webinar->price->usd;

        //     $lector = Lector::where('user_id', $webinar->user_id)->first();
        //     $total_price = $price * $lector->per_of_sales / 100;

        //     if($lector->per_of_sales != null && $lector->per_of_sales != 0 ){
        //         $data = [
        //             'user_id' => $webinar->user_id,
        //             'webinar_id' => $webinar->id,
        //             'webinar_price' => $price,
        //             'per_of_sales' => $lector->per_of_sales,
        //             'total_price' => $total_price
        //         ];

        //         LectorIncome::create($data);
        //     }


        // }

    }


}
