<?php
namespace App\Traits\Payment;

use App\Mail\SendAccessInfoEmail;
use App\Models\Access as ModelsAccess;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Order;
use App\Models\User;
use App\Models\Webinar;

trait Payment {

    public function payment($request){

        $payments = $this->filter($request)->paginate(10);

        return $payments;

    }

    public function filter($request){
        $payments = Order::where("status", '!=', null);


            if (isset($request["user"]) ) {
                $payments = $payments->where('user_id', $request["user"] );
            }

            if (isset($request["manager"]) ) {
                $payments = $payments->where('manager_id', $request["manager"] );
            }

            if (isset($request["type"]) ) {
                $payments = $payments->where('type', $request["type"] );
            }

            if (isset($request["course_id"])) {
                $course_id = $request["course_id"];

                $payments = $payments->whereHas('infos', function ($query) use ($course_id) {
                    $query->where('type', 'course')->where('item_id', $course_id);
                });
            }

            if (isset($request["lector"]) ) {
                $lector_id = $request["lector"];
                $webinar_ids = Webinar::where('user_id', $lector_id)->pluck('id');
                $course_ids = CourseWebinar::whereIn('webinar_id', $webinar_ids)->pluck('course_id');

                $payments = $payments->whereHas('infos', function ($query) use ($webinar_ids, $course_ids) {
                    $query->where(function ($subquery) use ($webinar_ids) {
                        $subquery->where('type', 'webinar')->whereIn('item_id', $webinar_ids);
                    })->orWhere(function ($subquery) use ($course_ids) {
                        $subquery->where('type', 'course')->whereIn('item_id', $course_ids);
                    });
                });
            }

            if (isset($request["from_created_at"]) && $request["from_created_at"] != null) {
                $payments = $payments->whereDate('created_at', '>=', $request["from_created_at"]);
            }

            if (isset($request["to_created_at"]) && $request["to_created_at"] != null) {
                $payments = $payments->whereDate('created_at', '<=', $request["to_created_at"]);
            }

            return $payments;

    }
}
