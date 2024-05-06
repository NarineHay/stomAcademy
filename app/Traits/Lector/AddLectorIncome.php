<?php
namespace App\Traits\Lector;

use App\Mail\SendAccessInfoEmail;
use App\Models\Access as ModelsAccess;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Lector;
use App\Models\LectorIncome;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\User;
use App\Models\Webinar;

trait AddLectorIncome {

    public function addIncome($order_id){

        $items = OrderInfo::where('order_id', $order_id)->get();
        $webinars = [];
        foreach ($items as $key => $item) {
            if ($item->type == "webinar") {
                $item = Webinar::query()->where("id", $item->item_id)->first();

                array_push($webinars, $item);
            } else {
                $item = Course::query()->where("id", $item->item_id)->first();
                $course_webinars = $item->webinars_object;
                foreach ($course_webinars as $value) {
                    array_push($webinars, $value);
                }
            }
        }


        foreach ($webinars as $webinar) {
            $price = $webinar->sale ? $webinar->sale->usd : $webinar->price->usd;

            $lector = Lector::where('user_id', $webinar->user_id)->first();
            $total_price = $price * $lector->per_of_sales / 100;

            if($lector->per_of_sales != null && $lector->per_of_sales != 0 ){
                $data = [
                    'user_id' => $webinar->user_id,
                    'webinar_id' => $webinar->id,
                    'webinar_price' => $price,
                    'per_of_sales' => $lector->per_of_sales,
                    'total_price' => $total_price
                ];

                LectorIncome::create($data);
            }


        }

    }


}
